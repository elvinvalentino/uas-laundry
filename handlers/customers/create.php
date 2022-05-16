<?php
  include_once('../../Database.php');

 $route = '/laundry/?page=customer';

  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $phoneNumber = $_POST['phoneNumber'];

  $stmt = $db->query("SELECT * FROM `customers` WHERE email = :email", array(
    ':email' => $email
  ));

  if($stmt->rowCount() > 0) {
    header("location: $route&action=add&actionError=Email%20already%20exists");
    die();
  }


  $db->query("INSERT INTO `customers` (email, firstname, lastname, address, phone_number) 
    VALUES (:email, :firstname, :lastname, :address, :phone_number)",
    array(
      ':email' => $email,
      ':firstname' => $firstname,
      ':lastname' => $lastname,
      ':address' => $address,
      ':phone_number' => $phoneNumber,
    ));

  header("location: $route&action=list");