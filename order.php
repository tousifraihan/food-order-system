<?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether food id is set or not
        if(isset($_GET['user_id']))
        {
            //Get the Food id and details of the selected food
            $user_id = $_GET['user_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM users WHERE id=$user_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $name = $row['name'];
                $email = $row['email'];
                $contact = $row['contact'];
                $city = $row['city'];
                $address = $row['address'];
            }
            else
            {
                //Food not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <form action="" method="POST" class="order">
                <fieldset>

                   
    
                    <div class="food-menu-desc">
                        <h3><?php echo $name; ?></h3>
                        <input type="text" name="name" value="<?php echo $name; ?>">

                        <p><?php echo $email; ?></p>
                        <input type="email" name="email" value="<?php echo $email; ?>">
                        
                    </div>
                
            
                    

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" value="<?php echo $contact; ?>">
                    <div class="order-label">city</div>
                    <input type="text" name="city" value="<?php echo $city; ?>">

                   

                    <div class="order-label">Address</div>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                    <div class="order-label">payment mode</div>
                    <input type="text" name="payment" value="payment on delivery">

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $user_id = $_POST['user_id'];

                    $total = $_SESSION['sum'];
                    $payment=$_POST['payment'];
                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        total = $total,
                        user=$user_id,
                        payment_mode=$payment,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>