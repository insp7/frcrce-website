<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 9:08 PM
 */

define('BASE_URL', '../../../');
require_once(BASE_URL . "classes/Database.php");

$staff_id = $_GET['staff_id'];

$columns = array("year", "patents_published_count", "patents_granted_count");
$query = "SELECT * FROM ipr where staff_id = " . $staff_id . " AND is_deleted = 0"

if(isset($_POST["search"]["value"])){
//    $query .= "AND (first_name like '%".$_POST["search"]["value"]."%' OR last_name like '%". $_POST['search']['value']."%')";
}
if(isset($_POST["order"])){
    $query .= " ORDER BY ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
}
else{
    $query .=" ORDER BY ".$columns[0]." ASC";
}
$connection = $database->getConnection();
//echo $query;
$statement=$connection->query($query);
$number_filtered_row = $statement->rowCount();

$query1 = "";
if($_POST["length"]!=-1){
    $query1 = ' LIMIT '.$_POST['start'] .','.$_POST['length'];
}
$statement=$connection->query($query.$query1);

$data = array();
while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $sub_array = array();
    $sub_array[] = $row["year"];
    $sub_array[] = $row["patents_published_count"];
    $sub_array[] = $row["patents_granted_count"];
    $sub_array[] = "<a href='teacher/edit-ipr.php?id=" . $row['ipr_id'] . "' class='edit fa fa-pencil btn btn-success'></button>";
    $sub_array[] = "<button class='delete fa fa-trash btn btn-danger' id='" . $row['ipr_id'] . "''></button>";
    //I may have to add some columns !!!
    $data[] = $sub_array;
}

function get_all_data(){
    global $connection;
    $query = "SELECT * from ipr WHERE staff_id = :staff_id AND is_deleted = 0";
    $statement=$connection->prepare($query);
    $statement->execute(["staff_id" => $_GET['staff_id']]);
    return $statement->rowCount();
}

$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data(),
    "recordsFiltered" => $number_filtered_row, /*CALCULATING WITH HELP OF THIS NOT TOTAL RECORDS*/
    "data" => $data,
)

echo json_encode($output);