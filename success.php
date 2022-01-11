<?php
    require 'config/constants.php';
    if(!isset($_SESSION['email'])){
        header('location:login.php');
    }else{
        $user_id=$_GET['id'];
        $confirm_query="update users_items set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($conn,$confirm_query) or die(mysqli_error($conn));
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title> Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div class="text-center">
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p>Your order is confirmed. Thank you for shopping with us. <a href="category-food.php">Click here</a> to purchase any other item.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <br>
        <div class="text-center">
            <?php require('config-pay.php');
        
            ?>
            <form action="submit.php" method="post">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $publishedKey?>"
                data-amount="<?php echo $_SESSION['sum'];?>"
                data-name="maisa's kitchen"
                data-description="food order payment"
                data-image="images/logo.png"
                data-currency="usd"
                data-email="<?php echo $_SESSION['email'];?>"></script>
            </form>
        </div>
        <br>
        <div class="text-center">
        <a href="<?php echo SITEURL; ?>order.php?user_id=<?php echo $user_id; ?>" class="btn btn-danger">payment on delivery</a>
        </div>
    </body>
</html>
