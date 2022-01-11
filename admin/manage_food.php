<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>manage food</h1>
        <br>
        <a href="<?php echo SITEURL; ?>admin/add_food.php" class="btn-primary">add food</a>
        <br> <br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['unauthorize']))
            {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        
        ?>
        <table class="tbl-full">
           <tr>
                 <th>serial no</th>
                 <th>title</th>
                 <th>price</th>
                 <th>image</th>
                 <th>featured</th>
                 <th>active</th>
                 <th>actions</th>
            </tr>

            
            <?php 
                //query to get all categories from db
                $sql="SELECT * FROM items";
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
                        $price=$row['price'];
                        $image_name=$row['image_name'];
                        $featured=$row['featured'];
                        $active=$row['active'];
                        //to add html inside php we need to break php
                        ?>
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $price;?></td>
                                <td><?php 
                                        if($image_name!="")
                                        {
                                            //display the image
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
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
                                <td><a href="<?php echo SITEURL; ?>admin/update_food.php?id=<?php echo $id; ?>" class="btn-secondary">update food</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete_food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">delete food</a>
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
                        <td colspan="6"><div class="error">no food added.</div></td> <!-- colspan used to merge columns -->
                    </tr>

                    <?php
                }
            
            ?>
        </table>
    </div>
    
</div>

<?php include('partials/footer.php');?>