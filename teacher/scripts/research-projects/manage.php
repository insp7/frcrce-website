<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 6:21 PM
 */

define('BASE_URL', '../../../');
require_once(BASE_URL . "classes/Database.php");
require_once(BASE_URL . "classes/Staff.php");

$staff_id = $_GET['staff_id'];
$columns = array("title","year","journal","is_ugc_approved");

$query = "SELECT * FROM research_projects where staff_id = " . $staff_id . " AND is_deleted = 0";

if(isset($_POST["search"]["value"])) {
//    $query .= " AND (grant_details like '%".$_POST["search"]["value"]."%' OR title like '%". $_POST['search']['value']."%' OR amount like '%". $_POST['search']['value']."%')";
}
if(isset($_POST["order"])) {
    $query .= " ORDER BY ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
}
else {
    $query .=" ORDER BY ".$columns[0]." ASC";
}
$connection = $database->getConnection();
//echo $query;
$statement = $connection->query($query);
$number_filtered_row = $statement->rowCount();
$query1 = "";
if($_POST["length"]!=-1){
    $query1 = ' LIMIT '.$_POST['start'] .','.$_POST['length'];
}
$statement=$connection->query($query.$query1);

$data = array();
$staff = new Staff();
while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

    // Get staff name by id
    $principal_investigator = intval($row['principal_investigator']);
    $staff_name = $staff->getStaffNameById($principal_investigator);

    $sub_array = array();
    $sub_array[] = $staff_name; // Because Principal investigator is a staff
    $sub_array[] = $row["grant_details"];
    $sub_array[] = $row["title"];
    $sub_array[] = $row["amount"];
    $sub_array[] = $row["year"];
    $sub_array[] = "<a href='teacher/edit-research-project.php?id=" . $row['research_projects_id'] . "' class='edit fa fa-pencil btn btn-success'></button>";
    $sub_array[] = "<button class='delete fa fa-trash btn btn-danger' id='" . $row['research_projects_id'] . "''></button>";
    //I may have to add some columns !!!
    $data[] = $sub_array;
}

function get_all_data() {
    global $connection;
    $query = "SELECT * from research_projects WHERE staff_id = :staff_id AND is_deleted = 0";
    $statement=$connection->prepare($query);
    $statement->execute(["staff_id" => $_GET['staff_id']]);
    return $statement->rowCount();
}

$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data(),
    "recordsFiltered" => $number_filtered_row, /*CALCULATING WITH HELP OF THIS NOT TOTAL RECORDS*/
    "data" => $data,
);

echo json_encode($output);