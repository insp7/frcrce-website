<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/27/2019
 * Time: 9:13 PM
 */

    if(isset($_GET['q'])) { // unnecessary if, later remove
        require_once(BASE_URL . 'classes/EventImages.php');

        $events_images = new EventImages();
        $event_images_result_set = $events_images->getEventImagesById(intval($_GET['q']));
    }

    global $database;

    if(isset($_POST['btnSubmitImage'])) {
        // Code for images
        $errors = array();
        $uploadedFiles = array();
        $extension = array("jpeg", "jpg", "png", "gif");
        $bytes = 1024;
        $KB = 1024;
        $totalBytes = $bytes * $KB * 5;

        if(!file_exists(BASE_URL . 'upload-folder/event-images/' . $_GET['q'])) {
            mkdir(BASE_URL . 'upload-folder/event-images/' . $_GET['q']);
        }

        $UploadFolder = BASE_URL . "upload-folder/event-images/" . $_GET['q'];

        $counter = 0;

        foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
            $temp = $_FILES["files"]["tmp_name"][$key];
            $name = $_FILES["files"]["name"][$key];

            if (empty($temp)) {
                break;
            }

            $counter++;
            $UploadOk = true;

            if ($_FILES["files"]["size"][$key] > $totalBytes) {
                $UploadOk = false;
                array_push($errors, $name . " total files' size is larger than the 5 MB.");
            }

            $ext = pathinfo($name, PATHINFO_EXTENSION);

            if (in_array(strtolower($ext), $extension) == false) {
                $UploadOk = false;
                array_push($errors, $name . " is invalid file type.");
            }

            if (file_exists($UploadFolder . "/" . $name) == true) {
                $UploadOk = false;
                array_push($errors, $name . " file is already exist.");
            }

            if ($UploadOk == true) {
                move_uploaded_file($temp, $UploadFolder . "/" . $name);
                array_push($uploadedFiles, intval($_GET['q'])); // intval($_GET['q']) is the current event_id
                array_push($uploadedFiles, $name);
            }
        }

        if($counter > 0) {
            if(count($errors) > 0) {
                echo "<b>Errors:</b>";
                echo "<br/><ul>";
                foreach($errors as $error) {
                    echo "<li>".$error."</li>";
                }
                echo "</ul><br/>";
            }

            if(count($uploadedFiles) > 0) {
                // insert image name into database
                $events_images = new EventImages();
                $result = $events_images->insertEventImages($uploadedFiles);

                echo "<b>Uploaded Files:</b>";
                echo "<br/><ul>";
                foreach($uploadedFiles as $fileName) {
                    if($fileName == $_GET['q']) continue;
                    echo "<li>".$fileName."</li>";
                }
                echo "</ul><br/>";

                echo (count($uploadedFiles)/2) . " file(s) are successfully uploaded.";
            }
        }
        else {
            echo "Please, Select file(s) to upload.";
        }

//        if(count($uploadedFiles) > 0) {
//            // insert image name into database
//            $events_images = new EventImages();
//            $result = $events_images->insertEventImages($uploadedFiles);
//        }

//        header("Location: " . BASE_URL . "admin/events.php");
    }

?>

<div class="row">
    <div class="col-md-12">
        <a href="admin/events.php?q=add" class="btn btn-danger">
            <i class="fa fa-plus"></i>
            &nbsp;Create Event
        </a>
        <hr>
        <form method="POST" enctype="multipart/form-data" name="formUploadImageForEvent">
            <label>Select single file to upload:</label>
            <input type="file" name="files[]" multiple="multiple" />
            <input type="submit" value="Upload File" name="btnSubmitImage"/>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <!--ACTION ROW-->
        <div class="row">
            <div class="col-md-6 pull-right">
                <div class="btn-group pull-right">
                    <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Tools
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="javascript:;"> Print </a>
                        </li>
                        <li>
                            <a href="javascript:;"> Save as PDF </a>
                        </li>
                        <li>
                            <a href="javascript:;"> Export to Excel </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--TABLE-->
        <br>
        <div class="box">
            <div class="box-body">
                <table class="table table-striped table-hover table-bordered dataTable" id="event_images_list">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>event_id</th>
                        <th>event_image</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($event_images_result_set as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['event_images_id']; ?></td>
                            <td><?php echo $row['event_id']; ?></td>
                            <td><img src="upload-folder/event-images/<?php echo $row['event_id'] . '/' . $row['event_image_path']; ?>" class="img-responsive" alt="<?php echo $row['event_image_path']; ?>" height="300px" width="300px"></td>
                            <td><button class='delete-event-image fa fa-trash btn btn-danger' id='<?php echo $row['event_images_id']; ?>' data-toggle='modal' data-target='#delete_event_image_modal'></button></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--DELETE MODAL-->
<div class="modal fade" id="delete_event_image_modal" tabindex="-1" role="dialog" aria-labelledby="deleteEventImageModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="delete?" id="deleteEventImageModal">Delete Image?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure, you want to delete this entry</p>
            </div>
            <div class="modal-footer">
                <form action="http://localhost/frcrce/admin/scripts/events/delete-image.php" method="POST">
                    <input type="hidden" id="event_image_id" name="event_image_id">
                    <button type="submit" class="btn btn-success" name="deleteBtn" id="delete_event_image">Yes</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--END OF DELETE MODAL-->