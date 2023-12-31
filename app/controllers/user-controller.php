<?php
include ('../../app/conection/conection.php');
include ('../../app/models/user-model.php');

class user_controller extends User_model
{

    private $conection;

    public function Create($fullname, $mail, $password, $photo)
    {
        $this->fullname['val'] = $fullname;
        $this->mail['val'] = $mail;
        $this->password['val'] = $password;

        if(parent::VerifyData())
        {
            $conection = new conection();
            $con = $conection->contect();
            $Statement = $con->prepare('INSERT INTO user (uuid, user_name, user_key, active, creation_date, update_date)
            VALUES (?, ?, ?, true, sysdate(), sysdate())');
            $uuid = mt_rand() . uniqid();
            $uuid = substr($uuid, 0, 10);
            $password = password_hash($password, PASSWORD_BCRYPT);
            $Statement->bind_param('sss', $uuid, $mail, $password);
            $Statement->execute();
            $Statement->close();
    
            $Statement = $con->prepare('INSERT INTO data_user (name, photo_url, user_id, update_date)
            VALUES (?, ?, ?, sysdate())');
            $userId = $con->insert_id;
            $Statement->bind_param('sss', $fullname, $photo, $userId);
            $Statement->execute();
            $Statement->close();
            $conection->Close();

            return true;
        }
        else
        {
            return false;
        }
        return false;
    }

    public function update($fullname, $mail, $photo, $id)
    {
        $this->fullname['val'] = $fullname;
        $this->mail['val'] = $mail;
        $this->password = '';

        if(parent::VerifyData())
        {
            $conection = new conection();
            $con = $conection->contect();
            $Statement = $con->prepare('UPDATE user SET user_name = ?, update_date = sysdate() WHERE id = ?');
            $Statement->bind_param('ss', $mail, $id);
            $Statement->execute();

            $Statement = $con->prepare('UPDATE data_user SET name = ?, photo_url = ?, update_date = sysdate() WHERE user_id = ?');
            $Statement->bind_param('sss', $fullname, $photo, $id);
            $Statement->execute();
            $Statement->close();
            $conection->Close();

            return true;
        }
        else
        {
            return false;
        }

        return false;
    }

    public function update_password($actual_password, $new_password, $id)
    {
        $this->fullname = '';
        $this->mail = '';
        $this->password['val'] = $new_password;
        if(parent::VerifyData())
        {
            $conection = new conection();
            $con = $conection->contect();
            $Statement = $con->prepare('SELECT user_key from user WHERE id = ?');
            $Statement->bind_param("s", $id);
            $Statement->execute();
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                if(password_verify($actual_password, $row['user_key']))
                {
                    if($actual_password == $new_password)
                    {
                        $Statement->close();
                        $conection->Close();

                        return false;
                    }
                    else
                    {
                        $Statement = $con->prepare('UPDATE user SET user_key = ?, update_date = sysdate() WHERE id = ?');
                        $new_password = password_hash($new_password, PASSWORD_BCRYPT);
                        $Statement->bind_param('ss', $new_password, $id);
                        $Statement->execute();
                        
                        $Statement->close();
                        $conection->Close();

                        return true;
                    }
                }
                else
                {
                    $Statement->close();
                    $conection->Close();

                    return false;
                }
            }
            $Statement->close();
            $conection->Close();

            return false;
        }
        else
        {
            return false;
        }

        return false;
    }

    public function login($email, $password)
    {
        $conection = new conection();
        $con = $conection->contect();

        $Statement = $con->prepare('SELECT user.id, uuid, user_name, active, name, photo_url, user_key FROM user, data_user WHERE user_name = ? AND active = 1 AND user_id = user.id');
        $Statement->bind_param("s", $email);
        $Statement->execute();
        $result = $Statement->get_result();
        $user = null;
        while ($row = $result->fetch_assoc()) {
            if(password_verify($password, $row['user_key']))
            {
                $this->fullname['val'] = $row['name'];
                $this->mail['val'] = $row['user_name'];
                $this->uuid = $row['uuid'];
                $this->id = $row['id'];
                $this->active = $row['active'];
                $this->photo = $row['photo_url'];
                $user = array(
                    'fullname' => $this->fullname['val'],
                    'mail' => $this->mail['val'],
                    'uuid' => $this->uuid,
                    'id' => $this->id,
                    'active' => $this->active,
                    'photo' => $this->photo
                );
            }
        }
        $Statement->close();
        $con->Close();

        return $user;
    }

}

?>