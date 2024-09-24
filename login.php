<?php
session_start();

if (isset($_POST['login']))
{
    // dito kinuha nya yung id ko tas kinuha nya rin yung response ng captcha 
    $recaptcha_secret = "6Ld9yUoqAAAAACkaXsg08Vp2dfEBKuP4UM89NfEA";
    $recaptcha_response = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';

    // dito naman tinitignan nya kung meron bang laman yung response nung captcha or wala
    if (!empty($recaptcha_response)) {
        // dito naman humihingi sya ng request sa Google reCAPTCHA API 
        $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);

        if ($verify_response !== false) {
            $response_data = json_decode($verify_response, true);
        
            if ($response_data['success']) {
                
            } else {
                $user = "Demson";
                $pass = "100885";
                $username = $_POST['username'];
                $password = $_POST['password'];

                if ($user === $username)
                {
                    if ($pass === $password)
                    {
                        echo "<script>window.location.href = './home.php'</script>";
                    }

                    else {
                        echo "<script>alert('Your password is incorrect');</script>";
                    }
                }

                else {
                    echo "<script>alert('Your username is incorrect');</script>";
                }
            }
        } else {
            // Error in the verification process
            echo "<script>alert('Unable to verify reCAPTCHA at the moment. Please try again later.');</script>";
        }
    } else {
        // Captcha response is empty
        echo "<script>alert('Please complete the reCAPTCHA.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Login</h4>
                    <!-- Login Form -->
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <center>
                                <div class="g-recaptcha" data-sitekey="6Ld9yUoqAAAAACkaXsg08Vp2dfEBKuP4UM89NfEA"></div>
                            </center>
                            <br>
                        <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                    <!-- Back Button -->
                    <div class="d-grid mt-3">
                        <button onclick="window.location.href='index.php'" class="btn btn-secondary">Back</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
