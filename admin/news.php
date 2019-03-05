<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/5/2019
 * Time: 7:54 PM
 */

    if(isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'create' :
                header("Location: includes/news/create-news.php");
                break;

            case 'view' :
                header("Location: includes/news/view-news.php");
                break;
        }

    }
?>