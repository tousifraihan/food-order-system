<?php 
    
    include('partials/menu.php');
    ob_start();
?>
        
<div class="main-content">
    <div class="wrapper">
        <h1>update order</h1>
        <br><br>
        <?php 
            if(isset($_GET['id'])){

       
                //check whether the id is set or not
                $id=$_GET['id'];
                //create sql query to get all other details
                $sql="SELECT * FROM users_items WHERE id=$id";
                //execute the query
                $res=mysqli_query($conn, $sql);
                $count=mysqli_num_rows($res);
                if($count==1){

                
        
                    //get all data
                    $row=mysqli_fetch_assoc($res);
                    $user_id=$row['user_id'];
                    $status=$row['status'];
                    
                }
                else{
                    header("location:".SITEURL.'admin/manage_order.php');
                }
        
            }
            else{
                header("location:".SITEURL.'admin/manage_order.php');
            }
        
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                
                
                
                
                <tr>
                    <td>status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Confirmed"){echo "selected";} ?> value="Confirmed">Confirmed</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                
                
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" class="btn-secondary" value="update order">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {
                //get all values from our form
                $id=$_POST['id'];
                $user_id=$_POST['user_id'];
                $status=$_POST['status'];

                //update the database
                $sql2= "UPDATE users_items SET
                    status='$status'
                    WHERE id=$id
                ";
                //execute the query
                $res2=mysqli_query($conn, $sql2);
                //check whether executed or not
                if($res2==true)
                {
                    //query executed and food updated
                    $_SESSION['update']="<div class='success'> updated successfully</div>";
                    header("location:".SITEURL.'admin/manage_order.php');    
                }
                else{
                    $_SESSION['update']="<div class='error'>failed to update</div>";
                    header("location:".SITEURL.'admin/manage_order.php'); 
                }
            }
        
        
        ?>
    </div>
</div>


<?php include('partials/footer.php');?>