<?php 
session_start(); 
require("includes/connection.php"); 
if(isset($_GET['page'])){ 
    $pages=array("products", "cart"); 
 
    if (in_array($_GET['page'], $pages)) { 
        $_page=$_GET['page']; 
    } else { 
        $_page="products"; 
    } 
} else { 
    $_page="products"; 
}  
?>  
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="css/reset.css" /> 
    <link rel="stylesheet" href="css/style.css" /> 
    <title>Shopping Cart</title> 
</head> 
   
<body> 
    <div id="container"> 
        <div id="main"> 
            <?php require($_page.".php"); ?> 
        </div><!--end of main--> 
 
        <div id="sidebar"> 
        <h1>Cart</h1> 
 
 <?php 
 if(isset($_SESSION['cart'])) {
     $arrProductIds=array();
  
     foreach ($_SESSION['cart'] as $id => $value) {
         $arrProductIds[] = $id;
     }
     $strIds=implode(",", $arrProductIds);
     ?>
     <?php
     if(empty($strIds)){
         echo "<p> you need to add products.</p>";
     ?>
  <?php
} else{  $stmt = $mysqli->prepare("SELECT * FROM products WHERE id_product IN ($strIds)");
    //  $stmt->bind_param("s", $strIds);
     $stmt->execute();
     $result = $stmt->get_result();
  
     while ($row = $result->fetch_assoc()) {
     ?>
         <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?></p>
     <?php
     } 
 ?>
     <hr />
     <a href="index.php?page=cart">Go to cart</a>
 <?php
} 
} else {
     echo "<p>Your Cart is empty. Please add some products.</p>";
 }
 ?>
        </div><!--end of sidebar--> 
    </div><!--end container--> 
</body> 
</html>