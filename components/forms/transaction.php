<?php 
  if($action != 'add') {
    $action = 'add';
  }
?>
<div class="flex-3 form-content">
  <div class="d-flex justify-content-between">
    <h5 class="heading text-uppercase"><?= $action . ' ' . $page ?></h5>
    <a class="x-button" href="?page=order&action=list">
      <i class="fa-solid fa-x fa-2x"></i>
    </a>
  </div>
  <form action="./handlers/transactions/<?= $action == 'add' ? 'create' : 'update' ?>.php" method="POST">
    <?php if(isset($_GET['actionError'])) { ?>
      <div class="alert alert-danger" role="alert"><?= $_GET['actionError'] ?></div>
    <?php } ?>
    <div class="mb-3">
      <label for="customer" class="form-label">Customer</label>
      <select id="customer" class="form-select" name="customer_id">
        <option value="default" disabled selected="<?= $action == 'edit' ? 'false' : 'true' ?>">Select Customer</option>
        <?php 
          $userStmt = $db->query('SELECT * FROM `customers`');
          while($row = $userStmt->fetch(PDO::FETCH_ASSOC)){
        ?>
          <option value="<?= $row['id'] ?>"><?= $row['firstname'] . ' ' . $row['lastname'] . ' - ' . $row['phone_number'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="package" class="form-label">Package</label>
      <select id="package" class="form-select" name="package_id">
        <option value="default" disabled selected="<?= $action == 'edit' ? 'false' : 'true' ?>">Select Package</option>
        <?php 
          $packageStmt = $db->query('SELECT * FROM `packages`');
          while($row = $packageStmt->fetch(PDO::FETCH_ASSOC)){
        ?>
          <option value="<?= $row['id'] ?>"><?= $row['name'] . ' - Rp.' . $row['price_per_kg'] . ' / Kg' ?></option>
        <?php } ?>
      </select>
    </div>
    <label for="weight" class="form-label">Weight</label>
    <div class="mb-3 input-group flex-nowrap">
      <input required type="number" class="form-control" id="weight" name="weight" placeholder="Weight" value="<?= $data['weight'] ?? '' ?>">
      <span class="input-group-text">Kg</span>
    </div>
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-primary text-uppercase"><?= $action . ' ' . $page ?></button>
    </div>
  </form>
</div>