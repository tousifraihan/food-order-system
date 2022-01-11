<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>add food</h1>
        <br><br>
        <?php

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>
        <form action="" method="POST" enctype="multipart/form-data"> <!-- enctype property will allow us to upload image -->
            <table class="tbl-30">
                <tr>
                    <td>title:</td>
                    <td>
                    
                        <input type="text" name="name" placeholder="food name">
                    </td>
                
                </tr>
                <tr>
                    <td>description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="food description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                
                </tr>
                <tr>
                    <td>select image:</td>
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
                                    $id=$row['id'];
                                    $name=$row['name'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $name;?></option>
                                <?php

                                }
                            }
                            else{
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
                        <input type="radio" name="featured" value="yes">yes 
                        <input type="radio" name="featured" value="no">no
                    </td>
                
                </tr>
                <tr>
                    <td>active:</td>
                    <td>
                        <input type="radio" name="active" value="yes">yes 
                        <input type="radio" name="active" value="no">no
                    </td>
                
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add food" class="btn-secondary">
                    </td>
                
                </tr>
            
            
            </table>
        </form>
        <?php 
            //check whether the submit button is clicked
            if(isset($_POST['submit']))
            {
                //get the value from form
                $name=$_POST['name'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $category=$_POST['category'];
                //for radio button we need to check whether the button is selected or not
                if(isset($_POST['featured']))
                {
                    $featured=$_POST['featured'];
                }
                else{
                    $featured="no";  //setting the default value 
                }
                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else{
                    $active="no";  //setting default value 
                }
                //whether the image is selected or not and $-files will show all the data of selected file
                if(isset($_FILES['image']['name']))
                {
                    //to upload the image we need image name, source path and destination path
                    $image_name=$_FILES['image']['name'];
                    //upload the image only if image is selected
                    if($image_name!=""){

                    
                        //auto rename the image
                        $ext=end(explode('.', $image_name));
                        //rename the image
                        $image_name="food_name_".rand(0000,9999).".".$ext;

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
                            header("location:".SITEURL.'admin/add_food.php');
                            //stop the process
                            die();
                        }
                    }
                }
                else{
                    //dont upload the image and set the image_name as blank
                    $image_name="";
                }

                //create sql query to insert category into database
                //for numerical value we donot need ''
                $sql2="INSERT INTO items SET
                    name='$name',
                    description='$description',
                    price=$price,  
                    image_name='$image_name',
                    category_id=$category,
                    featured='$featured',
                    active='$active'
                ";
                //execute the query and save in database
                $res2=mysqli_query($conn, $sql2);
                //check whether the query executed or not and data added or not
                if($res2==true)
                {   //query executed and category added
                    $_SESSION['add']="<div class='success'>food added successfully</div>";
                    //redirect to manage category page
                    header("location:".SITEURL.'admin/manage_food.php');
                }
                else{
                    $_SESSION['add']="<div class='error'>failed to add food</div>";
                    //redirect to manage category page
                    header("location:".SITEURL.'admin/manage_food.php'); 
                }
            }
        
        ?>
    
    </div>
</div>



<?php include('partials/footer.php'); ?>
