<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BreakFast Page</title>
    <link rel="stylesheet" href="style.css">
    <?php require_once('bootstrap.php'); ?>
</head>
<body>
    <?php
     require_once('navbar.php');
     require_once('pdo.php');
     require_once('modal.php');
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php 
                $stmt=$pdo->prepare('Select * from products where servings="meal"');
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo '<div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card" style="width: 18rem;margin-top:20px;">
                        <img src="images/'.$row['product_image_url'].'" class="card-img-top" alt="Breakfast Image " height="200px">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
            </div>';
                }
            ?>
        </div>
    </div>
<?php      require_once('footer.php');?>
</body>
</html>




