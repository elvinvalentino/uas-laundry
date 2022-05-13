<?php
  include_once('../../Database.php');

 $route = '/laundry/?page=admin';

  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $phoneNumber = $_POST['phoneNumber'];
  $confPassword = $_POST['confPassword'];

  if($password != $confPassword) {
    header("location: $route&action=add&actionError=Password%20does%20not%20match");
    die();
  }


  $stmt = $db->query("SELECT * FROM `staffs` WHERE email = :email", array(
    ':email' => $email
  ));

  if($stmt->rowCount() > 0) {
    header("location: $route&action=add&actionError=Email%20already%20exists");
    die();
  }

  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

  $db->query("INSERT INTO `staffs` (email, password, firstname, lastname, phone_number, is_owner) 
    VALUES (:email, :password, :firstname, :lastname, :phone_number, :is_owner)",
    array(
      ':email' => $email,
      ':password' => $hashedPassword,
      ':firstname' => $firstname,
      ':lastname' => $lastname,
      ':phone_number' => $phoneNumber,
      ':is_owner' => 0,
    ));

  header("location: $route&action=list");