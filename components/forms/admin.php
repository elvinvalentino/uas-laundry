<div class="flex-3 form-content">
  <h5 class="heading text-uppercase"><?= $action . ' ' . $page ?></h5>
  <form action="./handlers/users/<?= $action == 'add' ? 'create' : 'update' ?>.php" method="POST">
    <?php if(isset($_GET['actionError'])) { ?>
      <div class="alert alert-danger" role="alert"><?= $_GET['actionError'] ?></div>
    <?php } ?>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input required type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $_GET['email'] ?? '' ?>">
    </div>
    <div class="row mb-3">
      <div class="col-6">
        <label for="firstname" class="form-label">Firstname</label>
        <input required type="firstname" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
      </div>
      <div class="col-6">
      <label for="lastname" class="form-label">Lastname</label>
        <input required type="lastname" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
      </div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input required type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="mb-4">
      <label for="confPassword" class="form-label">Confirm Password</label>
      <input required type="password" class="form-control" id="confPassword" name="confPassword" placeholder="Confirm Password">
    </div>
    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-primary text-uppercase"><?= $action . ' ' . $page ?></button>
    </div>
  </form>
</div>