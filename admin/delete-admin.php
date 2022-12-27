<?php

    include('../config/constants.php');
    // 1 .Get the Id of admin to be deteled
    
     $id = $_GET['id'];
     
    //2. Create a sql query to delete asmib ;
    $sql = "DELETE FROM tbl_admin WHERE id= $id";
    
    $res = mysqli_query($conn , $sql);
    // Check query is run successfully or not 
    if($res == TRUE){
        //Query executed and admin deleted
        //echo "Admin deleted ";
        // create a session varibale to dislay a msg 
        $_SESSION['delete'] = "<div class = 'success'>Admin Deleted Successfully</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');

    } else{
        //Failed to delete admin
        //echo "Failed to delete admin";
        $_SESSION['delete'] = "<div class = 'error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');

    }


    //3 . Redirect to manage asmin page with message


?>