<?php

//index.php

// Include Configuration File
include('config.php');

$login_button = '';

if(isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if(!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();

        if(!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if(!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if(!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if(!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if(!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}

if(!isset($_SESSION['access_token'])) {
    $login_button = '<button onclick="signInWithGoogle()" class="btn btn-block btn-outline-primary"><i class="fab fa-google"></i> Login with Google</button>';
}

?>

<?php include 'server.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp-Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
         body
            {
                height: 100vh;
                background-image: url(https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60);
                background-repeat: no-repeat;
                background-size: cover;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                backdrop-filter: blur(15px);
            }

            .card
            {
                overflow: hidden;
                border: 0 !important;
                border-radius: 20px !important;
                box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
            }

            .error {
                width: 92%; 
                margin: 0px auto; 
                margin-bottom: 20px;
                padding: 8px; 
                border: 1px solid #cc3300; 
                color: white;
                font-size: 18px;
                font-weight:bold; 
                background: #ff9966; 
                border-radius: 5px; 
                text-align: center;
            }


            /* -----------image--------------- */
            .img-left
            {
                width: 45%;
                background: url(assets/images/login_signup_img.jpeg) center;
                background-repeat: no-repeat;
                background-size: 900px;
            }

            .card-body
            {
                padding: 2rem;
            }
            
            /* ---------Title Heading h4--------- */
            .title
            {
                margin-bottom: 3rem;
                font-weight: bolder;
                font-size: 35px;
            }

            /* ---------------form--------------- */
            .form-input
            {
                position: relative;
            }
            .form-input input
            {
                width: 100%;
                height: 45px;
                padding-left: 40px;
                margin-bottom: 20px;
                box-sizing: border-box;
                box-shadow: none;
                border: 1px solid black;
                border-radius: 50px;
                outline: none;
                background: transparent;
            }

            /*----------- icons in the form--------- */
            .form-input span
            {
                position: absolute;
                top: 10px;
                padding-left: 15px;
                color: black;
            }
            
            /* ---------focusing the border of form-input--------- */
            .form-input input:focus, .form-input input:valid
            {
                border: 2px solid black;
            }

            /* --------submit button---------- */
            .form-box button[type="submit"]
            {
                margin-top: 10px;
                border: none;
                cursor: pointer;
                border-radius: 6px;
                background: #3c8ce2e8;
                color: white;
                font-size: 90%;
                transition: 0.5s;
                padding: 12px;
                font-weight: bold;
            }

    </style>
</head>
<body>
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-left d-none d-md-flex"></div>
                <div class="card-body">
                    <h4 class="title text-center mt-4"><i class="fa fa-user-circle-o"></i> Sign in</h4>
                    <form class="form-box px-3" method="post" action="signup_form.php">
                        <?php include('errors.php'); ?>
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="Email Address" tabindex="10" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" name="password_1" placeholder="Password" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" name="password_2" placeholder="Type Password again" required>
                        </div>
                        <!-- Signup with Google Button -->
                        <div class="form-input">
                            <button type="button" onclick="signUpWithGoogle()" class="btn btn-block btn-outline-primary"><i class="fab fa-google"></i> Signup with Google</button>
                        </div>
                        <div class="mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"  id="cb1" name="">
                                <label class="custom-control-label" for="cb1">Remember me</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block text-uppercase" name= "reg_user">Sign in</button>
                        </div>
                        <hr class="my-4">
                        <div class="text-center mb-2">
                            Already have an account? <a href="login_form.php" class="register-link">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function signUpWithGoogle() {
            // Redirect to Google's authentication page for signup
            window.location.href = "<?php echo $google_client->createAuthUrl(); ?>";
        }
    </script>
</body>
</html>
