<?php include('../config/constant.php') ?>

<!--Main content section start-->
<link rel="stylesheet" href="../admin/admin.css">
<div class="main-content">
    <div class="wrapper">

        <h1>Manage Admin</h1>
        <br /> <br />

        <?php

        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add']; // Displaying admin successfully add message
            unset($_SESSION['add']); // remove that message on manage admin page
        }

         ?>
        <br /> <br />

        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br /> <br /> <br />

        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php 
            // Querry to Get all Admin
            $sql= "SELECT * FROM tbl_admin";
            //execute the querry
            $res = mysqli_query($conn, $sql);

            //check wether the query execute or not
                if($res==TRUE)
           {
                 //Count rows to check we have data in database or not
                 $count = mysqli_num_rows($res);

                 $sn=1; //Create a variable and assign the value 

                 //check the num of rows
                 if($count>0)
                 {
                    //we have data in database
                    while($rows=mysqli_fetch_assoc($res))
               {

                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];
                    ?>

            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $full_name; ?></td>
                <td><?php echo $username; ?></td>

            </tr>

            <?php
                    
                }
            }
            else{

            }
        }
                    //display the value in our table 
  

?>


        </table>

    </div>

</div>

<!--Menu footer section start-->
<?php include('partials/footer.php');?>