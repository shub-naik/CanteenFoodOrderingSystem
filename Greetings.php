<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
        require_once('bootstrap.php');
        session_start();
        require_once('pdo.php');  
        $sql='select * from add_to_cart where email=:email and status="Purchased"';
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(':email'=>$_SESSION['email']));
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $sql_select='select product_name from products where product_id=:product_id';
            $stmt2=$pdo->prepare($sql_select);
            $stmt2->execute(array(':product_id'=>$row['product_id']));
            $row_select=$stmt2->fetch(PDO::FETCH_ASSOC);
            $t=date('d-m-Y');
            $sql='insert into purchased(email,product_id,product_name,quantity,purchased_time) values(:email,:product_id,:product_name,:quantity,:purchased_time)';
            $stmt1=$pdo->prepare($sql);
            $stmt1->execute(array(':email'=>$_SESSION['email'],':product_id'=>$row['product_id'],':product_name'=>$row_select['product_name'],':quantity'=>$row['quantity'],':purchased_time'=>$t));
        }
        $sql='delete from add_to_cart where email=:email and status="Purchased"';
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(':email'=>$_SESSION['email']));
    ?>
    <title>Confirmed Page</title>
</head>
<body style='margin:10px;'>
<div class="alert alert-success" role="alert">
  Your Order Had Been Confirmed . Thank You! Visit Us Again<br>
  Check Your Mail : <?php echo "<span style='background-color:white'>".$_SESSION['email']."</span>"; ?>
</div>
</body>
</html>