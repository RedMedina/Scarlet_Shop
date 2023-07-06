<?php
include ('../../app/controllers/user-controller.php');

//$response = json_decode($_POST['register'], true);

if(isset($_POST['active']))
{
    $targetDir = '../../public/img/users-imgs/';
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $maxFileSize = 5000000; //5MB
    $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif');

    if(getimagesize($_FILES['file']['tmp_name']) == true && file_exists($targetFile) == false && $_FILES['file']['size'] < $maxFileSize
       && in_array($imageFileType, $allowedFileTypes) == true)
    {
        move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
        $userController = new user_controller();
        $userController->Create($_POST['fullname'], $_POST['email'], $_POST['key'], $targetFile);
    }
}
else
{
    header('Location: ./');
}

?>