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
            <a href="admin/events.php?q=add" class="btn btn-danger">
                <i class="fa fa-plus"></i> &nbsp;Create Event
            </a>
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
                        <th>Funding</th>
                        <th>expenditure</th>
                        <th>event_duration</th>
                        <th>participant_count</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                </table>
            </div>
        </div>

    </div>


    <!--EDIT BUTTON MODAL-->
    <div class="modal modal-warning fade -th-large" tabindex="-1" role="dialog" id="edit_event_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Category!</h4>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <form method="POST">
                            <div class="form-body">
                                <div class="form-group clearfix">
                                    <div class="col-md-9">
                                        <input type="hidden" id="edit_event_id" name="event_id" class="form-control" placeholder="Event ID" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Event name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="event_name" name="event_name" class="form-control" placeholder="Event name" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Event Details
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="event_details" name="event_details" class="form-control" placeholder="Event Details" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Address
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="address" name="address" class="form-control" placeholder="Address" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Event type
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="event_type" name="event_type" class="form-control" placeholder="Event type" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Institute funding
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="number" id="institute_funding" name="institute_funding" class="form-control" placeholder="Institute funding" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">sponsor_funding
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="number" id="sponsor_funding" name="sponsor_funding" class="form-control" placeholder="Sponsor funding" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Event Expenditure
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="number" id="event_expenditure" name="event_expenditure" class="form-control" placeholder="Event Expenditure" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">start_date
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="date" id="start_date" name="start_date" class="form-control" placeholder="start_date" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">end_date
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="date" id="end_date" name="end_date" class="form-control" placeholder="end_date" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">internal_participants_count
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="number" id="internal_participants_count" name="internal_participants_count" class="form-control" placeholder="internal_participants_count" />
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">external_participants_count
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="number" id="external_participants_count" name="external_participants_count" class="form-control" placeholder="external_participants_count" />
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="update_event" name="update_event" class="btn btn-primary">Save changes</button>
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
    <div class="modal fade" id="delete_event_modal" tabindex="-1" role="dialog" aria-labelledby="deleteEventModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="delete?" id="deleteEventModal">Delete Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure, you want to delete this entry</p>
                </div>
                <div class="modal-footer">
                    <form action="http://localhost/frcrce/admin/scripts/news/delete.php" method="POST">
                        <input type="hidden" id="event_id" name="event_id">
                        <button type="submit" class="btn red" name="deleteBtn" id="delete_event" >Yes</button>
                        <button type="button" class="btn blue" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END OF DELETE MODAL-->

</div>



