<?php include('config/constant.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>X-Titan</title>

    <script src="https://kit.fontawesome.com/dbe9a2301f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/mobile-style.css" />
</head>

<body>
    <header>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#"> <img src="./assets/logo4.png" alt="Books"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="promotions.php">Promotions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-md-7 col-sm-12">

                    <h1>Promotions Announcement Board</h1>
                    <br>
                    <p>We are your one stop shop for event, Get 10 to 60% off on Kitchen Appliances, Beverages, Food &
                        Dish washer.</p><br>

                    <p>Grab This Promotional Offers Because This is a limited time offers!!</P>
                </div>
                <div class="col-md-5 col-sm-12 h-25">
                    <br><br><br><br><img height=280 src="./assets/promotion.png" alt="Books">
                </div>

            </div>
        </div>

    </header>

    <!--Second Section-->
    <section class="section-2 container-fluid p-0">
        <div class="container-fluid text-center">
            <div class="numbers d-flex flex-md-row flex-wrap justify-content-center">
                <div class="rect">
                    <h1>1493</h1>
                    <p>Happy Clients</p>

                </div>
                <div class="rect">
                    <h1>684</h1>
                    <p>Promotion</p>
                </div>
                <div class="rect">
                    <h1>152</h1>
                    <p>Sales</p>
                </div>
                <div class="rect">
                    <h1>2465</h1>
                    <p>Total </p>
                </div>
            </div>
        </div>

        <main>


            <!-- product secction 2 start here -->
            <div class="purchase text-center">
                <h1>Shocking Flash Sale</h1>
                <p>We will be able to help you fulfill all your needs !!!<br> Pick from the item below !!</p>
            </div>
            <div class="row">
                <?php
                //Getting promotion from database 
                $sql="SELECT * FROM promotions ";
                 
                //execute query
                $res=mysqli_query($conn, $sql);

                //count rows
                $count=mysqli_num_rows($res);

                //check promotion are available or not
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //promotion available
                        // get the values
                        $id=$row['id'];
                        $title=$row['title'];
                        $description=$row['description'];
                        $price=$row['price'];
                        $image_name=$row['image_name'];
                        ?>

                <!-- Display all values on html-->
                <div class="col-md-3">
                    <div class="menu-entry">
                        <?php 
                        //check image is add or not
                       if($image_name==""){
                        echo"<div class='error'>Image not available</div>";
                      }
                      else{
                      ?>
                        <img src="<?php echo SITEURL; ?>image/<?php echo $image_name?>" class="img">
                        <?php
                    
                       }

                     ?>

                        <div class="text text-center ">
                            <h3><a href="#"><?php echo $title ?></a></h3>
                            <p><?php echo $description ?></p>
                            <p class="price"><span>RM<?php echo $price ?></span></p>
                            <p><a href="" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                else{
                    echo"<div class='error'>Food not available</div>";
                }

                ?>
            </div>


    </section>

    <!--Menu footer section start-->
    <?php include('./footer.php');?>