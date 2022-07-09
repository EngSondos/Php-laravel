<?php

$title = "Hospital";
include_once("layout/header.php");
$erorr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['phone'])) {
    $erorr = "<div class ='alert alert-danger'>* Number is requierd</div>";
  } else {
    $_SESSION["phone"] = $_POST['phone'];
    header('location:Review.php');
  }
}

?>
<div class="container">
  <div class="row">
    <div class="col-12 text-center text-info h1 mt-5">
      Hospital

    </div>
    <div class="col-4 offset-4 mt-5 ">
      <form action="" method="post">
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="number" name="phone" id="phone" class="form-control" placeholder="Your phonenumber" aria-describedby="helpId" value=<?= $_SESSION['phone'] ?? "" ?>>
        </div>
        <div class="form-group">
          <button class="btn btn-info w-100">Submit</button>
        </div>
      </form>
      <?= $erorr ?? "" ?>
    </div>
  </div>
</div>


<?php
include_once("layout/scripts.php");
?>