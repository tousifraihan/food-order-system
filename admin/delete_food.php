<?php
    include('../config/constants.php');
    //check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];
        //remove the image file
        if($image_name != "")
        {
            //image is available...remove it
            $path="../images/food/".$image_name;
            //remove the image
            $remove=unlink($path);
            //if failed to remove image then add error message and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove']="<div class='error'>failed to remove image</div>";
                //redirect to manage category page
                header("location:".SITEURL.'admin/manage_food.php');
                //stop the process
                die();
            }
        }
        //delete data from database
        $sql="DELETE FROM items WHERE id=$id";
        //execute the query
        $res=mysqli_query($conn, $sql);
        //check whether the data is deleted from database or not
        if($res==true)
        {
            //set success message
            $_SESSION['delete']="<div class='success'>category deleted successfully</div>";
            header("location:".SITEURL.'admin/manage_food.php');
        }
        else{
            $_SESSION['delete']="<div class='error'>food item deleted failed</div>";
            header("location:".SITEURL.'admin/manage_food.php');    
        }
    }
    else{
        $_SESSION['unauthorize']="<div class='error'>unauthorized access</div>";    
        header("location:".SITEURL.'admin/manage_food.php'); 
    }

?>