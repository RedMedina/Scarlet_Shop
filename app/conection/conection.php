<?php
include('env_reader.php');

class conection extends EnvReader
{

    private $conexion;

    public function __construct() {
        parent::__construct();
    }

    public function contect()
    {
        $this->conexion = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbname);
        return $this->conexion;
    }

    public function Close()
    {
        $this->conexion->close();
    }

    public function GetConextion()
    {
        return $this->$conexion;
    }

}

?>