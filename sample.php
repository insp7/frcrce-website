<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/21/2019
 * Time: 11:03 PM
 */


if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";

// Here append the common URL characters.
$link .= "://";

// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
$link .= $_SERVER['REQUEST_URI'];

echo $link;