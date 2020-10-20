<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
    <!--
        links for the bootstrap,jquery and javascript for responsive design.
    -->
    <?php require_once('bootstrap.php');?>

    <!--
        External Stylesheet for Css.
    -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

        <div class='link_for_products_page_for_offer'>
                <h4 style='text-align:center;'>
                    <a href='products.html' style='color:red;text-decoration:none;'>Move To the Offers Page for the Special Discount Today.</a>
                    <button onclick='remove_div()' title='remove this division from the page' style='background-color:red;color:black;float:right;margin-right:20px'>
                        X
                    </button>
                </h4> 
            </div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a style='margin-right:650px;' class="navbar-brand" href="index.php">FoodieSide</a>
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
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>


        <div class="container-fluid mt-3" style='width:100%'>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ul>
                      
                      <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/Carousel_Image4.jpeg" alt="BreakFast"  class='img-responsive img-cus' width='100%'height='600px'>
                        <div class="carousel-caption">
                            <h1>BreakFast</h1>
                            <h3>Tea With Snacks</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/Carousel-Image1.jpeg" alt="BreakFast"  width='100%'height='600px' class="img-responsive img-cus" >
                        <div class="carousel-caption">
                            <h1>Drinks</h1>
                            <h3>Soft Drinks with Hot Drinks</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/Carosel_Image3.jpeg" class='img-responsive img-cus' width='100%'height='600px' alt="Dinner" >
                        <div class="carousel-caption">
                            <h1>Meal</h1>
                            <h3>Veg Meal with Diet</h3>
                        </div>
                    </div>
                </div>
                      
                      <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
         </div>


         <!--
             Div Showing the Breakfast for the present day.
         -->
        <div id="breakfast_header" class='scroller container-fluid' height='30px;'>
            <div id="timer"></div>
            <div id="see_all"><a href="breakfast.php">See All</a></div>
        </div>

        <div id='breakfast' class='scroller'>
             <div class="item" style='height:300px;text-align:center;padding-top:150px;background-color:silver;box-sizing:border-box'>
                <h4 style='color:red'>Today's BreakFast List</h4>
            </div>
            <div class='item'>
                <img src="images/breakfast.jpg" class='img-fluid' alt="BreakFast">  
            </div>
            <div class='item'>
                <img src="images/dosa.jpg" alt="BreakFast">  
            </div>
            <div class='item'>
                <img src="images/idli.jpg" alt="BreakFast">  
            </div>
            <div class='item'>
                <img src="images/samosa.jpg" alt="BreakFast">  
            </div>
            <div class='item'>
                <img src="images/vada.jpg" alt="BreakFast">  
            </div>
            <div class='item'>
                <img src="images/upma.jpg" alt="BreakFast">  
            </div>
            <div class='item'>
                <img src="images/poha.jpg" alt="BreakFast">  
            </div>
        </div>

        <!-- Lunch Section -->
        <div class='Lunch_Dinner container-fluid'>
            <h3 style='width:50%;float:left'>Lunch and Dinner</h3>
            <h3 style='float:right'><a href="lunch.php">See All</a></h3>
        </div>
    <div class='container-fluid'>
        <div class="row">
            <div class="col-md-6 col-lg-3 col-sm-6">
            <div class="card" style="width: 18rem;">
                <img src="images/punjabi_dish.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img src="images/south_dish.jpg" class="card-img-top" alt="meal">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img src="images/rajasthani_dish.jpg" class="card-img-top" alt="meal">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img src="images/maharashtrian_dish.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
            </div>
            </div>
        </div>          
        </div>





         <!-- Modal for Signup and Login-->
         <div class="modal fade" id="Login_Signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Login And Signup</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div style='text-align:center;margin-top:10px'><a class='btn btn-success' href="admin_login.php">Admin Login</a></div>                          
                        <div style='text-align:center;margin-top:10px'><a class='btn btn-success' href="Login/user_login.php">User Login</a><br></div>
                        <div style='text-align:center;margin-top:10px'><a href="signup_testor.php">Not Having Account</a></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
        

        

</body>
</html>






