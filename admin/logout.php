<?php
// Include constants fot siteurl 

include('../config/constants.php');

// delete all the session and redirect to the login page 
session_destroy();

header('location:' . SITEURL . 'admin/login.php');



?>