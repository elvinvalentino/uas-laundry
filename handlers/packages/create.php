<?php
  include_once('../../Database.php');

 $route = '/laundry/?page=package';

  $name = $_POST['name'];
  $pricePerKg = $_POST['pricePerKg'];
  $duration = $_POST['duration'];

  $db->query("INSERT INTO `packages` (name, price_per_kg, duration) 
    VALUES (:name, :price_per_kg, :duration)",
    array(
      ':name' => $name,
      ':price_per_kg' => $pricePerKg,
      ':duration' => $duration,
    ));

  header("location: $route&action=list");