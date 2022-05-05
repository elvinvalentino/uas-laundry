<?php
  include_once('../../Database.php');

  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $db->query("SELECT * FROM `users` WHERE email = :email", array(
    ':email' => $email
  ));

  if($stmt->rowCount() > 0) {
    header("location: /laundry/auth?error=unauthorized&email=$email");
  }

  $row = $stmt->fetch();

  if(!password_verify($password, $row['password'])) {
    header("location: /laundry/auth?error=unauthorized&email=$email");
  }

  session_start();
  $_SESSION['user'] = $row;

  header("location: /laundry/");
