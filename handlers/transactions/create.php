<?php
  include_once('../../Database.php');

 $route = '/laundry/?page=order';

 session_start();

  $customer_id = $_POST['customer_id'];
  $package_id = $_POST['package_id'];
  $weight = $_POST['weight'];

  $packageStmt = $db->query('SELECT * FROM `packages` WHERE id = :id', array(
    ':id' => $package_id
  ));
  $package = $packageStmt->fetch();
  $dateNow = new DateTime();
  $exptected_date_completed = $dateNow->add(new DateInterval("P" . $package['duration'] . "D"));
  

  $db->query("INSERT INTO `transactions` (customer_id, staff_id, package_id, status, weight, price, expected_date_completed) 
    VALUES (:customer_id, :staff_id, :package_id, :status, :weight, :price, :expected_date_completed)",
    array(
      ':customer_id' => $customer_id,
      ':staff_id' => $_SESSION['user']['id'],
      ':package_id' => $package_id,
      ':status' => 'in_progress',
      ':weight' => $weight,
      ':price' => $package['price_per_kg'] * $weight,
      ':expected_date_completed' => $exptected_date_completed->format('Y-m-d'),
    ));

  header("location: $route&action=list");