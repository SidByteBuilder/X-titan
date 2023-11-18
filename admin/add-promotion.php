<?php include('../config/constant.php'); 

?>
<link rel="stylesheet" href="../admin/admin.css">
<div class="main-content">
    <div class="wrapper">
        <h1>Add Promotions</h1>
        <br><br>

        <?php
       if(isset($_SESSION['upload']))
       {
           echo $_SESSION['upload']; // Displaying message successfully add message
           unset($_SESSION['upload']); // remove that message 
       }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-3">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Promotion">
                    </td>

                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"
                            placeholder="Description of the Item"> </textarea>
                    </td>

                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>

                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>

                </tr>



                <td colspan="2">
                    <input type="submit" name="submit" value="Add Promotion" class="btn-secondary">
                </td>

            </table>
        </form>

        <?php 
         if(isset($_POST['submit']))
         {
             //echo "ADD";

             $title=$_POST['title'];
             $description=$_POST['description'];
             $price=$_POST['price'];
             $category=$_POST['category'];

             //Check image is selected  or not and upload the image when it selected
             
             // print_r($-FILES['image']);
             // die(); //break the code here

             if(isset($_FILES['image']['name']))
             {
                 //upload image
                 $image_name= $_FILES['image']['name'];

                   // auto rename our image
                 //upload the image only if image is selected
   
                 // auto rename image means if same image we upload
                 //get extension of our image (jpg, png, gif, etc)
                 $ext= end(explode('.', $image_name));
                   
                 //rename image
                 $image_name="Promotion_Name_" .rand(0000, 9999) .'.'.$ext; 

                 $source_path=$_FILES['image']['tmp_name'];

                 $destination_path="../image/".$image_name;

                 //finally upload image in the image folder
                 $upload = move_uploaded_file($source_path,$destination_path);

                 //check image is uploaded or not
                 if($upload==false)
                 {
                     $_SESSION['upload'] ="<div class='error'>Failed to upload image.</div>";
                     header('location:' .SITEURL. 'admin/add-promotion.php');
                     
                     // stop the process so data will not inserted in database
                          die();
                 }
                
             }
             else{
                 //dont upload image and set the image name value and set
                 $image_name="";
             }


            // create sql query to save data from database
            $sql2 ="INSERT INTO promotions SET
            title='$title',
            image_name='$image_name',
            description ='$description',
            price=$price
            
            
                 ";

                 $res2 =mysqli_query($conn, $sql2);
                 if($res2==true)
                  {
                      $_SESSION['add']= "<div class='success'>promotion Added Successfully.</div>";
                      header('location:' .SITEURL. 'admin/manage-promotion.php');
                      }
                      else{
                             $_SESSION['add']= "<div class='eror'>Failed to Add promotion.</div>";
                              header('location:' .SITEURL. 'admin/manage-promotion.php');
                          }
         }
        ?>

    </div>
</div>



<?php
   include('partials/footer.php')
 ?>