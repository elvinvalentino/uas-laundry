<div class="d-flex justify-content-end mb-3">
  <a class="btn btn-primary my-btn-primary" href="?page=order&action=add">Add Order</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Customer</th>
      <th scope="col">Staff</th>
      <th scope="col">Package</th>
      <th scope="col">weight</th>
      <th scope="col">price</th>
      <th scope="col">status</th>
      <th scope="col">Expected date completed</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $stmt = $db->query("SELECT t.*, s.firstname AS staff_name, c.firstname AS customer_name, p.name AS package_name FROM `transactions` AS t 
        LEFT JOIN `staffs` AS s ON s.id = t.staff_id
        LEFT JOIN `customers` AS c ON c.id = t.customer_id
        LEFT JOIN `packages` AS p ON p.id = t.package_id");
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $isInProgress =  $row['status'] == 'in_progress'
    ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['customer_name'] ?></td>
        <td><?= $row['staff_name'] ?></td>
        <td><?= $row['package_name'] ?></td>
        <td><?= $row['weight'] ?> Kg</td>
        <td>Rp. <?= $row['price'] ?></td>
        <td class="fw-bold <?= $isInProgress ? 'text-warning' : 'text-success' ?>"><?= $isInProgress ? 'In Progress' : 'Completed' ?></td>
        <td><?= $row['expected_date_completed'] ?></td>
        <td>
          <a  
            class="btn <?= $isInProgress ? 'btn-success' : 'btn-secondary' ?>" 
            href="<?= $isInProgress ? "./handlers/transactions/complete.php?id=".$row['id'] : '#' ?>" 
            onclick="<?= $isInProgress ? "return confirm('Are you sure want to complete this order?')" : "false" ?>"
          >
            Complete Order
          </a>
        </td>
      </tr>
    <?php } ?>
    <?php if($stmt->rowCount() <= 0) { ?>
      <tr class="text-center">
        <td colspan="9">Transaction is empty!</td>
      </tr>
    <?php } ?>
  </tbody>
</table>