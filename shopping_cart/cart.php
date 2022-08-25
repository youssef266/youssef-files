<?php 
if (isset($_POST['submit'])) {
    foreach($_POST['quantity'] as $key => $val) {
        if($val==0 || $val==null) {
            unset($_SESSION['cart'][$key]);
        }else{
            $_SESSION['cart'][$key]['quantity']=$val;
        }
    }
}
?> 
   
<h1>View cart</h1> 
<a href="index.php?page=products">Go back to the products page.</a>
<form method="post" action="index.php?page=cart">
    <table>
        <tr>
            <th>product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Items Price</th>
        </tr>
        <?php 
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
       }else{ $stmt = $mysqli->prepare("SELECT * FROM products WHERE id_product IN ($strIds)");
        //    var_dump( $strIds);
            //  $stmt->bind_param("s", $strIds);
            $stmt->execute();
            $result = $stmt->get_result();
            $totalprice=0 ; 
            // var_dump($totalprice);
            while ($row = $result->fetch_assoc()) {
                $subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['price']; 
                $totalprice+=$subtotal; 
            ?>
             <?php
 if(empty($strIds)){
     echo "<p> you need to add products.</p>";
 }
 ?>
                <tr> 
                    <td><?php echo $row['name'] ?></td> 
                    <td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td> 
                    <td><?php echo $row['price'] ?>$</td> 
                    <td><?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?>$</td> 
                </tr> 
            <?php 
            }
        
        ?> 
        <tr> 
            <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
        </tr> 
        <?php
       }
       ?>
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 
</form> 
<br /> 
<p>To remove an item set its quantity to 0 or leave it empty. </p>