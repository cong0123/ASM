
<?php

require_once('../db/dbhelper.php');
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])) {


    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
         $address = mysqli_real_escape_string($con, $_POST['address']);


    mysqli_query($con, "UPDATE `user` SET  email = '$email',phone_number = '$phone_number', address = '$address' WHERE id = '$user_id'") or die('query failed');

    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($con, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($con, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($con, md5($_POST['confirm_pass']));

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'old password not matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'confirm password not matched!';
        } else {
            mysqli_query($con, "UPDATE `user` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
            $message[] = 'Updated successfully!';
        }
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

<div class="update-profile">

    <?php
    $select = mysqli_query($con, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($select) > 0){
        $fetch = mysqli_fetch_assoc($select);
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-secondary">
                <div class="modal-header border-0 ">
                    <h5 class="modal-title">Profile</h5>

                </div>

                <div class="modal-body">

                    <div class="form-floating mb-3">
        <?php

        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
            }
        }
        ?>

        <div class="flex">
            <div class="inputBox">
                 <div class="font-weight-bold"><span>Username :</span></div>

                <input type="text" name="username" value="<?php echo $fetch['username']; ?>" class="box">

                <div class="font-weight-bold"><span>Email:</span></div>

                <input type="email" name="email" value="<?php echo $fetch['email']; ?>" class="box">
                <div class="font-weight-bold"><span>Phone Number :</span></div>
                <input type="bigint" name="phone_number" value="<?php echo $fetch['phone_number']; ?>" class="box">

                <div class="font-weight-bold"><span>Address :</span></div>
                <input type="text" name="address" value="<?php echo $fetch['address']; ?>" class="box">
            </div>
            <div class="inputBox">
                <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                <div class="font-weight-bold"><span>Old password :</span></div>
                <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                <div class="font-weight-bold"><span>New password :</span></div>
                <input type="password" name="new_pass" placeholder="enter new password" class="box">
                <div class="font-weight-bold"><span>Confirm password :</span></div>
                <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
            </div>
        </div>

        <input type="submit" value="Update" name="update_profile" class="btn btn-success">
        <a href="../products.php" class="delete btn btn-success">go back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
