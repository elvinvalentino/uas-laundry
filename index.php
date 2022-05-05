<?php
  include_once('./Database.php');

session_start();

if(!isset($_SESSION['user'])) {
  header('location: /laundry/auth/');
}

$user = $_SESSION['user'];
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
</head>
<body>
  <div class="container">
  <h5>ADMIN</h5>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Email</th>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $stmt = $db->query('SELECT * FROM `users`');
          $num = 1;
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
          <tr>
            <th scope="row"><?= $num++ ?></th>
            <td><?= $row['email'] ?></td>
            <td><?= $row['firstname'] ?></td>
            <td><?= $row['lastname'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>