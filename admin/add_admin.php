<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>add admin</h1>
        <br>
<!-- checking whether the session is set or not -->
        <?php 
           if(isset($_SESSION['add'])){
               echo $_SESSION['add'];
               unset($_SESSION['add']);
           }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>full name: </td>
                    <td><input type="text" name="full_name" placeholder="your name"></td>
                </tr>
                <tr>
                    <td>username: </td>
                    <td>
                        <input type="text" name="username" placeholder="your username">
                    </td>
                </tr>
                <tr>
                    <td>password: </td>
                    <td>
                        <input type="password" name="password" placeholder="your password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php')?>
<?php 
// process the value from form and save it in database
if(isset($_POST['submit']))
{
    //button clicked
    //echo "button clicked";

    //get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

//     mysql query to save data to db
$sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
        ";
        
        
        //execute query and save data in db
        $res = mysqli_query($conn,$sql) or die(mysqli_error());
        //check whether the data is inserted or not and display apppropriate messqge
        if($res==true)
        {
            //create a session variable to display message 
            $_SESSION['add']="admin added successfully";
            //redirect page
            header("location:".SITEURL.'admin/manage_admin.php');
        }
        else{
            //create a session variable to display message 
            $_SESSION['add']="failed to add admin";
            //redirect page
            header("location:".SITEURL.'admin/manage_admin.php');
        }
    }

?>