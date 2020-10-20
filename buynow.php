<?php
    session_start();
    require_once('pdo.php');
    for($i=0;$i<count($_GET['quantity']);$i++){
        $id=$_GET['product_list'][$i];
        $quantity=$_GET['quantity'][$i];
        echo $id.'<br>';
        echo $quantity.'<br>';
        $sql='update add_to_cart set quantity=:quantity,status="Purchased" where email=:email and status="Added To The Cart" and product_id=:product_id';
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(':quantity'=>$quantity,':email'=>$_SESSION['email'],':product_id'=>$id));
    }
?>