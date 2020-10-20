<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a style='margin-right:40%;' class="navbar-brand" href="index.php">FoodieSide</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products Page
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="breakfast.php">BreakFast <i class="fa fa-coffee"></i></a>
                    <a class="dropdown-item" href="meals.php">Meals <i class="fas fa-utensils"></i></a>
                </li>
                <li class="nav-item">
                <?php 
                            if(isset($_SESSION['email'])){
                                echo '<div class="btn-group">
                                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    '.$_SESSION['email'].'
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="settings.php">Settings Page</a>
                                    <a class="dropdown-item" href="settings.php">Change Password</a>
                                    <a class="dropdown-item" href="purchase_history.php">Purchase History</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                  </div>
                                </div>';
                            } 
                            else{
                                echo '<a class="nav-link" href="login_signup.html" data-toggle="modal" data-target="#Login_Signup">Login&amp;SignUp <i class="fa fa-user fa-1.9x"></i>
                                </a>';
                            }                       
                        ?>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn btn-primary" href="add_to_cart.php"><i class="fa fa-shopping-cart"></i> </a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id='search'>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>
</body>
</html>


