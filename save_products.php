<?php

$product = $_POST['producto'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
include_once("config_products.php");
include_once("db.class.php");
$link = new Db();
// La conexión
include_once('upload_image.php');
$path_img = $directorio . $nombre_img; // Ruta completa de la imagen levantada
$sql = "insert into products (product_name,image,price,id_category) values
(:product,:path_img,:price,:category)";
