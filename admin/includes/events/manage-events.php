<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 3/17/2019
 * Time: 9:40 AM
 */
?>

<div class="row">
    <div class="col-md-12">
            <a href="javascript:;" class="btn btn-danger">
                <i class="fa fa-list"></i> Add Event</a>
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
                <table class="table table-striped table-hover table-bordered dataTable" id="event_list">
                    <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Event Details</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                </table>
            </div>
        </div>

    </div>


    <!--EDIT BUTTON MODAL-->
    <div class="modal modal-warning fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Category!</h4>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <form action="http://<?php echo BASE_SERVER;?>/erp/pages/scripts/category/edit.php" method="POST">
                            <div class="form-body">
                                <div class="form-group clearfix">

                                    <div class="col-md-9">
                                        <input type="hidden" id="edit_category_id" name="category_id" class="form-control" placeholder="Category ID" /> </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Category Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Category Name" /> </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">HSN Code
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="hsn_code" name="hsn_code" class="form-control" placeholder="HSN Code" readonly/> </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">GST Rate
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="gst_rate" name="gst_rate" class="form-control" placeholder="GST Rate" readonly/> </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_category" class="btn btn-primary">Save changes</button>
                                </div>

                            </div>
                        </form>
                    </div>


                </div>

            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--END OF EDIT BUTTON MODAL-->

    <!--DELETE MODAL-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="delete?" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure, you want to delete this entry</p>
                </div>
                <div class="modal-footer">
                    <form action="http://localhost/erp/pages/scripts/category/delete.php"method="POST">
                        <input type="hidden" id="recordID" name="category_id">
                        <button type="submit" class="btn red" name="deleteBtn" >Yes</button>
                        <button type="button" class="btn blue" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END OF DELETE MODAL-->

</div>



