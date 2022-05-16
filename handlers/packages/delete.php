<?php
  include_once('../../Database.php');
  $route = '/laundry/?page=package';

  $id = $_GET['id'];

  $db->query("DELETE FROM `packages` WHERE id = :id", array(
     ':id' => $id,
   ));

 header("location: $route&action=list");