<?php 
  if($action == 'edit') {
    $stmt = $db->query('SELECT * FROM `packages` WHERE id = :id', array(
      ':id' => isset($_GET['id']) ? $_GET['id'] : 1
    ));
    $data = $stmt->fetch();
  }
?>
<div class="flex-3 form-content">
  <div class="d-flex justify-content-between">
    <h5 class="heading text-uppercase"><?= $action . ' ' . $page ?></h5>
    <a class="x-button" href="?page=package&action=list">
      <i class="fa-solid fa-x fa-2x"></i>
    </a>
  </div>
  <form action="./handlers/packages/<?= $action == 'add' ? 'create' : 'update' ?>.php" method="POST">
    <?php if(isset($_GET['actionError'])) { ?>
      <div class="alert alert-danger" role="alert"><?= $_GET['actionError'] ?></div>
    <?php } ?>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input required type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= $data['name'] ?? '' ?>">
    </div>
    <div class="row mb-3">
      <div class="col-6">
      <label for="pricePerKg" class="form-label">Price / Kg</label>
      <input required type="number" class="form-control" id="pricePerKg" name="pricePerKg" placeholder="Price Per Kg" value="<?= $data['price_per_kg'] ?? '' ?>">
      </div>
      <div class="col-6">
      <label for="duration" class="form-label">Duration (days)</label>
        <input required type="number" class="form-control" id="duration" name="duration" placeholder="Duration" value="<?= $data['duration'] ?? '' ?>">
      </div>
    </div>
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-primary text-uppercase"><?= $action . ' ' . $page ?></button>
    </div>
  </form>
</div>