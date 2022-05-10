<?php
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:user/login.php');
};

if(isset($_GET['logout'])){
    unset($user_id);    session_destroy();
    header('location:user/login.php');
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>BS SHOP</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        .main {
            min-height: 700px;
        }
    </style>
</head>
<body>
<!-- header START -->
<!-- Grey with black text -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container" style="padding: 0px !important;">

        <ul class="navbar-nav">



            <li class="nav-item active">
                <a class="nav-link" href="products.php">Home</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="../../mau12/user/profile.php  " class="btn">Profile</a>
            </li>
            <li  class="nav-item"">
            <a class="nav-link"   href="../user/logout.php"> Logout</a>
            </li>


        </ul>
        <?php
        $cart = [];
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['num'];
        }
        ?>
        <a href="cart.php">
            <button type="button" class="btn btn-success">
                Cart <span class="badge badge-dark"><?=$count?></span>
            </button>
        </a>
    </div>
</nav>
<!-- header END -->

<div class="container main">

