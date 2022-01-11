<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>add category</h1>
        <br><br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>
        <br><br>
        <!-- add category form -->
        <form action="" method="POST" enctype="multipart/form-data"> <!-- enctype property will allow us to upload image -->
            <table class="tbl-30">
                <tr>
                    <td>title:</td>
                    <td>
                    
                        <input type="text" name="name" placeholder="category name">
                    </td>
                
                </tr>
                <tr>
                    <td>select image:</td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="submit" name="submit" value="add category" class="btn-secondary">
                    </td>
                
                </tr>
            
            
            </table>
        
        </form>
        <?php 
            //check whether the submit button is clicked
            if(isset($_POST['submit']))
            {
                //get the value from category form
                $name=$_POST['name'];
                //for radio button we need to check whether the button is selected or not
                if(isset($_POST['featured']))
                {
                    $featured=$_POST['featured'];
                }
                else{
                    $featured="no";
                }
                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else{
                    $active="no";
                }
                //whether the image is selected or not and $-files will show all the data of selected file
                if(isset($_FILES['image']['name']))
                {
                    //to upload the image we need image name, source path and destination path
                    $image_name=$_FILES['image']['name'];
                    //upload the image only if image is selected
                    if($image_name !=""){

                    
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
                            header("location:".SITEURL.'admin/add_category.php');
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
                $sql="INSERT INTO tbl_category SET
                name='$name',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                ";
                //execute the query and save in database
                $res=mysqli_query($conn, $sql);
                //check whether the query executed or not and data added or not
                if($res==true)
                {   //query executed and category added
                    $_SESSION['add']="<div class='success'>category added successfully</div>";
                    //redirect to manage category page
                    header("location:".SITEURL.'admin/manage_category.php');
                }
                else{
                    $_SESSION['add']="<div class='error'>failed to add category</div>";
                    //redirect to manage category page
                    header("location:".SITEURL.'admin/manage_category.php'); 
                }
            }
        
        ?>
    
    </div>


</div>
<?php include('partials/footer.php'); ?>