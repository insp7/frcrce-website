<?php
/**
 * Created by PhpStorm.
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
    $query .=" ORDER BY ".$columns[0]." ASC";
}

$connection = $database->getConnection();
$statement=$connection->query($query);

$number_filtered_row = $statement->rowCount();

$query1 = "";

if($_POST["length"]!=-1) {
    $query1 = ' LIMIT '.$_POST['start'] .','.$_POST['length'];
}

$statement=$connection->query($query.$query1);

$export = '';
if(isset($_GET['export'])) {
    $export = $_GET['export'];
}

$data = array();
while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $sub_array = array();

    $sub_array[] = $row["staff_id"];
    $sub_array[] = $row["title"];
    $sub_array[] = $row["year"];
    $sub_array[] = $row["journal"];
    $sub_array[] = $row["is_ugc_approved"];
    $sub_array[] = $row["citation"];
    if($export == '') {
        $sub_array[] = "<button class='edit fa fa-pencil btn btn-success' id='" . $row['publication_id'] . "' data-toggle='modal' data-target='#editModal'></button>";
        $sub_array[] = "<button class='delete fa fa-trash btn btn-danger' id='" . $row['publication_id'] . "' data-toggle='modal' data-target='#deleteModal'></button>";
    }
    //I may have to add some columns !!!

    $data[] = $sub_array;
}

function get_all_data() {
    global $connection;
    $query = "SELECT * from publications";
    $statement=$connection->query($query);
    return $statement->rowCount();
}

$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data(),
    "recordsFiltered" => $number_filtered_row, /*CALCULATING WITH HELP OF THIS NOT TOTAL RECORDS*/
    "data" => $data,
);
echo json_encode($output);

