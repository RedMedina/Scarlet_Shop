<?php
include('routes-model.php');

$routes = new Routes();
$app_token = '';
$base_url = 'localhost:8080/Scarlet_Shop/public';

function Redirect($Link)
{
    global $base_url;
    if($Link === '/')
    {
        echo './';
    }
    else
    {
        echo substr($Link, 1);
    }
}

$routes->Create('/Login', 'html/Login.php');
$routes->Create('/SignUp', '../app/views/SignUp_view.php');

?>