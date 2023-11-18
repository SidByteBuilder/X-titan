<?php include('../config/constant.php'); 

?>
<link rel="stylesheet" href="../admin/admin.css">

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Promotion</h1>

        <br /> <br />

        <a href="<?php echo 'http://localhost/x-titan/';?>admin/add-promotion.php" class="btn-primary">Add Promotion</a>
        <br /> <br /> <br />

        <?php
       if(isset($_SESSION['add']))
       {
           echo $_SESSION['add']; // Displaying message successfully add message
           unset($_SESSION['add']); // remove that message 
       }

       if(isset($_SESSION['delete']))
       {
           echo $_SESSION['delete']; // Displaying message successfully add message
           unset($_SESSION['delete']); // remove that message 
       } 

       if(isset($_SESSION['upload']))
       {
           echo $_SESSION['upload']; // Displaying message successfully add message
           unset($_SESSION['upload']); // remove that message 
       }

       if(isset($_SESSION['remove']))
       {
           echo $_SESSION['remove']; // Displaying message successfully add message
           unset($_SESSION['remove']); // remove that message 
       }
       
       if(isset($_SESSION['update']))
       {
           echo $_SESSION['update']; // Displaying message successfully add message
           unset($_SESSION['update']); // remove that message 
       }

        ?>

        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>


            </tr>
            <?php 
               //Create sql query to get all promotion data
               $sql="SELECT * FROM promotions";

               $res =mysqli_query($conn, $sql);

               $count =mysqli_num_rows($res);

               //create serial number variable
               $sn =1;
               if($count>0)
               {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id= $row['id'];
                    $title= $row['title'];
                    $description =$row['description'];
                    $price=$row['price'];
                    $image_name= $row['image_name'];
                   
                    ?>
            <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $description; ?></td>
                <td><?php echo $price; ?></td>
                <td>

                    <?php 
                //check image name is available or not
                     if($image_name!="")
                     {
                          ?>
                    <img src="<?php echo SITEURL;?>image/<?php echo $image_name; ?>" width="100px">
                    <?php
                     }
                     else{
                         echo "<div class='error'>Image not added.</div>";
                     }
                   ?>
                </td>

                <td>

                    <a href="<?php echo 'http://localhost/x-titan/';?>admin/update.php? id=<?php echo $id; ?>"
                        class="btn-secondary">Update Promotion</a>
                    <a href="<?php echo 'http://localhost/x-titan/';?>admin/delete.php? id=<?php echo $id; ?>& image_name=<?php echo $image_name; ?>"
                        class="btn-danger">Delete Promotion</a>
                </td>
            </tr>
            <?php
               }
            }
               else{
                   echo "<tr><td colspan='7' class='error'> Promotion not added yet</td></tr>";
               }
               
               ?>

        </table>

    </div>


</div>

<?php include('partials/footer.php'); ?>