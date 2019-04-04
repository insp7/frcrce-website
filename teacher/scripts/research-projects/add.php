<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 6:21 PM
 */

if(isset($_POST['research_project_details_json_string'])) {
    $research_projects_info = json_decode($_POST['research_project_details_json_string'], true);

    require_once('../../../classes/ResearchProjects.php');

    $research_projects = new ResearchProjects();
    $result = $research_projects->insertResearchProject($research_projects_info);

    if($result)
        echo "true";
    else
        echo "false";
} else {
    echo "data not set";
}