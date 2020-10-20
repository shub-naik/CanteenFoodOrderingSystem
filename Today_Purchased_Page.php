<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Today's Order Page</title>
    <?php require_once('bootstrap.php');require_once('pdo.php');?>
</head>
<body style='margin-top:10px'>
<div class="container">
    <button onclick="goBack()" class='btn btn-danger'>Go Back</button>
    <?php 
        $sql='select * from purchased where purchased_time=:date';
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(':date'=>date('d-m-Y')));
        echo "<table class='table table-striped table-condensed table-bordered table-hover'><thead><tr style='background-color:black;color:white'><td>Email</td><td>Product Id</td><td>Product Name</td><td>Quantity</td></tr></thead><tbody>";
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo '<tr><td>'.$row['email'].'</td><td>'.$row['product_id'].'</td><td>'.$row['product_name'].'</td><td>'.$row['quantity'].'</td></tr>';
        }
        echo '</tbody></table>';
    ?>
        <script>
            function goBack() {
                window.history.back();
            }
        </script> 
</div>
</body>
</html>