<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/19/2019
 * Time: 10:28 PM
 */
?>

<div class="row">
    <div class="col-md-12">
        <a href="admin/news.php?q=add" class="btn btn-danger">
            <i class="fa fa-plus"></i> &nbsp;Create News</a>
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
                <table class="table table-striped table-hover table-bordered dataTable" id="news_list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>News title</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <!--EDIT BUTTON MODAL-->
    <div class="modal modal-warning fade" tabindex="-1" role="dialog" id="edit_news_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit News!</h4>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <form method="POST">
                            <div class="form-body">
                                <div class="form-group clearfix">
                                    <div class="col-md-9">
                                        <input type="hidden" id="edit_news_id" name="news_id" class="form-control" placeholder="News ID" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">News title
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="news_title" name="news_title" class="form-control" placeholder="News title" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Description
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="news_desc" name="news_desc" class="form-control" placeholder="News Description" />
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="update_news" name="update_news" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        <!-- End of .form-body -->
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
    <div class="modal fade" id="delete_news_modal" tabindex="-1" role="dialog" aria-labelledby="deleteNewsModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="delete?" id="deleteNewsModal">Delete news</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure, you want to delete this entry</p>
                </div>
                <div class="modal-footer">
                    <form action="http://localhost/frcrce/admin/scripts/news/delete.php" method="POST">
                        <input type="hidden" id="news_id" name="news_id">
                        <button type="submit" class="btn red" name="deleteBtn" id="delete_news">Yes</button>
                        <button type="button" class="btn blue" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END OF DELETE MODAL-->

</div>
