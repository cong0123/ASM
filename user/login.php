
<?php

require_once('../db/dbhelper.php');
session_start();

if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $select = mysqli_query($con, "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location:../products.php');
    }else{
        echo "<script>alert('Username or Password is incorrect. Please try again.');</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container-fluid">

        <!--coppy-->
        <a class="navbar-brand" href="#">Login Page</a>


    </div>
</nav>


<form  action="" method="post" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-secondary">
            <div class="modal-header border-0 ">
                <h5 class="modal-title">Login</h5>

            </div>

            <div class="modal-body">
                <?php
                if(isset($message)){
                    foreach($message as $message){
                        echo '<div class="message">'.$message.'</div>';
                    }
                }
                ?>

                <div class="form-floating mb-3">


                    <input  required="true" type="text" class="form-control "  name="username" placeholder="Username">
                    <label for="username">Username</label>
                </div>

                <div class="form-floating">
                    <input required="true" type="password" class="form-control"  name="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
            </div>

            <div class="modal-footer border-0 justify-content-center">
                <input type="submit" name="submit" value="login " class="btn-success">

            </div>
            <div class="modal-footer border-0 justify-content-center">
                No account? Register<p ><a href="../user/register.php" class="text-danger">here</a></p>
            </div>

        </div>
    </div>
    </div>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
