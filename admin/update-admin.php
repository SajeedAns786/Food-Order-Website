<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br> <br>


        <?php
        //1. Get the ID og Selected Admin 
        $id = $_GET['id'];
        //2. Create SQL Query to get the details
        
        $sql = "SELECT * FROM tbl_admin WHERE id = $id";

        $res = mysqli_query($conn, $sql);
        //cheack wheter the query is executable or not 
        if ($res == TRUE) {
            //Cheack wheter the data is avilable or not 
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                //Get the details
                //echo "Admin Available";
                $row = mysqli_fetch_assoc($res);

                $full_name = $row['full_name'];
                $username = $row['username'];

            } else {
                // redirect 
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }

        }

        ?>

        <form action="" method="POST">
            <table class="tbl-50">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php
//check wheter the submit button is clck or not
if (isset($_POST['submit'])) {
    //echo "Button Clicked";
    // get all the values from the form to update 
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    // Create a sql query to update admin 
    $sql = "UPDATE tbl_admin  SET
   full_name = '$full_name',
   username = '$username'
   WHERE id = '$id' 
   ";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        //Query executed and admin update
        $_SESSION['update'] = "<div class= 'success'>Admin Updated Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');

    } else {
        //Failed to update admin
        //Query executed and admin update
        $_SESSION['update'] = "<div class= 'error'>Failed to update admin .</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }

}

?>

<?php include('partials/footer.php'); ?>