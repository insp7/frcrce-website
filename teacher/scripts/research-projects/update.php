<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 6:22 PM
 */

if(isset($_POST['updated_research_project_json_string'])) {
    require_once('../../../classes/ResearchProjects.php');

    $updated_research_project_info = json_decode($_POST['updated_research_project_json_string'], true);

    $research_projects = new ResearchProjects();
    $result = $research_projects->updateResearchProjectById($updated_research_project_info);

    echo $result;
} else {
    echo "updated_research_project_json_string NOT SET";
}