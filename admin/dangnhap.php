<?php

require_once('../db/dbhelper.php');


IF($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =$_POST["username"];
    $password =($_POST["password"]);
    $sql="SELECT * FROM admin where username ='".$username."' AND password = '".$password."'";
    $result = executeSingleResult($sql);


    if($result !=null) {
        header('Location: product');
    } else{
        echo "<script>alert('Username or Password is incorrect. Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Admin Page</title>


</head>
<body>
<div class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="row">
    <div class="container-fluid" >
        <a  class="navbar-brand"  href="#">Admin</a>
    </div>

    </div>
</nav>

<div >
    <form   action="#" method="post">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-secondary">
                <div class="modal-header border-0 ">
                    <h5 class="modal-title">Login for admin</h5>

                </div>
        <div class="modal-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control "  name="username" placeholder=" Username">
                <label for="username"> Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control"  name="password" placeholder=" Password">
                <label for="password"> Password</label>
            </div>
        </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="submit" class="btn btn-info">Login</button>
                </div>


            </div>
        </div>
</div>
</form>
    </form>
</div>
</div>

</body>
</html>