<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 style="text-align:center; font-size:50px;">The Message is: <?php echo $_SESSION['message'];?></h1>
    <br>
    <center><button onclick="window.location.href='index.php'" class="btn btn-secondary">Back</button></center>
</body>
</html>