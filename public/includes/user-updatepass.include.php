<?php
include ('../../app/controllers/user-controller.php');

$response = json_decode($_POST['response']);

if($response->active == true)
{
    if($response->new_pass == $response->c_new_pass)
    {
        session_start();
        $userController = new user_controller();
        if($userController->update_password($response->actual_pass, $response->new_pass, $_SESSION['id']))
        {
            echo json_encode(array("message" => 'Usuario actualizado correctamente!', 'signal' => 0, 'correct' => 'success'));
        }
        else
        {
            echo json_encode(array("message" => 'Error con la contraseña', 'signal' => 1, 'correct' => 'error'));
        }
    }
    else
    {
        echo json_encode(array("message" => 'Error con la contraseña', 'signal' => 1, 'correct' => 'error'));
    }
    
}

?>