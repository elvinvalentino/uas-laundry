<?php
include_once('./Database.php');

session_start();

if(!isset($_SESSION['user'])) {
  header('location: /laundry/auth/');
}

$user = $_SESSION['user'];

if(isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = $user['is_owner'] == 1 ? 'admin' : 'customer';
}

$action = $_GET['action'] ?? 'list'; 


if($user['is_owner'] != 1 && $page == 'admin') {
  $page = 'customer';
}
?>
<?php include_once('./components/core/header.php') ?>
<div class="d-flex">
  <?php include_once('./components/sidebar.php') ?>
  <div class="<?= $action != 'list' ? 'flex-6' : 'flex-1' ?> content">
    <h5 class="heading text-uppercase"><?= $page ?></h5>
    <?php 
      if($page == 'admin') {
        include_once("./components/tables/staff.php");
      } else if ($page == 'package') {
        include_once("./components/tables/package.php");
      } else if ($page == 'customer') {
        include_once("./components/tables/customer.php");
      } else if ($page == 'order') {
        include_once("./components/tables/transaction.php");
      }
    ?>
    </div>
    <?php if($action != 'list') { 
      if($page == 'admin') {
        include_once("./components/forms/staff.php");
      } else if ($page == 'package') {
        include_once("./components/forms/package.php");
      } else if ($page == 'customer') {
        include_once("./components/forms/customer.php");
      } else if ($page == 'order') {
        include_once("./components/forms/transaction.php");
      }
    } ?>
  </div>
<?php include_once('./components/core/footer.php') ?>