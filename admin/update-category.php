<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>
        <?php
        if (isset($_GET['id'])) {
            //Get the id with other details
            //echo "Get the data";
        
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_category WHERE id = $id";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                //GEt all the data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

            } else {
                // redirect 
                $_SESSION['no-category-found'] = "<div class='error'>Category Not found </div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            }

        } else {
            //Redirect to manage category
            header('location:' . SITEURL . 'admin/manage-category.php');
        }

        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>
                        Title:
                    </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php
                        if ($current_image != "") {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image ?>" width=100px>
                            <?php
                        } else {
                            //Display message 
                            echo "<div class = ' error'>Image Not Added.</div>";
                        }
                        ?>

                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if ($featured == "Yes") {
                        echo "checked";
                    } ?> type="radio" name="featured"
                            value="Yes">Yes
                        <input <?php if ($featured == "No") {
                        echo "cheched";
                    } ?> type="radio" name="featured"
                            value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if ($active == "Yes") {
                        echo "checked";
                    } ?> type="radio" name="active"
                            value="Yes">Yes
                        <input <?php if ($active == "No") {
                        echo "checked";
                    } ?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <td> <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>

                </tr>
            </table>
        </form>
        <?php

        if (isset($_POST['submit'])) {
            //echo "Clicked";
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //Cheack wheter the image is selected or not 
            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];
                if ($image_name != "") {
                    $ext = end(explode('.', $image_name));
                    $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/" . $image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);
                    if ($upload == FALSE) {
                        $_SESSION['upload'] = "<div class = 'error'> Failed to upload Image . </div>";
                        header('location:' . SITEURL . 'admin/manage-category.php');
                        die();
                    }
                    if ($current_image != "") {
                        $remove_path = "../images/category/" . $current_image;
                        $remove = unlink($remove_path);
                        //check whetehr the image is remove or not 
                        // if fail to remove display measga 
                        if ($remove == false) {
                            //Failed to remove the image 
                            $_SESSION['failed-remove'] = "<div class = 'error'>Failed to Remove current image </div>";
                            header('location:' . SITEURL . 'admin/manage-category.php');
                            die();
                        }
                    }

                } else {
                    $image_name = $current_image;
                }
            } else {
                $image_name = $current_image;
            }

            //Updating new image if selected
            $sql2 = "UPDATE tbl_category  SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
            WHERE id = '$id' 
            ";

            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == TRUE) {
                $_SESSION['update'] = "<div class= 'success'>Category Updated Successfully.</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            } else {
                $_SESSION['update'] = "<div class= 'error'>Failed to update category .</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            }


        }


        ?>
    </div>
</div>



<?php include('partials/footer.php'); ?>