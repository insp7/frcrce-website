<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: Aniket
 * Date: 4/1/2019
 * Time: 11:02 PM
 */


define('BASE_URL', '../../../');
require_once(BASE_URL."classes/Database.php");

$staff_id = $_GET['staff_id'];

$columns = array("staff_id", "title", "year", "journal", "is_ugc_approved", "citation");
$query = "SELECT * FROM publications WHERE staff_id = " . $staff_id;

if(isset($_POST["search"]["value"])) {
    $query .= " (staff_id like '%".$_POST["search"]["value"]."%' OR title like '%". $_POST['search']['value']."%' OR year like '%". $_POST['search']['value']."%' OR journal like '%". $_POST['search']['value']."%' OR citation like '%". $_POST['search']['value']."%')";
}
if(isset($_POST["order"])) {
    $query .= " ORDER BY ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
}
else {
=======
 * User: Dhananjay
 * Date: 4/1/2019
 * Time: 12:35 PM
 */

define('BASE_URL', '../../../');
require_once(BASE_URL . "classes/Database.php");

$staff_id = $_GET['staff_id'];

$columns = array("title","year","journal","is_ugc_approved");
$query = "SELECT * FROM publications where teacher_id = " . $staff_id;

if(isset($_POST["search"]["value"])){
//    $query .= "AND (first_name like '%".$_POST["search"]["value"]."%' OR last_name like '%". $_POST['search']['value']."%')";
}
if(isset($_POST["order"])){
    $query .= " ORDER BY ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
}
else{
>>>>>>> 96abfccc8258b5eb2e8094d52ca03546293630e8
    $query .=" ORDER BY ".$columns[0]." ASC";
}

$connection = $database->getConnection();
<<<<<<< HEAD
=======
//echo $query;
>>>>>>> 96abfccc8258b5eb2e8094d52ca03546293630e8
$statement=$connection->query($query);

$number_filtered_row = $statement->rowCount();

$query1 = "";

<<<<<<< HEAD
if($_POST["length"]!=-1) {
=======
if($_POST["length"]!=-1){
>>>>>>> 96abfccc8258b5eb2e8094d52ca03546293630e8
    $query1 = ' LIMIT '.$_POST['start'] .','.$_POST['length'];
}

$statement=$connection->query($query.$query1);

<<<<<<< HEAD
$export = '';
if(isset($_GET['export'])) {
    $export = $_GET['export'];
}

$data = array();
while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $sub_array = array();

    $sub_array[] = $row["staff_id"];
=======

$data = array();
while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $sub_array = array();

>>>>>>> 96abfccc8258b5eb2e8094d52ca03546293630e8
    $sub_array[] = $row["title"];
    $sub_array[] = $row["year"];
    $sub_array[] = $row["journal"];
    $sub_array[] = $row["is_ugc_approved"];
<<<<<<< HEAD
    $sub_array[] = $row["citation"];
    if($export == '') {
        $sub_array[] = "<button class='edit fa fa-pencil btn btn-success' id='" . $row['publication_id'] . "' data-toggle='modal' data-target='#editModal'></button>";
        $sub_array[] = "<button class='delete fa fa-trash btn btn-danger' id='" . $row['publication_id'] . "' data-toggle='modal' data-target='#deleteModal'></button>";
    }
=======
    $sub_array[] = "<button class='edit fa fa-eye btn btn-success' id='".$row['publication_id']."' data-toggle='modal' data-target='#editModal'></button>";
    $sub_array[] = "<button class='edit fa fa-pencil btn btn-success' id='".$row['publication_id']."' data-toggle='modal' data-target='#editModal'></button>";
    $sub_array[] = "<button class='delete fa fa-trash btn btn-danger' id='".$row['publication_id']."' data-toggle='modal' data-target='#deleteModal'></button>";
>>>>>>> 96abfccc8258b5eb2e8094d52ca03546293630e8
    //I may have to add some columns !!!

    $data[] = $sub_array;
}

<<<<<<< HEAD
function get_all_data() {
    global $connection;
    $query = "SELECT * from publications";
    $statement=$connection->query($query);
=======
function get_all_data(){
    global $connection;
    $query = "SELECT * from publications WHERE teacher_id = :staff_id";
    $statement=$connection->prepare($query);
    $statement->execute(["staff_id" => $_GET['staff_id']]);
>>>>>>> 96abfccc8258b5eb2e8094d52ca03546293630e8
    return $statement->rowCount();
}

$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data(),
<<<<<<< HEAD
    "recordsFiltered" => $number_filtered_row, /*CALCULATING WITH HELP OF THIS NOT TOTAL RECORDS*/
=======
    "recordsFiltered" => $number_filtered_row,/*CALCULATING WITH HELP OF THIS NOT TOTAL RECORDS*/
>>>>>>> 96abfccc8258b5eb2e8094d52ca03546293630e8
    "data" => $data,
);
echo json_encode($output);

