<?php
//lógica del negocio
//clases
class Orders{
    //declarar variables
    private $orders;
    private $db;

    //metodo constructor
    public function __construct(){
        $this->orders = array();
        $this->db = new PDO('mysql:host=localhost; dbname=miskimikuna','root',"");
    }

    //metodos set y get
    public function getOrders(){
        $sql = "SELECT o.order_id, o.customer_id, o.product_id, c.name, c.last_name, p.description, o.address, o.quantity, p.price
        FROM orders o, customers c, products p
        WHERE o.customer_id = c.customer_id and o.product_id = p.product_id";

        foreach ($this->db->query($sql) as $res) {
            $this->orders[]=$res;
        }
        return $this->orders;
    }
}
?>