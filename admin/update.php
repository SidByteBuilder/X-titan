<link rel="stylesheet" href="../admin/admin.css">

<?php 
  include('../config/constant.php'); ?>

<?php 
    if(isset($_GET['id']))
    {
      $id =$_GET['id'];

        $sql2="SELECT * FROM promotions WHERE id=$id";

       $res2 =mysqli_query($conn, $sql2);

       $row2=mysqli_fetch_assoc($res2);

       $title=$row2['title'];
       $description=$row2['description'];
       $price=$row2['price'];
       $current_image=$row2['image_name'];

    }
    else{
        header('location:' .SITEURL. 'admin/manage-promotion.php');
    }
  
  ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Promotion</h1>
        <br><br>
        <form action="" method='POST' enctype="multipart/form-data">
            <table class="tbl_3">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title ?>">
                    </td>

                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"> <?php echo $description; ?> </textarea>
                    </td>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>

                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>

                        <?php
                        if($current_image =="")
                        {
                              
                            echo "<div class='error'>Image not Added.</div>";

                        
                        }
                         else{
                             ?>
                        <img src="<?php echo 'http://localhost/x-titan/';?>image/<?php echo $current_image; ?>"
                            width="100px" ;>
                        <?php
                            
                        }
                        ?>
                    </td>

                </tr>


                <tr>
                    <td>Select New Image:</td>
                    <td><input type="file" name="image">
                    </td>
                </tr>

                <tr>

                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image ?>">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Update Item" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>


        <?php 
          if(isset($_POST['submit']))
          {
              //echo "clicked";
              $id=$_POST['id'];
              $title=$_POST['title'];
              $description =$_POST['description'];
              $price=$_POST['price'];
              $current_image=$_POST['current_image'];
              

              if(isset($_FILES['image']['name']))
              {
                $image_name=$_FILES['image']['name'];
               
                if($image_name!="")
             {
                $ext= end(explode('.', $image_name));

                //rename image
                $image_name="Promotion_Name_" .rand(0000, 9999) .'.'.$ext; // e.g Promotion_update_834.jpg or png

                   
                   $source_path=$_FILES['image']['tmp_name'];
   
                    $destination_path="../image/".$image_name;
                   
                    $upload = move_uploaded_file($source_path,$destination_path);
   
                    //check image is uploaded or not
                    if($upload==false)
                    {
                        $_SESSION['upload'] ="<div class='error'>Failed to upload image.</div>";
                        header('location:' .SITEURL. 'admin/manage-food.php');
                        
                        // stop the process so data will not inserted in database
                             die();
                    }  
                    if($current_image!="")
                    {
                        $remove_path="../image/".$current_image;

                        $remove =unlink($remove_path);

                        if($remove==false){
                            $_SESSION['remove-failed'] ="<div class='error'>Failed to remove current image.</div>";
                            header('location:' .SITEURL. 'admin/manage-promotion.php');
                             die();
                        }
               }
                 }
               }
                
              else{
                  $image_name =$current_image;
              }
                  $sql3="UPDATE promotions SET
                  
                  title='$title',
                  description='$description',
                  price=$price,
                  image_name='$image_name'
                  WHERE id=$id
                  ";
                  
                  $res3 =mysqli_query($conn, $sql3);
                  if($res3==true)
                  {
                      $_SESSION['update']="<div class= 'success'>Promotion Update Successfully</div>";
                      header('location:' .SITEURL. 'admin/manage-promotion.php');
                  }
                  else{
                    $_SESSION['update']="<div class= 'error'>Failed to update</div>";
                    header('location:' .SITEURL. 'admin/manage-promotion.php');
                  }


            }
                  
        ?>


    </div>
</div>
<?php include('partials/footer.php'); ?>