<?php

include ('../../app/middleware/user-middleware.php');

class User_model extends User_middleware
{
    protected $fullname = array(
        'val' => '',
        'null' => false,
        'mail' => false,
        'password' => false
    );
    protected $mail = array(
        'val' => '',
        'null' => false,
        'mail' => true,
        'password' => false
    );
    protected $password = array(
        'val' => '',
        'null' => false,
        'mail' => false,
        'password' => true
    );
    protected $uuid;
    protected $active;
    protected $photo;
    protected $id;
    protected $array_data = array();
   
    public function VerifyData()
    {
        $atributos = get_object_vars($this);
        $names = array_keys($atributos);
        $values = array_values($atributos);
        $correct = true;

        for ($i=0; $i < count($atributos); $i++) { 
           if(is_array($values[$i]))
           {
                if($values[$i]['null'] == false)
                {
                    if(!parent::EmptyData($values[$i]['val']))
                    {
                        $correct = false;
                    }
                }
                if($values[$i]['mail'] == true)
                {
                    if(!parent::Email($values[$i]['val']))
                    {
                        $correct = false;
                    }
                }
                if($values[$i]['password'] == true)
                {
                    if(!parent::Password($values[$i]['val']))
                    {
                        $correct = false;
                    }
                }
           }
        }

        return $correct;
    }
    
}

?>