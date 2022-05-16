<div class="d-flex justify-content-end mb-3">
  <a class="btn btn-primary my-btn-primary" href="?page=package&action=add">Add Package</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price / Kg</th>
      <th scope="col">duration (days)</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $stmt = $db->query('SELECT * FROM `packages`');
      $num = 1;
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
      <tr>
        <th scope="row"><?= $num++ ?></th>
        <td><?= $row['name'] ?></td>
        <td><?= $row['price_per_kg'] ?></td>
        <td><?= $row['duration'] ?></td>
        <td>
          <a class="btn btn-warning" href="?page=package&action=edit&id=<?= $row['id'] ?>">
              <i class="fa-solid fa-pen"></i>
          </a>
          <a class="btn btn-danger" href="./handlers/packages/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure want to delete package with id of <?= $row['id'] ?>?')">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </td>
      </tr>
    <?php } ?>
    <?php if($stmt->rowCount() <= 0) { ?>
      <tr class="text-center">
        <td colspan="5">Package is empty!</td>
      </tr>
    <?php } ?>
  </tbody>
</table>