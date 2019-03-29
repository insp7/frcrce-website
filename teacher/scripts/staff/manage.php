<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 3/17/2019
 * Time: 9:41 AM
 *
 *
 * COLUMNS: first_name,last_name,contact_
 */
define('BASE_URL', '../../../');
require_once(BASE_URL."classes/Database.php");

$columns = array("first_name","last_name","contact_no","date_of_birth","email","gender");
$query = "SELECT * FROM staff WHERE role != 'admin' AND";

if(isset($_POST["search"]["value"])){
    $query .= " (first_name like '%".$_POST["search"]["value"]."%' OR last_name like '%". $_POST['search']['value']."%')";
}
if(isset($_POST["order"])){
    $query .= " ORDER BY ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
}
else{
    $query .=" ORDER BY ".$columns[0]." ASC";
}

$connection = $database->getConnection();
$statement=$connection->query($query);

$number_filtered_row = $statement->rowCount();

$query1 = "";

if($_POST["length"]!=-1){
    $query1 = ' LIMIT '.$_POST['start'] .','.$_POST['length'];
}

$statement=$connection->query($query.$query1);


$data = array();
while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $sub_array = array();

    $sub_array[] = $row["first_name"];
    $sub_array[] = $row["last_name"];
    $sub_array[] = $row["date_of_birth"];
    $sub_array[] = $row["email"];
    $sub_array[] = $row["gender"];
    $sub_array[] = $row["contact_no"];
    $sub_array[] = "<button class='edit fa fa-pencil btn btn-success' id='".$row['staff_id']."' data-toggle='modal' data-target='#editModal'></button>";
    $sub_array[] = "<button class='delete fa fa-trash btn btn-danger' id='".$row['staff_id']."' data-toggle='modal' data-target='#deleteModal'></button>";
    //I may have to add some columns !!!

    $data[] = $sub_array;
}

function get_all_data(){
    global $connection;
    $query = "SELECT * from staff WHERE role != 'admin'";
    $statement=$connection->query($query);
    return $statement->rowCount();
}

$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data(),
    "recordsFiltered" => $number_filtered_row,/*CALCULATING WITH HELP OF THIS NOT TOTAL RECORDS*/
    "data" => $data,
);
echo json_encode($output);

