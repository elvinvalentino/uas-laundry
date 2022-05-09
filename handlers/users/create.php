<?php
  include_once('../../Database.php');

 $route = '/laundry/?page=admin';

  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $confPassword = $_POST['confPassword'];

  $stmt = $db->query("SELECT * FROM `users` WHERE email = :email", array(
    ':email' => $email
  ));

  if($password != $confPassword) {
    header("location: $route&action=add&actionError=Password%20does%20not%20match");
    die();
  }

  print_r($_POST);

  if($stmt->rowCount() > 0) {
    header("location: $route&action=add&actionError=Email%20already%20exists");
    die();
  }

  header("location: $route&action=list");