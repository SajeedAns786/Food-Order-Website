<?php
//Authorization - Access Control 
//Check whetehr the user is log in or not 
if(!isset($_SESSION['user'])){
// If user session is not set this means the user is not set 
$_SESSION['no-login-message'] = "<div class= 'error text-center'>
Please log in to access Admin Panel. </div>";

  header('location:' .SITEURL. 'admin/login.php');
}
?>