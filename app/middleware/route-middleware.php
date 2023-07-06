<?php

class routes_middleware
{
    public function RolAuth($Rol_Auth)
    {
        if($Rol_Auth == $_SESSION['User_rol'])
        {
            return true;
        }
        else
        {
            return false;
        }
        return false;
    }
    
    public function Authsession()
    {
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    
        return false;
    }
    
    public function AuthToken($id)
    {
        if($_SESSION['uuid']==$id)
        {
            return true;
        }
        else
        {
            return false;
        }
    
        return false;
    }
}

?>