<?php
    
    include('db1.php');

   // echo "Delete page";

   if(isset($_GET['id'])AND isset($_GET['image_name']))
   {
       // echo "Get value and delete";
       $id = $_GET['id'];
       $image_name = $_GET['image_name'];

       if($image_name != "")
       {
           $path = "DailyDish".$image_name; //remove image
           $remove = unlink($path);

           // if image not removed
           if($remove == false)
           {
               $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image</div>"; 
               header('location:'.SITEURL.'EditMenu.php');
               die();

           }
       }

       $sql = "DELETE FROM  tbl_category WHERE id=$id";

       $res = mysqli_query($con,$sql);

       if($res == TRUE)
       {
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully</div>";
            header('location:'.SITEURL.'EditMenu.php');
       }
       else
       {
        $_SESSION['delete'] = "<div class='error'>Category Not Deleted</div>";
        header('location:'.SITEURL.'EditMenu.php');
       }

   }
   else
   {
        header('location:'.SITEURL.'EditMenu.php');
   }



?>