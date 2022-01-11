<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>update category</h1>
        <br><br>
        <?php 
        if(isset($_GET['id'])){

       
        //check whether the id is set or not
            $id=$_GET['id'];
        //create sql query to get all other details
            $sql="SELECT * FROM tbl_category WHERE id=$id";
            //execute the query
            $res=mysqli_query($conn, $sql);
            //count the rows to check whether the id is valid or not
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                //get all data
                $row=mysqli_fetch_assoc($res);
                $name=$row['name'];
                $current_image=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];
            }
            else{
                $_SESSION['no-category-found']="<div class='error'>category not found</div>";
                header("location:".SITEURL.'admin/manage_category.php');
            }
        }
        else{
            // $_SESSION['no-category-found']="<div class='error'>category not found</div>";
            header("location:".SITEURL.'admin/manage_category.php');
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>title:</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>current image:</td>
                    <td>
                        <?php 
                        if($current_image !="")
                        {
                            //display the image
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                        else{
                            echo "<div class='error'>image not added</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>new image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>featured:</td>
                    <td>
                        <input <?php if($featured=="yes"){ echo "checked";}?> type="radio" name="featured" value="yes">yes
                        <input <?php if($featured=="no"){ echo "checked";}?> type="radio" name="featured" value="no">no
                    </td>
                </tr>
                <tr>
                    <td>active:</td>
                    <td>
                        <input <?php if($active=="yes"){ echo "checked";}?> type="radio" name="active" value="yes">yes
                        <input <?php if($active=="no"){ echo "checked";}?> type="radio" name="active" value="no">no
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">    
                        <input type="submit" name="submit" value="update category" class="btn-secondary">
                    </td>
                </tr>
        
            </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {
                //get all values from our form
                $id=$_POST['id'];
                $name=$_POST['name'];
                $current_image=$_POST['current_image'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];
                //updating new image if selected
                //check the image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image details
                    $image_name=$_FILES['image']['name'];
                    //check whether the image is available or not
                    if($image_name !="")
                    {
                        //upload the new image
                          //auto rename the image
                          $ext=end(explode('.', $image_name));
                          //rename the image
                          $image_name="food_category_".rand(000,999).'.'.$ext;
  
                          $source_path=$_FILES['image']['tmp_name'];
                          
                          $destination_path="../images/category/".$image_name;
                          //upload the image
                          $upload=move_uploaded_file($source_path,$destination_path);
                          //check whether the image is uploaded or not
                          //and if the image is not uploaded the stop the process
                          if($upload==false)
                          {
                            //set image
                            $_SESSION['upload']="<div class='error'>failed to upload image</div>";
                            //redirect to manage category page
                            header("location:".SITEURL.'admin/manage_category.php');
                            //stop the process
                            die();
                          }
                        //remove the current image if available
                        if($current_image !="")
                        {
                            $remove_path="../images/category/".$current_image;
                            $remove=unlink($remove_path);
                            //check whether the image is removed or not
                            //if filed to remove then display message and stop the process
                            if($remove==false){
                                $_SESSION['failed-remove']="<div class='error'>failed to remove current image</div>";
                                header("location:".SITEURL.'admin/manage_category.php');
                                die(); //stop the process 
                            }   
                        }
                        

                    }
                    else{
                        $image_name=$current_image;
                    }
                }
                else{
                    $image_name=$current_image;
                }

                //update the database
                $sql2="UPDATE tbl_category SET
                name='$name',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                WHERE id=$id
                ";
                //execute the query
                $res2=mysqli_query($conn, $sql2);
                //check whether executed or not
                if($res2==true)
                {
                    $_SESSION['update']="<div class='success'>category updated successfully</div>";
                    header("location:".SITEURL.'admin/manage_category.php');    
                }
                else{
                    $_SESSION['update']="<div class='error'>failed to update</div>";
                    header("location:".SITEURL.'admin/manage_category.php'); 
                }
            }
        
        
        ?>
    
    </div>
</div>


<?php include('partials/footer.php');?>