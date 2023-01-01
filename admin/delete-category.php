<?php

include('../config/constants.php');

if (isset($_GET['id']) and isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    //Remove the physical image file is available 
    if ($image_name != "") {
        $path = "../images/category/" . $image_name;
        $remove = unlink($path);
        if ($remove == FALSE) {
            //Set the session message 
            $_SESSION['remove'] = "<div class = 'error'> Failed to remove cateory image . </div>";

            //Redirect to manage category page 
            header('location:' . SITEURL . 'admin/manage-category.php');

            die();
        }

    }

    //Delete from db
    $sql = "DELETE FROM tbl_category WHERE id= $id";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        $_SESSION['delete'] = "<div class = 'success'>Category Deleted Successfully</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    } else {
        $_SESSION['delete'] = "<div class = 'error'>Failed to Delete Category. Try Again Later.</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    }


    //Redirect to manage category


} else {
    header('location:' . SITEURL . 'admin/manage-category.php');

}




?>