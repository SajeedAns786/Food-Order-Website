<?php
include ('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/><br/>
        <form action="" method = "POST" >

        <table class="tbl-50">
            <tr>
                <td>Full Name: </td>
                <td><input type="text" name="full_name" placeholder = "Enter Your Name" ></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name= "username" placeholder = "Your Username">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" placeholder = "Your Password">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name = "submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>

    </div>
</div>

<?php
include ('partials/footer.php');
?>

<?php
// Process the value from form and save it in databases
// Check wheter the submit button is click or not
if(isset($_POST['submit'])){
   echo "Button clicked";
}else{
    echo "Button is not clicked";
}

?>