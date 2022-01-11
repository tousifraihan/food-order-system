<?php include('partials/menu.php');?>
    <!-- main content -->
    <div class="main-content">
    <div class="wrapper">
        <h1>manage admin</h1>
        <br>
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];//displaying session message
                unset($_SESSION['add']);//removing session message
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];//displaying session message
                unset($_SESSION['delete']);//removing session message
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];//displaying session message
                unset($_SESSION['update']);//removing session message
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];//displaying session message
                unset($_SESSION['user-not-found']);//removing session message
            }
            if(isset($_SESSION['pwd-not-found']))
            {
                echo $_SESSION['pwd-not-found'];//displaying session message
                unset($_SESSION['pwd-not-found']);//removing session message
            }
            if(isset($_SESSION['change-pwd']))
            {
                echo $_SESSION['change-pwd'];//displaying session message
                unset($_SESSION['change-pwd']);//removing session message
            }
        ?>
        <br><br>
        <a href="add_admin.php" class="btn-primary">add admin</a>
        <br> <br>
        <table class="tbl-full">
           <tr>
                 <th>serial no</th>
                 <th>fullname</th>
                 <th>username</th>
                 <th>actions</th>
            </tr>
            <!-- query to get all admin list -->
            <?php 
            $sql = "SELECT * FROM tbl_admin";
            // execute the query
            $res = mysqli_query($conn, $sql);
            // check whether the db is executed or not
            if($res==TRUE){
                $count = mysqli_num_rows($res);//function to get all the rows
                $sn=1; 
                if($count>0){
                    //we have data in db
                    while($rows=mysqli_fetch_assoc($res)){
                         $id=$rows['id'];
                         $full_name=$rows['full_name']; 
                         $username=$rows['username'];
                         //display table 
                        ?>
                        <tr>
                            <td><?php echo $sn++;?></td>
                            <td><?php echo $full_name;?></td>
                            <td><?php echo $username;?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update_password.php?id=<?php echo $id; ?>" class="btn-primary">change password</a>
                                <a href="<?php echo SITEURL; ?>admin/update_admin.php?id=<?php echo $id; ?>" class="btn-secondary">update admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id; ?>" class="btn-danger">delete admin</a>
                            </td>
                    
                        </tr>
                        <?php

                    }

                }
                else{

                }
            }
            ?>
            

            
        </table>
        


    </div>
</div>
    <!-- ends -->
    <?php include('partials/footer.php');?>    
 