<div class="sidebar">
  <h5 class="mb-4">OneLaundry</h5>
  <ul>
    <?php if($user['is_superadmin'] == 1) { ?>
      <li>
          <a class="<?= $page == 'admin' ? 'active' : '' ?>" href="?page=admin">
            <div class="d-inline-block sidebar-icon-wrapper">
              <i class="fa-solid fa-house sidebar-icon"></i>
            </div>
            Admin
          </a>
      </li>
    <?php } ?>
    <li>
      <a class="<?= $page == 'customer' ? 'active' : '' ?>" href="?page=customer">
        <div class="d-inline-block sidebar-icon-wrapper">
          <i class="fa-solid fa-user-large sidebar-icon"></i>
        </div>
        Customer
      </a>
    </li>
    <li>
      <a class="<?= $page == 'package' ? 'active' : '' ?>" href="?page=package">
        <div class="d-inline-block sidebar-icon-wrapper">
          <i class="fa-solid fa-box-archive sidebar-icon"></i>
        </div>
        Package
      </a>
    </li>
    <li>
      <a class="<?= $page == 'order' ? 'active' : '' ?>" href="?page=order">
        <div class="d-inline-block sidebar-icon-wrapper">
          <i class="fa-solid fa-cart-flatbed sidebar-icon"></i>
        </div>
        Order
      </a>
    </li>
    <li>
      <a class="<?= $page == 'logout' ? 'active' : '' ?>" href="./handlers/auth/logout.php" onclick="return confirm('Are you sure want to logout?')">
        <div class="d-inline-block sidebar-icon-wrapper">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </div>
        Logout
      </a>
    </li>
  </ul>
</div>