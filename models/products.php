<?php
//lógica del negocio
//clases
class Products{
    //declarar variables
    private $products;
    private $db;

    //metodo constructor
    public function __construct(){
        $this->products = array();
        $this->db = new PDO('mysql:host=localhost; dbname=miskimikuna','root',"");
    }

    //metodos set y get
    public function getProducts(){
        $sql = "SELECT product_id, `description`, price, `type`,img_url  FROM products";

        foreach ($this->db->query($sql) as $res) {
            $this->products[]=$res;
        }
        return $this->products;
    }
}
?>