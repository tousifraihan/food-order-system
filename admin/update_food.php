<?php 
ob_start();
include('partials/menu.php');?>
<?php 
    if(isset($_GET['id'])){

       
        //check whether the id is set or not
        $id=$_GET['id'];
        //create sql query to get all other details
        $sql2="SELECT * FROM items WHERE id=$id";
        //execute the query
        $res2=mysqli_query($conn, $sql2);

        //get all data
        $row2=mysqli_fetch_assoc($res2);
        $name=$row2['name'];
        $description=$row2['description'];
        $price=$row2['price'];
        $current_image=$row2['image_name'];
        $current_category=$row2['category_id'];
        $featured=$row2['featured'];
        $active=$row2['active'];

    }
    else{
        header("location:".SITEURL.'admin/manage_food.php');
    }
?>
<div class="main-content">
    <div class="wrapper">
        <h1>update food</h1>
        <br><br>
           
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>title:</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>price:</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price;?>">
                    </td>
                </tr>
                    
                <tr>
                    <td>current image:</td>
                    <td>
                        <?php 
                            if($current_image !="")
                            {
                                //display the image if available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
                                <?php
                            }
                            else{
                                echo "<div class='error'>image not available</div>"; //writing html code in php without breaking php code
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
                    <td>category:</td>
                    <td>
                        <select name="category">
                            <?php 
                                //create sql to get all active categories from db
                                $sql="SELECT * FROM tbl_category WHERE active='yes'";
                                //execute the query
                                $res=mysqli_query($conn, $sql);
                                //count riows to check whether we have categories or not
                                $count=mysqli_num_rows($res);
                                //if count is greater than zero then we have categories orelse we donot have
                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $category_name=$row['name'];
                                        $category_id=$row['id'];
                                        ?>
                                        <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id;?>"><?php echo $category_name;?></option>
                                        <?php

                                    }
                                }
                                else{
                                    //category not available
                                    ?>
                                    <option value="0">no category found</option>
                                    <?php
                                }
                            
                            ?>

                        </select>
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
                        <input type="hidden" name="id" value="<?php echo $id; ?>">  
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                              
                        <input type="submit" name="submit" value="update food" class="btn-secondary">
                    </td>
                </tr>
        
            </table>
        </form>
        <!-- updating the food -->
        <?php 
            if(isset($_POST['submit']))
            {
                //get all values from our form
                $id=$_POST['id'];
                $name=$_POST['name'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $current_image=$_POST['current_image'];
                $category=$_POST['category'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];
                //updating new image if selected
                //check the image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image details
                    $image_name=$_FILES['image']['name'];
                        //check whether the image is available or not
                    if($image_name!="")
                    {
                        //upload the new image
                        //auto rename the image
                        $ext=end(explode('.', $image_name));
                        //rename the image
                        $image_name="food_name_".rand(0000,9999).'.'.$ext;
  
                        $source_path=$_FILES['image']['tmp_name'];
                          
                        $destination_path="../images/food/".$image_name;
                        //upload the image
                        $upload=move_uploaded_file($source_path, $destination_path);
                        //check whether the image is uploaded or not
                        //and if the image is not uploaded the stop the process
                        if($upload==false)
                        {
                            //set image
                            $_SESSION['upload']="<div class='error'>failed to upload image</div>";
                            //redirect to manage category page
                            header("location:".SITEURL.'admin/manage_food.php');
                            //stop the process
                            die();
                        }
                        //remove the current image if available
                        if($current_image !="")
                        {
                            $remove_path="../images/food/".$current_image;
                            $remove=unlink($remove_path);
                            //check whether the image is removed or not
                            //if filed to remove then display message and stop the process
                            if($remove==false){
                                $_SESSION['failed-remove']="<div class='error'>failed to remove current image</div>";
                                header("location:".SITEURL.'admin/manage_food.php');
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
                $sql3="UPDATE items SET
                    name='$name',
                    description='$description',
                    price=$price,
                    image_name='$image_name',
                    category_id='$category',
                    featured='$featured',
                    active='$active'
                    WHERE id=$id
                ";
                //execute the query
                $res3=mysqli_query($conn, $sql3);
                //check whether executed or not
                if($res3==true)
                {
                    //query executed and food updated
                    $_SESSION['update']="<div class='success'>food updated successfully</div>";
                    header("location:".SITEURL.'admin/manage_food.php');    
                }
                else{
                    $_SESSION['update']="<div class='error'>failed to update</div>";
                    header("location:".SITEURL.'admin/manage_food.php'); 
                }
            }
        
        
        ?>
    
    </div>
</div>


<?php include('partials/footer.php');?>