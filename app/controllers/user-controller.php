<?php
include ('../../app/conection/conection.php');
include ('../../app/models/user-model.php');

class user_controller extends User_model
{

    private $conection;

    public function Create($fullname, $mail, $password, $photo)
    {
        $conection = new conection();
        $con = $conection->contect();

        $Statement = $con->prepare('INSERT INTO user (uuid, user_name, user_key, active, creation_date, update_date)
        VALUES (?, ?, ?, true, sysdate(), sysdate())');
        $uuid = 11;
        $Statement->bind_param('sss', $uuid, $mail, $password);
        $Statement->execute();
        $Statement->close();

        $Statement = $con->prepare('INSERT INTO data_user (name, photo_url, user_id, update_date)
        VALUES (?, ?, ?, sysdate())');
        $idd = 2;
        $Statement->bind_param('sss', $fullname, $photo, $idd);
        $Statement->execute();
        $Statement->close();
        $conection->Close();
    }

}

?>