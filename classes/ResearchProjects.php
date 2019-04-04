<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 6:48 PM
 */

require_once('Database.php');

if(session_status() == PHP_SESSION_NONE)
    session_start();


class ResearchProjects {
    private $connection;

    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getAllResearchProjects() {
        $sql = "SELECT * FROM research_projects WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function insertResearchProject($research_project_details) { // $research_project_details is an associative array.
        $staff_id = $_SESSION['staff_id'];
        extract($research_project_details);

        $sql = "INSERT INTO research_projects (staff_id, principal_investigator, grant_details, title, amount, year, created_by) VALUES ";
        $sql .= "(:staff_id, :principal_investigator, :grant_details, :title, :amount, :year, :created_by)";

        $ps = $this->connection->prepare($sql);
        $result = $ps->execute([
            "staff_id" => $staff_id,
            "title" => $title,
            "principal_investigator" => $principal_investigator,
            "grant_details" => $grant_details,
            "amount" => $amount,
            "year" => $year,
            "created_by" => $staff_id
        ]);

        return $result;
    }

    public function getResearchProjectById($research_projects_id) {
        $sql = "SELECT * FROM research_projects WHERE research_projects_id = :research_projects_id AND is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["research_projects_id" => $research_projects_id]);
        $result_row = $ps->fetch(PDO::FETCH_ASSOC); // Only one row is expected

        return $result_row;
    }

    // $research_project_details is an associative array,
    // which contains updated $research_project info with the research_project_id to be updated
    public function updateResearchProjectById($research_project_details) {
        extract($research_project_details);
        $updated_at = date('Y-m-d H:i:s');
        $updated_by = $_SESSION['staff_id'];

        $sql = "UPDATE research_projects SET title = :title, year = :year, grant_details = :grant_details, principal_investigator = :principal_investigator, amount = :amount, updated_by = :updated_by, updated_at = :updated_at WHERE research_projects_id = :research_projects_id";
        echo $sql;
        $ps = $this->connection->prepare($sql);
        $ps->execute([
            "title" => $title,
            "year" => $year,
            "grant_details" => $grant_details,
            "principal_investigator" => $principal_investigator,
            "amount" => $amount,
            "updated_by" => $updated_by,
            "updated_at" => $updated_at,
            "research_projects_id" => $research_projects_id
        ]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No. of affected rows: " . $ps->rowCount();
    }

    public function deleteResearchProjectById($research_projects_id) {
        $sql = "UPDATE research_projects SET is_deleted = 1 WHERE research_projects_id = :research_projects_id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["research_projects_id" => $research_projects_id]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No of affected rows: " . $ps->rowCount();
    }
}