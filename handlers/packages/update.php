<?php
  include_once('../../Database.php');

 $route = '/laundry/?page=package';

 $id = $_POST['id'];
 $name = $_POST['name'];
 $pricePerKg = $_POST['pricePerKg'];
 $duration = $_POST['duration'];

  $db->query("UPDATE `packages` SET
   name = :name,
   price_per_kg = :price_per_kg,
   duration = :duration,
   WHERE id = :id
   ",
    array(
      ':name' => $name,
      ':price_per_kg' => $firstname,
      ':duration' => $pricePerKg,
      ':phone_number' => $phoneNumber,
      ':id' => $id,
    ));

  header("location: $route&action=list");