<?php
$title="club";
include_once("layout/header.php");

?>

<div class="container">
  <div class="row">
    <div class="col-12 text-center text-info h1 mt-3">
      Club
    </div>
    <div class="col-4 offset-4 mt-5 ">
      <form action="Games.php" method="post">
        <div class="form-group">
          <label for="name" class="text-info">Member Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value=<?= $_SESSION['name'] ?? "" ?>>
          <small id="helpId" class="text-muted">Club subscription start with <b>10,000 LE</b></small>
        </div>
        <div class="form-group">
          <label for="count" class="text-info">count of family members</label>
          <input type="number" name="count" id="count" class="form-control" placeholder="" aria-describedby="helpId" >
          <small id="helpId" class="text-muted">Cost of each member is <b>2,500 LE</b></small>
        </div>
        <div class="form-group">
          <button class="btn btn-info w-100">Submit</button>
        </div>

      </form> 
    
    </div>
  </div>
</div>
      <?php
      include_once("layout/scripts.php");
      ?>