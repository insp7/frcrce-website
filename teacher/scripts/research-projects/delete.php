<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 6:21 PM
 */

if(isset($_POST['delete_research_project_id'])) {
    $research_project_id = intval($_POST['delete_research_project_id']);

    require_once('../../../classes/ResearchProjects.php');

    $research_projects = new ResearchProjects();
    $result = $research_projects->deleteResearchProjectById($research_project_id);

    echo $result;

} else {
    echo "delete_research_project_id NOT SET";
}