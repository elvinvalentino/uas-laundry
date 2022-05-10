<?php
  include_once('../../Database.php');

 $route = '/laundry/?page=admin';

  $id = $_POST['id'];
  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $phoneNumber = $_POST['phoneNumber'];

  $stmt = $db->query("SELECT * FROM `users` WHERE email = :email AND id != :id", array(
    ':email' => $email,
    ':id' => $id
  ));

  if($stmt->rowCount() > 0) {
    header("location: $route&action=add&actionError=Email%20already%20exists");
    die();
  }

  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

  $db->query("UPDATE `users` SET
   email = :email,
   firstname = :firstname,
   lastname = :lastname,
   phone_number = :phone_number
   WHERE id = :id
   ",
    array(
      ':email' => $email,
      ':firstname' => $firstname,
      ':lastname' => $lastname,
      ':phone_number' => $phoneNumber,
      ':id' => $id,
    ));

  header("location: $route&action=list");