<link rel="stylesheet" href="../admin/admin.css">
<?php include('../config/constant.php'); 
    include('../admin/partials/login-check.php');
?>

<!DOCTYPE html>
<html>

<head>

    <title>X Titan - Announcement Board</title>

</head>

<body>

    <div class="menu text-center">
        <div class="wrapper">
            <br><br>
            <div class="menu text-center">
                <ul>
                    <li><a href="add-admin.php"> Admin</a></li>
                    <li><a href="manage-promotion.php"> Add Promotions</a></li>
                    <li><a href="logout.php">Log Out</a></li>

                </ul>

            </div>
            <div class="wrapper">
                <div class="main-content">
                    <h1>DASHBOARD</h1>
                </div>
            </div>


            <!--Subscribe section start-->

            <section class="subscribe-us-area">
                <div class="container subscribe">
                    <div class="row">
                        <div class="col-lg-12 text-center subscribe-title">
                            <h4 class="uppercase">X-titan Ecomm Dashboard</h4>
                            <p class="para">ADD, UPDATE & DELETE Promotion</p>

                        </div>
                    </div>
                    <div class="d-sm-flex justify-content-center">
                        <form class="w-50">
                            <div class="row d-flex flex-row flex-wrap">
                                <div class="col input-textbox">
                                    <input type="text" id="textmail" class="form-control" placeholder="Promotions">

                                </div>
                                <div class="col">
                                    <div class="btn-submit">
                                        <button type="submit" class="btn btn-success float-right">SUBSCRIBE</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            </main>

            <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login']; // Displaying admin successfully add message
            unset($_SESSION['login']); // remove that message 
        }

         if(isset($_SESSION['no-login-message']))
         {
            echo $_SESSION['no-login-message']; // Displaying login  message
            unset($_SESSION['no-login-message']);
         }

        ?>

</html>
</body>
<?php
   include('partials/footer.php')
 ?>