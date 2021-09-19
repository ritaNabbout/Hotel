<?php

    include('../config/connection.php');    
     // echo "Delete Food page";
     if(isset($_GET['id']) && isset($_GET['image_name']))
     {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/food/".$image_name;

            $remove =  unlink($path);

            if($remove == false)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to remove Image</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }

        $sql = "DELETE FROM tbl_food WHERE id=$id";
        $res = mysqli_query($con,$sql);

        if($res == true)
        {
            $_SESSION['delete'] = "<div class='success'>Food deleted successfully</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='success'>Food not deleted </div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }



     }
     else
     {
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
     }



?>