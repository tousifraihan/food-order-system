<?php include('partials/menu.php');?>
    <!-- main content -->
    <div class="main-content">
    <div class="wrapper">
        <h1>dashboard</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            
            
            
            ?>
            <br><br>
        <div class="col-4 text-center">
            <?php 
                $sql="SELECT * FROM tbl_category";
                $res=mysqli_query($conn, $sql);
                $count=mysqli_num_rows($res);

            ?>
            <h1><?php echo $count; ?></h1>
            <br />
            categories
        </div>
        <div class="col-4 text-center">
            <?php 
                $sql2="SELECT * FROM items";
                $res2=mysqli_query($conn, $sql2);
                $count2=mysqli_num_rows($res2);

            ?>
            <h1><?php echo $count2; ?></h1>
            <br />
            foods

        </div>
        <div class="col-4 text-center">
            <?php 
                $sql3="SELECT * FROM users_items";
                $res3=mysqli_query($conn, $sql3);
                $count3=mysqli_num_rows($res3);

            ?>
            <h1><?php echo $count3; ?></h1>
            <br />
            total orders

        </div>
            <!-- <div class="col-4 text-center">
                <?php 
                    $sql4="SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                    $res4=mysqli_query($conn, $sql4);
                    $row4=mysqli_fetch_assoc($res4);
                    //get total
                    $total_revenue=$row4['Total'];

                ?>
                <h1>$<?php echo $total_revenue; ?></h1>
                <br />
                revenue generated

            </div> -->
        
        <div class="clearfix"></div>



    </div>
</div>
    <!-- ends -->
     <?php include('partials/footer.php');?>