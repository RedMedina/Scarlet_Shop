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

        //echo 'sesion iniciada';
        echo json_encode(array("message" => 'Sesion iniciada!', 'signal' => 0, 'correct' => 'success'));
    }
    else
    {
        //echo 'sesion fallida';
        echo json_encode(array("message" => 'Correo o contraseña incorrectos!', 'signal' => 1, 'correct' => 'error'));
    }
}
else
{
    //echo 'sesion fallida';
    echo json_encode(array("message" => 'Correo o contraseña incorrectos!', 'signal' => 1, 'correct' => 'error'));
}

?>