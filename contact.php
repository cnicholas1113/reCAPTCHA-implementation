<?php
session_start();

if (isset($_POST['data'])) {
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
                $_SESSION['message'] = htmlspecialchars($_POST['message']); 

                echo "<script>alert('Your message has send please go to login');</script>";
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
    <title>Contact</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title text-center">Send a Message</h4>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <input type="text" name="message" id="message" class="form-control" placeholder="Enter your message" required>
                            <br>
                            <!-- eto yung container kung saan lalabas yung pinaka design ng captcha -->
                            <center>
                                <div class="g-recaptcha" data-sitekey="6Ld9yUoqAAAAACkaXsg08Vp2dfEBKuP4UM89NfEA"></div>
                            </center>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="data" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <div class="d-grid mt-3">
                        <!-- eto naman yung proseso neto babalik lang sya sa index.php -->
                        <button onclick="window.location.href='index.php'" class="btn btn-secondary">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
