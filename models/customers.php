<?php
//lógica del negocio
//clases
class Customers{
    //declarar variables
    private $customers;
    private $db;

    //metodo constructor
    public function __construct(){
        $this->customers = array();
        $this->db = new PDO('mysql:host=localhost; dbname=miskimikuna','root',"");
    }

    //metodos set y get
    public function getCustomers(){
        $sql = "SELECT customer_id,`name`, last_name, email FROM customers";

        foreach ($this->db->query($sql) as $res) {
            $this->customers[]=$res;
        }
        return $this->customers;
    }
}
?>