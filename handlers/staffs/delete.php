<?php
  include_once('../../Database.php');
  $route = '/laundry/?page=admin';

  $id = $_GET['id'];

  $db->query("DELETE FROM `staffs` WHERE id = :id", array(
     ':id' => $id,
   ));

 header("location: $route&action=list");