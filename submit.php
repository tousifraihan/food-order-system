<?php require('config-pay.php');
if(isset($_POST['stripeToken'])){
    \Stripe\Stripe::setVerifySslCerts(false);
    $token=$_POST['stripeToken'];
    $data=\Stripe\Charge::create(array(
        "amount"=>$_POST['data-amount'],
        "currency"=>"usd",
        "description"=>"food order pay",
        "source"=>$token,
    ));
    echo "payment completed";
    $user_id=$_SESSION['user_id'];
    $confirm_query="update order-stat set payment_mode='pay with card' where user_id=$user_id";
    $confirm_query_result=mysqli_query($conn,$confirm_query) or die(mysqli_error($conn));
    header('location:category-food.php');

}
?>