<?php

class User_middleware
{
    public function Password($password)
    {
        $regex = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/';
        if (preg_match($regex, $password)) {
            return true;
        } else {
            return false;
        }
    
        return false;
    }
    
    public function Email($mail)
    {
        $regex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        if (preg_match($regex, $mail)) {
            return true;
        } else {
            return false;
        }
    
        return false;
    }

    public function EmptyData($text)
    {
        if($text == null || empty($text))
        {
            return false;
        }
        else
        {
            return true;
        }
        return false;
    }
}

?>