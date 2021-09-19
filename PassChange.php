<?php include('partials/menu.php'); ?>

         <div class="main-content">
              <div class="wrapper">
                  <h1>Change Password</h1>
                  <br/>

                  <?php 

                        if(isset($_GET['id']))
                        {
                            $id=$_GET['id'];
                        }
                    ?> 

                  <form action="" method="POST">
                   
                      <table class="tbl-30">
                      <tr>
                          
                          <td>Old Password</td>
                          <td>
                                <input type="password" name="current_password" placeholder="Old Password">
                          </td>
                      
                      </tr>
                      <tr>
                         <td>New Password</td>
                         <td>
                                <input type="password" name="new_password" placeholder="New Password">
                          </td>

                      </tr>
                      <tr>
                         <td>Re-type Password</td>
                         <td>
                                <input type="password" name="retype_password" placeholder="Re-type Password">
                          </td>

                      </tr>

                      <tr>
                           
                            <td  colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="change password" class="btn-update">
                            </td>
                      </tr>
                      
                      </table>
                  
                  
                  
                  </form>


     </div>    
    </div>

    <?php

            if(isset($_POST['submit']))
            {
              //  echo "submit";

                $id=$_POST['id'];
                //echo "$id";
                $current_password = ($_POST['current_password']);
                $new_password = ($_POST['new_password']);
                $retype_password = ($_POST['retype_password']);

                $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password' ";

                $res = mysqli_query($con,$sql);
               // echo "$current_password";
               

                if($res == true)
                {
                    $count = mysqli_num_rows($res);

                    if($count == 1)
                    {
                        //echo "User found";
                        if($new_password == $retype_password)
                        {
                           // echo "Test";
                           $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id ";

                           $res2 = mysqli_query($con,$sql2);

                           if($res2 == TRUE)
                           {
                               $_SESSION['change-pass'] = "<div class='success'>Password is changed</div>";
                               header("location:".SITEURL.'admin/manage-admin.php');
                           }
                           else
                           {
                            $_SESSION['change-pass'] = "<div class='success'>Password is not  changed</div>";
                            header("location:".SITEURL.'admin/manage-admin.php');
                           }
                        }
                        else
                        {
                            $_SESSION['pass-not-match'] = "<div class='error'>Password is not match!!</div>";
                            header("location:".SITEURL.'admin/manage-admin.php');
    
                        }
                    }
               
                    else{

                        $_SESSION['user-not-found'] = "<div class='error'>User not found</div>";
                        header("location:".SITEURL.'admin/manage-admin.php');

                    }
                }

            }




    ?>



 <?php include('partials/footer.php'); ?>
