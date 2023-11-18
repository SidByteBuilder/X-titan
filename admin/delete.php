<link rel="stylesheet" href="../admin/admin.css">

<?php 
  include('../config/constant.php'); 
  //echo "Delete page";

  //check ID and image value is set or not
  if(isset($_GET['id'])AND isset($_GET['image_name'])) 
  {
    // echo "Get value and delete";
        $id= $_GET['id'];
        $image_name =$_GET['image_name'];

        if($image_name !="")
      {
          $path="../image/".$image_name;

          $remove= unlink($path);

          if($remove==false)
          {
              $_SESSION['upload'] = "<div class='error'>Failed to remove image.</div>";
              header('location:' .SITEURL. 'admin/manage-promotion.php');
              die();
          }
        }
        $sql ="DELETE FROM promotions WHERE id=$id";

      //execute query
      $res=mysqli_query($conn, $sql);
      if($res==true)
      {
            $_SESSION['delete'] ="<div class='success'>Deleted Successfully</div>";
            header('location:' .SITEURL. 'admin/manage-promotion.php');
      }

      else{
        $_SESSION['delete'] ="<div class='error'>Failed to Delete Item</div>";
        header('location:' .SITEURL. 'admin/manage-promotion.php');
      }
      
  }
  else{
    $_SESSION['delete'] ="<div class='error'>Unauthorized Access</div>";
    header('location:' .SITEURL. 'admin/manage-promotion.php');
  }
   
  ?>
<?php
   include('partials/footer.php')
 ?>