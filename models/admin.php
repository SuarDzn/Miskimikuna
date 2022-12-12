<?php
//lógica del negocio
//clases
class Admin{
    //declarar variables
    private $admin;
    private $db;

    //metodo constructor
    public function __construct(){
        $this->admin = array();
        $this->db = new PDO('mysql:host=localhost; dbname=miskimikuna','root',"");
    }

    //metodos set y get
    public function getAdmin(){
        $sql = "SELECT `name`,`last_name`,`email` FROM users WHERE user_type = 1";

        foreach ($this->db->query($sql) as $res) {
            $this->admin[]=$res;
        }
        return $this->admin;
    }
}
?>