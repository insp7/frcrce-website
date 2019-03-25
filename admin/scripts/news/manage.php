<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/19/2019
 * Time: 10:45 PM
 */

define('BASE_URL', '../../../');
require_once(BASE_URL . 'classes/Database.php');

$columns = array("news_id", "title", "description");
$query = "SELECT * FROM news_feed WHERE ";

if(isset($_POST["search"]["value"])) {
    $query .= "(title like '%".$_POST["search"]["value"]."%' OR description like '%". $_POST['search']['value']."%')";
}
if(isset($_POST["order"])){
    $query .= " ORDER BY ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
}
else{
    $query .=" ORDER BY ".$columns[0]." ASC";
}

$query1 = "";

if($_POST["length"]!=-1) {
    $query1 = ' LIMIT '.$_POST['start'] .','.$_POST['length'];
}
$connection = $database->getConnection();
$statement = $connection->query($query.$query1);

$number_filtered_row = $statement->rowCount();

$data = array();
while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $sub_array = array();

    if($row['is_deleted'] == 1) // Later remove this & add is_deleted = 0 in the WHERE condition of the query
        continue;

    $sub_array[] = $row["news_id"];
    $sub_array[] = $row["title"];
    $sub_array[] = $row["description"];
    $sub_array[] = "<button class='edit fa fa-pencil btn btn-success' id='" . $row['news_id'] . "' data-toggle='modal' data-target='#edit_news_modal'></button>";
    $sub_array[] = "<button class='delete fa fa-trash btn btn-danger' id='" . $row['news_id'] . "' data-toggle='modal' data-target='#delete_news_modal'></button>";
    $sub_array[] = "<a href='admin/news.php?q=" . $row['news_id'] . "' class='btn btn-info'><i class='fa fa-eye'></i></a>";
    //I may have to add some columns !!!

    $data[] = $sub_array;
}

function get_all_data() {
    global $connection;
    $query = "SELECT * from news_feed";
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
