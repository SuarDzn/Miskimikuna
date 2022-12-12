<?php
//lógica del negocio
//clases
class Users{
    //declarar variables
    private $users;
    private $db;

    //metodo constructor
    public function __construct(){
        $this->users = array();
        $this->db = new PDO('mysql:host=localhost; dbname=miskimikuna','root',"");
    }

    //metodos set y get
    public function getUsers(){
        $sql = "SELECT `user_id`,`name`,`last_name`,`email`,`user_type` FROM users";
        foreach ($this->db->query($sql) as $res) {
            $this->users[]=$res;
        }
        return $this->users;
    }
}
?>