<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>manage order</h1>
        <br> <br><br>
        <?php
        if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];//displaying session message
                unset($_SESSION['update']);//removing session message
            }
        ?> 
        <br><br>   
        <table class="tbl-full">
            <tr>
                <th>serial</th>
                <th>user id</th>
                <th>status</th>
                
                <th>actions</th>
            </tr>
            <?php 
            $sql="SELECT * FROM users_items ORDER BY id DESC";
            $res=mysqli_query($conn, $sql);
            $count=mysqli_num_rows($res);
            $sn=1;
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id'];
                    $user_id=$row['user_id'];
                    $status=$row['status'];
                    ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $user_id; ?></td>
                            <td>
                                <?php 
                                    if($status=="Confirmed"){
                                        echo "<label>$status</label>";
                                    }
                                    if($status=="On Delivery"){
                                        echo "<label style='color: orange;'>$status</label>";
                                    }
                                    if($status=="Delivered"){
                                        echo "<label style='color: green;'>$status</label>";
                                    }
                                    if($status=="Cancelled"){
                                        echo "<label style='color: red;'>$status</label>";
                                    }
                                ?>
                            </td>
                            
                            <td><a href="<?php echo SITEURL; ?>admin/update_order.php?id=<?php echo $id; ?>" class="btn-secondary">update order</a></td>
                          
                    
                        </tr>
                    <?php
                }
            }
            else{
                echo "<tr><td colspan='12' class='error'>orders not available</td></tr>";
            }
            
            ?>

            
            
        </table>
    </div>
    
</div>

<?php include('partials/footer.php');?>