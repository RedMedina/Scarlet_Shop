<?php
include ('../../app/controllers/user-controller.php');


$response = json_decode($_POST['response']);

if($response->active == true)
{
    $userController = new user_controller();
    $user = $userController->login($response->email, $response->key);
    if($user != null)
    {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['mail'] = $user['mail'];
        $_SESSION['uuid'] = $user['uuid'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['photo'] = $user['photo'];

        echo 'sesion iniciada';
        echo var_dump($user);
    }
    else
    {
        echo 'sesion fallida';
    }
}
else
{
    echo 'sesion fallida';
}

?>