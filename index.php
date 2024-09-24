<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choose an Option</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .choice-container {
      border: 1px solid #ddd;
      padding: 20px;
      text-align: center;
      transition: 0.3s;
      cursor: pointer;
    }
    .choice-container:hover {
      background-color: #f8f9fa;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .choice-title {
      font-size: 1.5rem;
      margin-bottom: 10px;
    }
    .choice-container i {
      font-size: 3rem;
      color: #007bff;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">What would you like to do?</h2>
  
  <div class="row justify-content-center">
    <!-- dito yung process nato is pipili ka dalawa kung magsesend kaba ng message or mag login ka -->
    <div class="col-md-4 mb-4">
      <a href="contact.php" class="text-decoration-none">
        <div class="choice-container shadow-sm">
          <i class="bi bi-envelope"></i> 
          <div class="choice-title">Send a Message</div>
          <p>Click here to send us a message or ask a question.</p>
        </div>
      </a>
    </div>

    <!-- eto yung login container -->
    <div class="col-md-4 mb-4">
      <a href="login.php" class="text-decoration-none">
        <div class="choice-container shadow-sm">
          <i class="bi bi-box-arrow-in-right"></i> 
          <div class="choice-title">Login to the System</div>
          <p>Click here to log in to your account.</p>
        </div>
      </a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
</body>
</html>
