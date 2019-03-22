<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/21/2019
 * Time: 10:37 PM
 */

if(session_status() == PHP_SESSION_NONE)
    session_start();

if(!(isset($_SESSION['student_id']) || isset($_SESSION['staff_id'])))
    header("Location: " . BASE_URL . "login.php");
