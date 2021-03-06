<div class="d-flex justify-content-end mb-3">
  <a class="btn btn-primary my-btn-primary" href="?page=admin&action=add">Add Admin</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Phonenumber</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $stmt = $db->query('SELECT * FROM `staffs`');
      $num = 1;
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
      <tr>
        <th scope="row"><?= $num++ ?></th>
        <td><?= $row['email'] ?></td>
        <td><?= $row['firstname'] ?></td>
        <td><?= $row['lastname'] ?></td>
        <td><?= $row['phone_number'] ?></td>
        <td>
        <a class="btn btn-warning" href="?page=admin&action=edit&id=<?= $row['id'] ?>">
            <i class="fa-solid fa-pen"></i>
        </a>
        <?php if($user['id'] != $row['id'] || $row['is_owner'] != 1) { ?>
          <a class="btn btn-danger" href="./handlers/staffs/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure want to delete admin with email of <?= $row['email'] ?>?')">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        <?php } ?>
        </td>
      </tr>
    <?php } ?>
    <?php if($stmt->rowCount() <= 0) { ?>
      <tr class="text-center">
        <td colspan="6">Staff is empty!</td>
      </tr>
    <?php } ?>
  </tbody>
</table>