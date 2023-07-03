<?php include('../app/routes/api.php'); ?>

<?php include('templates/header.php'); ?>

<?php

if (isset($_GET['url']))
{
    $url = $_GET['url'];
    $url = rtrim($url, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    // Divide la URL en segmentos
    $segments = explode('/', $url);
    // Obtiene el primer segmento de la URL
    $page = $segments[1];

    $app_token = $routes->GetRoute('/'.$page);

    if($app_token==='404')
    {
        echo 'error 404 xd';
    }
    else
    {
        include($app_token['file']);
    }
}

?>

<?php include('templates/footer.php'); ?>