<?php
require 'config/constants.php';
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];
  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();
  $query="SELECT * FROM users WHERE email='$data->email'";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
  if($count>0){
        while($row=mysqli_fetch_assoc($result)){
        //get the values
            $id=$row['id'];

            $_SESSION['id']=$id;
        }
    } 
 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['email'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'" class="btn btn-danger">verify With Google</a>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>maisa's kitchen</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        
        <!-- Latest compiled and minified javascript -->
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <!--new code-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br><br>
           <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <p>Login to make a purchase.</p>
                                <form method="post" action="login_submit.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">Don't have an account yet? or registered with google account... <a href="registration.php" class="btn btn-primary">Register or google-login</a></div>
                        </div>
                    </div>
                </div>
           </div>
           
           <div class="container">
                <br />
                <br />
                <div class="panel panel-default">
                    <?php
                    if($login_button == '')
                    {
                        echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                        echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" style="padding: 0.25rem;"/>';
                        echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                        echo '<h3><b>Email :</b> '.$_SESSION['email'].'</h3>';

    
                    }
                    else
                    {
                        echo '<div align="center">'.$login_button . '</div>';
                    }
                    ?>
                </div>
            </div>
            <br><br><br><br><br>
           <?php include('partials-front/footer.php'); ?>


           