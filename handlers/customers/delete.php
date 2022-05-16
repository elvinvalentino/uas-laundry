<?php
  include_once('../../Database.php');
  $route = '/laundry/?page=customer';

  $id = $_GET['id'];

  $db->query("DELETE FROM `customers` WHERE id = :id", array(
     ':id' => $id,
   ));

 header("location: $route&action=list");