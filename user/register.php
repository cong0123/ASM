<?php
require_once ('../db/dbhelper.php');
$id= $username = $password  = $phone_number =$address =$email='';
if (!empty($_POST)) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (isset($_POST['password'])) {
        $password = md5($_POST['password']);
    }


    if (isset($_POST['phone_number'])) {
        $phone_number = $_POST['phone_number'];
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }



    if (!empty($username)) {
        $created_at = $updated_at = date('Y-m-d H:s:i');
        //Luu vao database

        if ($id == '') {
            $sql = 'insert into user(username,password,phone_number, address, email, created_at, updated_at) 
            value ("'.$username.'", "'.$password.'","'.$phone_number.'", "'.$address.'", "'.$email.'","'.$created_at.'" ,"'.$updated_at.'")';
        } else {
            $sql = 'update user set username = "'.$username.'", updated_at = "'.$updated_at.'" where id = '.$id;
        }

        execute($sql);
        header('Location: login.php');
        die();
    }
}
    if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'select * from user where id = '.$id;
    $user = executeSingleResult($sql);
    if ($user != null) {
        $username = $user['username'];
        $password = $user['password'];

        $phone_number = $user['phone_number'];
        $address = $user['address'];
        $email = $user['email'];

    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
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
    <a class="navbar-brand" href="login.php">Login Page</a>


</div>
  </nav>

  <!-- No Coppy-->
  <div >
      <form class='m-3' action=""  method="POST">
          <h2 >Register</h2>

          <div class='row justify-content-center mt-3'>
              <div class='form-floating col-12 col-md-6 col-lg-4'>
                  <input type="text" name="id" value="<?=$id?>" hidden="true">
                  <input required="true"  name="username" placeholder='username' class='form-control' value="<?=$username?>" >
                  <label class="ms-3">Username</label>
              </div>
          </div>
          <div class='row justify-content-center mt-3'>
              <div class='form-floating col-12 col-md-6 col-lg-4'>

                  <input required="true" type="password" name="password" placeholder='password' class='form-control'  value="<?=$password?>">
                  <label class="ms-3">Password</label>
              </div>

          <div class='row justify-content-center mt-3'>
              <div class='form-floating col-12 col-md-6 col-lg-4'>

                  <input required="true" name="phone_number" placeholder='phone_number' class='form-control'  value="<?=$phone_number?>">
                  <label class="ms-3">Phone Number</label>
              </div>
          </div>



          <!---->
          <div class='row justify-content-center mt-3'>
              <div class='form-floating col-12 col-md-6 col-lg-4'>

                  <input required="true" name="address" placeholder='address' class='form-control' value="<?=$address?>">
                  <label class="ms-3">Address</label>
              </div>
          </div>
          <!---->
          <div class='row justify-content-center mt-3'>
              <div class='form-floating col-12 col-md-6 col-lg-4'>

                  <input  required="true" name="email" type="email" placeholder='email' class='form-control' value="<?=$email?>">
                  <label class="ms-3">Email</label>
              </div>
          </div>
          <!---->

          <!---->

          <!---->

          <!---->
          <div class='row  mt-3 justify-content-center'>
              <div class='col-1 '>
                  <button class='btn  btn-info ' > Enter</button>
              </div>
          </div>
          <!---->
      </form >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
  crossorigin="anonymous"></script>






</body>

  </html>