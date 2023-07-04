<?php
include ('../../app/controllers/user-controller.php');

$response = json_decode($_POST['register']);

if($response->active == true)
{
    $userController = new user_controller();
    $userController->Create($response->fullname, $response->email, $response->key, 'aaa');
}
else
{
    header('Location: ./');
}

?>