<?php

$title = "Bank";
include_once("layout/header.php");
function InterestRate($loan, $years)
{
  if ($years >= 1 && $years <= 3) {
    return $loan * 0.1 * $years;
  } else {
    return $loan * 0.15 * $years;
  }
}
function validation($inputs)
{
  foreach ($inputs as $input) {
    if (!$input) {
      return false;
    }
  }
  return true;
}

$erorr = "";


?>
<div class="container">
  <div class="row">
    <div class="col-12 text-center text-info h1 mt-5">
      Bank

    </div>
    <div class="col-4 offset-4 mt-5 ">
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value=<?= $_POST['name'] ?? "" ?>>
        </div>
        <div class="form-group">
          <label for="name">Loan amount</label>
          <input type="number" name="loan" id="loan" class="form-control" placeholder="" aria-describedby="helpId" value=<?= $_POST['loan'] ?? "" ?>>
        </div>
        <div class="form-group">
          <label for="name">loan years</label>
          <input type="number" name="years" id="years" class="form-control" placeholder="" aria-describedby="helpId" value=<?= $_POST['years'] ?? "" ?>>
        </div>
        <div class="form-group">
          <button class="btn btn-info w-100">Submit</button>
        </div>
      </form>
      <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST)) {
          if (validation($_POST)) {
      ?>
            <table class="table table-striped table-inverse table-responsive">
              <thead class="thead-inverse">
                <tr class="text-center text-info">
                  <th>User Name</th>
                  <th>Interst Rate</th>
                  <th>Loan after rate</th>
                  <th>Monthly</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $_POST['name'] ?></td>
                  <td><?= InterestRate($_POST['loan'], $_POST['years']) ?></td>
                  <td><?= $_POST['loan'] + InterestRate($_POST['loan'], $_POST['years']) ?></td>
                  <td><?= ($_POST['loan'] + InterestRate($_POST['loan'], $_POST['years'])) / ($_POST['years'] * 12); ?></td>
                </tr>
              </tbody>
            </table>
      <?php
          }else {

            $erorr = "<div class ='alert alert-danger'>enter all information please!</div>";
          }
        } 
      } ?>
            <?= $erorr ?? "" ?>

    </div>
  </div>
</div>


<?php
include_once("layout/scripts.php");
?>