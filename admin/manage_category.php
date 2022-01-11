<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
    <h1>manage category</h1>
    <br>
    <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        
        ?>
        <br><br>
        <!-- button to add admin -->
        <a href="<?php echo SITEURL; ?>admin/add_category.php" class="btn-primary">add category</a>
        <br> <br>
        <table class="tbl-full">
           <tr>
                 <th>serial no</th>
                 <th>title</th>
                 <th>image</th>
                 <th>featured</th>
                 <th>active</th>
                 <th>actions</th>
            </tr>
            <?php 
                //query to get all categories from db
                $sql="SELECT * FROM tbl_category";
                //execute query
                $res=mysqli_query($conn, $sql);
                //count rows
                $count=mysqli_num_rows($res);
                //create serial number variable and assign value as 1
                $sn=1;
                //check whether we have data in db
                if($count>0)
                {
                    //we have data in db
                    //get the data and display
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['id'];
                        $name=$row['name'];
                        $image_name=$row['image_name'];
                        $featured=$row['featured'];
                        $active=$row['active'];
                        //to add html inside php we need to break php
                        ?>
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $name;?></td>
                                <td><?php 
                                        if($image_name!="")
                                        {
                                            //display the image
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                                            <?php
                                        }
                                        else{
                                            //display the message
                                            echo "<div class='error'>image not added.</div>";
                                        }
                                
                                    ?>
                                </td>
                                <td><?php echo $featured;?></td>
                                <td><?php echo $active;?></td>
                                <td><a href="<?php echo SITEURL; ?>admin/update_category.php?id=<?php echo $id; ?>" class="btn-secondary">update category</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">delete category</a>
                                </td>
                    
                            </tr>

                        <?php
                    }
                }
                else{
                    //we donot have data in db
                    //we will display the message inside table
                    ?>

                    <tr>
                        <td colspan="6"><div class="error">no category added.</div></td> <!-- colspan used to merge columns -->
                    </tr>

                    <?php
                }
            
            ?>

            
           
        </table>
    </div>
    
</div>

<?php include('partials/footer.php');?>