<!--create-event form-->
<form method="post" id="event-form" name="event_form">
    <div class="form-group">
        <label for="event_name">Event Name</label>
        <input id="event_name" name="event_name" class="form-control" placeholder="Event Name">
    </div>
    <div class="form-group">
        <label for="event_details">Event Details</label>
        <textarea name="event_details" id="event_details" class="form-control" cols="30" rows="5" placeholder="Event Details"></textarea>
    </div>
    <div class="form-group">
        <label for="event_coordinator">Event Coordinator</label>
        <select name="event_coordinator" id="event_coordinator" class="form-control" multiple="multiple" name="event_coordinators[]">
            <?php
                require_once(BASE_URL . 'classes/Staff.php');

                $staff = new Staff();
                $result_set = $staff->getAllStaff();

                foreach($result_set as $row) {
                    extract($row);
                    ?>
                    <option value="<?php echo $staff_id; ?>">
                        <?php echo $first_name.' '.$last_name ;?>
                    </option>
                    <?php
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="event_address">Event Address</label>
        <textarea name="event_address" id="event_address" class="form-control" cols="30" rows="5" placeholder="Event Address"></textarea>
    </div>
    <div class="form-group">
        <label for="event_type">Event Type</label>
        <input id="event_type" name="event_type" class="form-control" placeholder="Event Type">
    </div>
    <div class="form-group">
        <label for="event_institute_funding">Institute Funding</label>
        <input id="event_institute_funding" name="event_institute_funding" class="form-control" type="number" placeholder="Institute Funding">
    </div>
    <div class="form-group">
        <label for="event_sponsor_funding">Sponsor Funding</label>
        <input id="event_sponsor_funding" name="event_sponsor_funding" class="form-control" type="number" placeholder="Sponsor Funding">
    </div>
    <div class="form-group">
        <label for="event_start_date">Event Start Date</label>
        <input type="date" name="event_start_date" id="event_start_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="event_end_date">Event End Date</label>
        <input type="date" name="event_end_date" id="event_end_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="event_expenditure">Event Expenditure</label>
        <input id="event_expenditure" name="event_expenditure" class="form-control" type="number" placeholder="Event expenditure">
    </div>
    <div class="form-group">
        <label for="event_internal_participants">Internal Participants Count</label>
        <input id="event_internal_participants" name="event_internal_participants" class="form-control" type="number" placeholder="Internal Participants Count">
    </div>
    <div class="form-group">
        <label for="event_external_participants">External Participants Count</label>
        <input id="event_external_participants" name="event_external_participants" class="form-control" type="number" placeholder="External Participants Count">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" name="create_event" onclick="btnCreateEventClicked(event)">Create Event</button>
    </div>
</form>
