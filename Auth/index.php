<?php
  session_start();
  
  if(isset($_SESSION['user'])) {
    header('location: /laundry/');
  }
?>
  
<?php include_once('../components/core/header.php') ?>
<body>
  <form action="../handlers/auth/login.php" method="POST">
    <div class="card login-card">
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
<?php include_once('../components/core/footer.php') ?>
