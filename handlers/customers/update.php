<?php
  include_once('../../Database.php');

 $route = '/laundry/?page=customer';

  $id = $_POST['id'];
  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $phoneNumber = $_POST['phoneNumber'];

  $stmt = $db->query("SELECT * FROM `customers` WHERE email = :email AND id != :id", array(
    ':email' => $email,
    ':id' => $id
  ));

  if($stmt->rowCount() > 0) {
    header("location: $route&action=add&actionError=Email%20already%20exists");
    die();
  }


  $db->query("UPDATE `customers` SET
   email = :email,
   firstname = :firstname,
   lastname = :lastname,
   address = :address,
   phone_number = :phone_number
   WHERE id = :id
   ",
    array(
      ':email' => $email,
      ':firstname' => $firstname,
      ':lastname' => $lastname,
      ':address' => $address,
      ':phone_number' => $phoneNumber,
      ':id' => $id,
    ));

  header("location: $route&action=list");