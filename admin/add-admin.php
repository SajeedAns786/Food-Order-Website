<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br /><br />
        <?php
        if (isset($_SESSION['add'])) { //Cheacking whether the session is set of not 
        
            echo $_SESSION['add']; //displaying session msg 
            unset($_SESSION['add']); // Removing session message
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-50">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

    </div>
</div>

<?php
include('partials/footer.php');
?>


<?php
// Process the value from form and save it in databases
// Check wheter the submit button is click or not
if (isset($_POST['submit'])) {
    //    echo "Button clicked";
    // Get the data from user 
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Password encryption with md5 

    //Sql Query to save the data into database 
    $sql = "INSERT INTO tbl_admin SET 
    full_name = '$full_name',
    username ='$username',
    password = '$password'
   ";


    // Executing quring and savin data into database 
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    // Cheack whether the query is executed or not and display appropiate message
    if ($res == TRUE) {

        // echo "Data inserted";
        //Creat a session variable to display message ;
        $_SESSION['add'] = "<div class= 'success'>Admin Added Successfuly </div>";
        // redirect a page to manage admin 
        header('location:' . SITEURL . 'admin/manage-admin.php');

    } else {
        // echo "fail to insert the data";
        //Creat a session variable to display message ;
        $_SESSION['add'] = "failed to add admin";
        // redirect a page to add admin admin 
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }

}


?>