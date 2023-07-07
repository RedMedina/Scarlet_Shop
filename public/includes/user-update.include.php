<?php
include ('../../app/controllers/user-controller.php');

if(isset($_POST['active']))
{

    session_start();

    if(isset($_FILES['file']))
    {
        $targetDir = '../../public/img/users-imgs/';
        $uuid = mt_rand() . uniqid();
        $uuid = substr($uuid, 0, 10);
        $targetFile = $targetDir . basename($_FILES['file']['name']);
        $savefile = 'img/users-imgs/' . $uuid;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $maxFileSize = 10000000; //10MB
        $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif');
        if(getimagesize($_FILES['file']['tmp_name']) == true && file_exists($targetDir.$uuid) == false && $_FILES['file']['size'] < $maxFileSize
           && in_array($imageFileType, $allowedFileTypes) == true)
        {
            unlink('../../public/'.$_SESSION['photo']);
            move_uploaded_file($_FILES['file']['tmp_name'], $targetDir.$uuid.'.'.$imageFileType);
            $_SESSION['photo'] = $savefile.'.'.$imageFileType;
        }
    }

    $userController = new user_controller();
    if($userController->update($_POST['fullname'], $_POST['email'], $_SESSION['photo'], $_SESSION['id']))
    {
        $_SESSION['fullname'] = $_POST['fullname'];
        $_SESSION['mail'] = $_POST['email'];
        echo json_encode(array("message" => 'Usuario actualizado correctamente!', 'signal' => 0, 'correct' => 'success'));
    }
    else
    {
        //echo 'creacion fallida img';
        echo json_encode(array("message" => 'Error subiendo la imagén', 'signal' => 1, 'correct' => 'error'));
    }
}


?>