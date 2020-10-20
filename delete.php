<?php
    require_once('pdo.php');
    session_start();
    $delete_id=$_GET['delete_id'];
    $sql="delete from add_to_cart where email=:email and product_id=:product";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':email'=>$_SESSION['email'],':product'=>$delete_id));
?>