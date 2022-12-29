<?php
// Include constants fot siteurl 

include('../config/constants.php');

// delete all the session and redirect to the login page 
session_destroy(); // unset the user sesion too ...

header('location:' . SITEURL . 'admin/login.php');



?>