<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 3/17/2019
 * Time: 9:35 PM
 */

class Database {
    private $host       =   "localhost";
    private $db_name    =   "frcrcedb";
    private $username   =   "root";
    private $password   =   "";
    private $conn       =   null;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
        } catch(PDOException $e) {
            die("Issue : " . $e->getMessage());
        }
    }
    public function getConnection() {
        return $this->conn;
    }
}

$db = new Database();
$connection = $db->getConnection();

$sql = "SELECT * FROM events";
$statement = $connection->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();
print_r($result);










