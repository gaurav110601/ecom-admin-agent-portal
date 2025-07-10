<?php
include 'database.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_SESSION['admin-name'])){
?>
        <script type="text/javascript">
            alert('Already Logged-in!!');
            window.location = "index.php";
        </script> 
<?php    
    }
    if(isset($_POST['admin-login'])){
    	$username = $_POST['username'];
    	$password = $_POST['password'];

        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)==1){
        	$data = mysqli_fetch_assoc($result);
        	
        	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
        	$_SESSION['admin-name'] = $data['name'];

        	?>
                <script type="text/javascript">
                    alert('Login successfull!!');
                    window.location = "index.php";
                </script> 

            <?php 
        }else{
        	?>
                <script type="text/javascript">
                    alert('Incorrect Username or Password');
                </script> 

            <?php 
        }
    }
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - ADMIN</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap-file-input.css">
    <link rel="stylesheet" href="assets/css/Form-1.css">
    <link rel="stylesheet" href="assets/css/FORM.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form-.css">
    <link rel="stylesheet" href="assets/css/Simple-Form-Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Simple-Form.css">
</head>

<body class="bg-gradient-primary">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0 ">
                        <div class="row mt-3">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image row"><img class="col-lg-12" src="assets/img/admin-photo.jpg"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center p-2">
                                        <h4 class="text-dark mb-4"><b>ADMIN LOGIN</b></h4>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="mb-3 p-2"><input class="form-control form-control-user" type="text" id="username" aria-describedby="emailHelp" placeholder="Enter Username..." name="username"></div>
                                        <div class="mb-3 p-2"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
<!--                                         <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div> -->
                                        <button class="btn btn-primary d-block btn-user w-100 p-2" type="submit" name="admin-login">Login</button>

                                        <!-- <hr><a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i class="fab fa-google"></i>&nbsp; Login with Google</a><a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Login with Facebook</a>
                                        <hr> -->
                                    </form>
                                    <!-- <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.html">Create an Account!</a></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap-fileinput.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>