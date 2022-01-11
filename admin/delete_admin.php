<?php 
include('../config/constants.php');
 $id = $_GET['id'];
 $sql = "DELETE FROM tbl_admin WHERE id=$id";
 $res = mysqli_query($conn, $sql);
 if($res==true)
    {
        $_SESSION['delete']="admin deleted successfully";
        header("location:".SITEURL.'admin/manage_admin.php');
    }
 else
    {
        $_SESSION['delete']="failed to delete admin.try again";
        header("location:".SITEURL.'admin/manage_admin.php');
    }


?>