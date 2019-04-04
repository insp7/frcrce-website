<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/29/2019
 * Time: 11:46 PM
 */
?>
<!--select-attribute-form-->
<form method="post" id="select-attribute-form" name="select-attribute-form">
    <div class="form-group">
        <label for="event_attr">Event Attributes</label>
        <select name="event_attr" id="event_attr" class="form-control" multiple="multiple" name="event_attr[]">
            <option value="1">event_name</option>
            <option value="2">event_details</option>
            <option value="3">address</option>
            <option value="4">event_type</option>
            <option value="5">institute_funding</option>
            <option value="6">sponsor_funding</option>
            <option value="7">event_expenditure</option>
            <option value="8">start_date</option>
            <option value="9">end_date</option>
            <option value="10">internal_participants_count</option>
            <option value="11">external_participants_count</option>
        </select>
    </div>

    <input type="text" hidden id="event-to-publish" value="<?php if(isset($_GET['q'])) echo intval($_GET['q']); ?>">

    <div class="form-group">
        <button class="btn btn-primary" name="publish_as_news" id="publish_as_news">Publish as News</button>
    </div>
</form>