<?php
include_once('db.class.php');
$link = new Db();
$link->Connection;
{
public function __construct()
{
    try {
        // Conexion a la Base de Datos
        $this->connection = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
        //echo "Conexion Exitosa";
        $sql = "select c.category_name,p.image,p.product_name,p.price, date_format(p.start_date,'%d/%m/%Y') as date from products p inner join categories c on p.id_category=c.id_category order by p.price";
        $stmt =$this->connection->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "¡Error!: ";
        die();
    }
return $this->connection;
}
}
?>