<?php
require("../includes/connection.php");
$product_name=$_POST['name'];
$description=$_POST['description'];
$price=$_POST['price'];
if(empty($_POST['name'])){
    echo "the product name is empty";
}else{
    $sql="INSERT INTO `products` (`name`,`description`,`price`)
            VALUES ('$product_name','$description','$price')";
        $result = $mysqli->query($sql);
}