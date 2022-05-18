<?php
  include_once('../../Database.php');

 $route = '/laundry/?page=order';

 $id = $_GET['id'];

  $db->query("UPDATE `transactions` SET
   status = :status
   WHERE id = :id
   ",
    array(
      ':status' => 'completed',
      ':id' => $id,
    ));

  header("location: $route&action=list");