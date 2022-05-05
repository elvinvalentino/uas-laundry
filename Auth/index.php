<?php
  session_start();
  
  if(isset($_SESSION['user'])) {
    header('location: /laundry/');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laundry</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" defer></script>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <form action="handlers/login.php" method="POST">
    <div class="card my-card">
      <div class="card-header">
        LOGIN
      </div>
      <div class="card-body">
        <?php if($_GET['error'] ?? '' == 'unauthorized') { ?>
          <div class="alert alert-danger" role="alert">Invalid Email or Password</div>
        <?php } ?>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email..." value="<?= $_GET['email'] ?? '' ?>">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password...">
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end">
        <button class="btn btn-primary">LOGIN</button>
      </div>
    </div>
  </form>
</body>
</html>