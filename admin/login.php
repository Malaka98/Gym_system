<?php

    require_once 'DBconnection.php';

    if(isset($_POST['login'])) {

        $user_id_auth = ltrim($_POST['user_id_auth']);
        $user_id_auth = rtrim($user_id_auth);

        $pass_key = ltrim($_POST['password']);
        $pass_key = rtrim($_POST['password']);

        $user_id_auth = stripslashes($user_id_auth);
        $pass_key     = stripslashes($pass_key);



        if($pass_key=="" &&  $user_id_auth==""){
            echo "<head><script>alert('Username and Password can be empty');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";

        }
        else if($pass_key=="" ){
            echo "<head><script>alert('Password can be empty');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";

        }
        else if($user_id_auth=="" ){
            echo "<head><script>alert('Username can be empty');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";

        }

        else{

            $user_id_auth = mysqli_real_escape_string($connection, $user_id_auth);
            $pass_key     = mysqli_real_escape_string($connection, $pass_key);
            $sql          = "SELECT * FROM admin WHERE username='$user_id_auth' and pass_key='$pass_key'";
            $result       = mysqli_query($connection, $sql);
            $count        = mysqli_num_rows($result);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($result);

                session_start();
                $_SESSION['logged']     = "start";
                $_SESSION['admin_id']=$row['username'];
                $_SESSION['admin_name']=$row['Full_name'];

                header("location: index.php");

            } else {
                header("location: login.php?error=notlogin");
            }
        }

    }

    if(isset($_GET['error'])) {
        echo "<html><head><script>alert('Username OR Password is Invalid');</script></head></html>";
    }

    if(isset($_GET['logout'])) {
        echo "<html><head><script>alert('Logout Success!');</script></head></html>";
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url(https://www.bestwomensworkouts.com/wp-content/uploads/2018/10/best-gym-bags-for-women.jpg);"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Admin Login</h4>
                                </div>
                                <form action="login.php" method="post" class="user">
                                    <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username..." name="user_id_auth"></div>
                                    <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                        </div>
                                    </div><button class="btn btn-primary btn-block text-white btn-user" name="login" type="submit">Login</button>
                                </form>
                                <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                <div class="text-center"><a class="small" href="registration.php">Create an Account!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>