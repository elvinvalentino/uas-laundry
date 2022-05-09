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
    </tr>
  </thead>
  <tbody>
    <?php 
      $stmt = $db->query('SELECT * FROM `users`');
      $num = 1;
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
      <tr>
        <th scope="row"><?= $num++ ?></th>
        <td><?= $row['email'] ?></td>
        <td><?= $row['firstname'] ?></td>
        <td><?= $row['lastname'] ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>