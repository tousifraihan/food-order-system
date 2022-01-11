<?php 
if(!isset($_SESSION['user']))
{
    //user is not logged in
    $_SESSION['no-login-message']="<div class='error text-center'>please login to access admin panel</div>";
    header("location:".SITEURL.'admin/login.php');    
}

?>