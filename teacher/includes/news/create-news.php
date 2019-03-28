<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/4/2019
 * Time: 7:07 PM
 */
?>

<!--INIT-->
<?php
    ob_start();

    require_once(BASE_URL . 'classes/NewsFeed.php');
    require_once(BASE_URL . 'classes/NewsImages.php');
    ?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create News<?php if(isset($result)) echo $result; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form method="post" id="news-form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="news_title">News Title</label>
            <input id="news_title" name="news_title" class="form-control" placeholder="Event Name">
        </div>
        <div class="form-group">
            <label for="news_description">News Description</label>
            <textarea name="news_description" id="news_description" class="form-control" cols="30" rows="5" placeholder="Event Details"></textarea>
        </div>
<!-- TODO: FOR IMAGE; INTEGRATE THE MULTIPLE FILE SELECTOR MODULE -->
        <div class="form-group">
            <label>Select single file to upload:</label>
            <input type="file" name="files[]" multiple="multiple" />
        </div>
        <div class="form-group">
            <button class="btn btn-instagram" type="submit" name="create_news">Create News Feed</button>
        </div>
    </form>
</section>
<!-- /.content -->

<?php
    global $database;

    if(isset($_POST['create_news'])) {
        // Insert into news_feed
        $news_feed = new NewsFeed();
        $result = $news_feed->insertNews($_POST['news_title'], $_POST['news_description']);

        // Code for images
        $errors = array();
        $uploadedFiles = array();
        $extension = array("jpeg","jpg","png","gif");
        $bytes = 1024;
        $KB = 1024;
        $totalBytes = $bytes * $KB;
        $UploadFolder = BASE_URL . "upload-folder";

        $counter = 0;

        foreach($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
            $temp = $_FILES["files"]["tmp_name"][$key];
            $name = $_FILES["files"]["name"][$key];

            if(empty($temp)) {
                break;
            }

            $counter++;
            $UploadOk = true;

            if($_FILES["files"]["size"][$key] > $totalBytes) {
                $UploadOk = false;
                array_push($errors, $name . " file size is larger than the 1 MB.");
            }

            $ext = pathinfo($name, PATHINFO_EXTENSION);

            if(in_array($ext, $extension) == false) {
                $UploadOk = false;
                array_push($errors, $name . " is invalid file type.");
            }

            if(file_exists($UploadFolder . "/" . $name) == true) {
                $UploadOk = false;
                array_push($errors, $name . " file is already exist.");
            }

            if($UploadOk == true) {
                move_uploaded_file($temp,$UploadFolder . "/" . $name);
                array_push($uploadedFiles, $database->getConnection()->lastInsertId());
                array_push($uploadedFiles, $name);
            }
        }

//        if($counter > 0) {
//            if(count($errors)>0) {
//                echo "<b>Errors:</b>";
//                echo "<br/><ul>";
//                foreach($errors as $error) {
//                    echo "<li>" . $error . "</li>";
//                }
//                echo "</ul><br/>";
//            }
//
//            if(count($uploadedFiles) > 0) {
//                echo "<b>Uploaded Files:</b>";
//                echo "<br/><ul>";
//                for($i = 0; $i < count($uploadedFiles); $i++) {
//                    if($i % 2 == 0) continue;
//                    echo "<li>" . $uploadedFiles[$i] . "</li>";
//                }
//                echo "</ul><br/>";
//
//                echo count($uploadedFiles) . " file(s) are successfully uploaded.";
//            }
//        }
//        else {
//            echo "Please, Select file(s) to upload.";
//        }

        if(count($uploadedFiles) > 0) {
            // insert image name into database
            $news_image = new NewsImages();
            $result = $news_image->insertNewsImages($uploadedFiles);
        }

        header("Location: " . BASE_URL . "admin/news.php");
    }
?>