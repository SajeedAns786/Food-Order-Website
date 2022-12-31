<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br> <br>
        <?php
        if (isset($_SESSION['add'])) { //Cheacking whether the session is set of not 
        
            echo $_SESSION['add']; //displaying session msg 
            unset($_SESSION['add']); // Removing session message
        }
        if (isset($_SESSION['upload'])) { //Cheacking whether the session is set of not 
        
            echo $_SESSION['upload']; //displaying session msg 
            unset($_SESSION['upload']); // Removing session message
        }
        ?>
        <br><br>


        <form action="" method="POST" enctype="multipath/form-data">
            <table class="tbl-50">
                <tr>
                    <td>
                        Title:
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>
                        Select Image:
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>
                        Featured:
                    </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        Active:
                    </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>

                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">

                    </td>
                </tr>


            </table>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            //echo "Clicked";
            // get the value from category form 
            $title = $_POST['title'];

            // For radio input type we need to cheack the button is selected or not 
            if (isset($_POST['featured'])) {
                //get the value from form
                $featured = $_POST['featured'];
            } else {
                // Set the default value
                $featured = 'No';
            }
            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }
            // print_r($_FILES['image']);
            // die();
            if (isset($_FILES['image']['name'])) {
                //Upload the image
                // To upload image we need image name and source path and destination path 
                $image_name = $_FILES['image']['name'];
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/" . $image_name;
                //Finammy we uplade the image 
        
                $upload = move_uploaded_file($source_path, $destination_path);

                //Check whether the image is uploaded or not 
                // if image is not uploaded the we will stop the process and redirect with error message 
        
                if ($upload == FALSE) {
                    $_SESSION['upload'] = "<div class = 'error'> Failed to upload Image . </div>";
                    header('location:' . SITEURL . 'admin/add-category.php');
                    //stop the process 
                    die();
                }

            } else {
                //Dont upload the image and set the image_name value as blank
                $image_name = "";
            }



            // Break the code here 
        
            // To create sql query to insert category into database 
            $sql = "INSERT INTO tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active' 
                    ";
            $res = mysqli_query($conn, $sql);
            // cheack wherth the query is executed or not 
            if ($res == TRUE) {
                //Query executed and category added to the db
                $_SESSION['add'] = "<div class = 'success'> Category added Successfully</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            } else {
                // failed to add category 
                $_SESSION['add'] = "<div class = 'error'> failed to add category</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            }
        }
        ?>

    </div>
</div>


<?php
include('partials/footer.php');
?>