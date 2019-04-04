<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 3/17/2019
 * Time: 9:41 AM
 */
define('BASE_URL', '../../../');
require_once(BASE_URL . 'classes/Database.php');

$columns = array("event_name", "event_details", "address", "event_type", "institute_funding", "sponsor_funding", "event_expenditure", "start_date", "end_date", "internal_participants_count", "external_participants_count");
$query = "SELECT * FROM events WHERE ";

if(isset($_POST["search"]["value"])) {
    $query .= "(event_name like '%".$_POST["search"]["value"]."%' OR event_details like '%". $_POST['search']['value']."%' OR address like '%". $_POST['search']['value']."%' OR event_type like '%". $_POST['search']['value']."%')";
}
if(isset($_POST["order"])) {
    $query .= " ORDER BY ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
}
else {
    $query .=" ORDER BY ".$columns[0]." ASC";
}

$query1 = "";

if($_POST["length"]!=-1) {
    $query1 = ' LIMIT ' .$_POST['start'] . ', ' .$_POST['length'];
}
$connection = $database->getConnection();
$statement = $connection->query($query.$query1);

$number_filtered_row = $statement->rowCount();

$data = array();
while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $sub_array = array();

    $sub_array[] = $row['event_name'];
    $sub_array[] = $row['event_details'] . '. Type: '. $row['event_type'];
    $sub_array[] = $row['address'];
    $sub_array[] = 'Institute: ' . $row['institute_funding'] . '<br>Sponsor: ' . $row['sponsor_funding'];
    $sub_array[] = $row['event_expenditure'];
    $sub_array[] = $row['start_date'] . ' to ' . $row['end_date'];
    $sub_array[] = 'Internal: ' . $row['internal_participants_count'] . ' External: ' . $row['external_participants_count'];
    $sub_array[] = "<button class='edit fa fa-pencil btn btn-success' id='".$row['event_id']."' data-toggle='modal' data-target='#edit_event_modal'></button>";
    $sub_array[] = "<button class='delete fa fa-trash btn btn-danger' id='".$row['event_id']."' data-toggle='modal' data-target='#delete_event_modal'></button>";
    $sub_array[] = "<a href='admin/events.php?q=" . $row['event_id'] . "' class='btn btn-info'><i class='fa fa-eye'></i></a>";
    $sub_array[] = "<a href='admin/events.php?q=" . $row['event_id'] . "&action=publish-as-news' class='btn btn-warning'><i class='fa fa-newspaper-o'></i></a>";
    //I may have to add some columns !!!

    $data[] = $sub_array;
}

function get_all_data() {
    global $connection;
    $query = "SELECT * from events";
    $statement=$connection->query($query);
    return $statement->rowCount();
}

$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data(),
    "recordsFiltered" => $number_filtered_row,
    "data" => $data,
);
echo json_encode($output);

