<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add To Cart Page</title>
    <script src='jquery.js'></script>
</head>
<?php
    session_start();
    require_once('bootstrap.php'); 
    require_once('pdo.php');
    if(!isset($_SESSION['email'])){
        header('Location: Login/user_login.php');
    }
if(isset($_GET['product_id'])){
    $product_id=$_GET['product_id'];
    $sql='select * from add_to_cart where email=:email and product_id=:product_id';
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':email'=>$_SESSION['email'],':product_id'=>$product_id));
    if($stmt->rowCount() > 0){
        $data['added']='Product Already Added';
        echo json_encode($data);
        return;
    }
    $sql='insert into add_to_cart(product_id,email,quantity,status) values(:product_id,:email,:quantity,:status)';
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':product_id'=>$product_id,':email'=>$_SESSION['email'],':quantity'=>1,':status'=>"Added To The Cart"));
    $data['added']='';
    echo json_encode($data);
    return;
    
}
else{
    $sql='select * from add_to_cart where email=:email and status="Added To The Cart"';
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':email'=>$_SESSION['email']));
}
?>
<body>
<div class="jumbotron" style='background-color:Turquoise;color:white'>
  <h3 class="display-4">Products Added To The Cart </h3>
    <a href='logout.php' class="btn btn-primary">
        <i class="fa fa-shopping-cart"></i> 
            <?php 
                echo $stmt->rowCount() ;            
            ?></span>
    </a>
</div>
<?php  if($stmt->rowCount()>0){
    echo '<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Product_Id</th>
        <th scope="col">Quantity</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>
        ';
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo('<tr id="remove'.$row['product_id'].'"><td>'.$row['product_id'].'</td><td>
            <div class="form-group col-md-8">
            <select id="inputState'.$row['product_id'].'" class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
            </td><td><button onclick="Remove_Element('.$row['product_id'].')"class="btn btn-danger">Remove</button></td></tr>');
        }
    echo '</tbody></table>';
    echo "<div style='text-align:center'><button class='btn btn-success' id='BuyNow' onclick='BuyNow()'>Buy Now</button></div>";
}
?>

</body>
<script src='jquery.js'></script>
<script>
    function Remove_Element(del_id){
        $.ajax({
                url:'delete.php',
                type:'get',
                data:{'delete_id':del_id},
                success:function(data,status){
                    $('#remove'+del_id).hide('slow');
                }
            });
    }
    function BuyNow(){
        <?php
            $sql='select * from add_to_cart where email=:email and status="Added To The Cart"';
            $stmt=$pdo->prepare($sql);
            $stmt->execute(array(':email'=>$_SESSION['email']));
        ?>;
        var elements=[];
            <?php
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $id=$row['product_id'];
            ?>
            elements.push(<?php echo $id ;?>);
            <?php
                }
            ?>
            final_value=[];
            for(var i=0;i<elements.length;i++){
                var item=$('#inputState'+elements[i]).val();
                final_value.push(item);
            }
            $.ajax({
                url:'buynow.php',
                type:'get',
                data:{'product_list':elements,'quantity':final_value},
                success:function(data){
                    alert('Purchased');
                    window.location.href='Greetings.php'
                }
            });
    }
</script>
</html>