<?php 
if($_POST){
    $max= $_POST['firtsNumber'];
    $Secondnumber = $_POST['secondNumber'];
    $Thirdnumber =$_POST['thirdNumber'];
    if( $Secondnumber > $max || $Thirdnumber > $max){
        if($Secondnumber > $Thirdnumber){
        $max = $Secondnumber;
    }else{
        $max =$Thirdnumber;
    }

    }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="containar">
        <div class="row">
            <div class="col-12 text-center text-info h1 mt-5">
                Get Max Number
            </div>
            <div class="col-4 offset-4 mt-3">
                <form action="" method="post">
                    <div class="form-group">
                      <label for="">First Number</label>
                      <input type="number" name="firtsNumber" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Second Number</label>
                      <input type="number" name="secondNumber" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Third Number</label>
                      <input type="number" name="thirdNumber" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group offset-4">
                      <button class="btn btn-info">GET MAX Number</button>
                    </div>
                    <div class="alert alert-info">
                         MAX Number IS : <?= $max ?? " " ?>
                    </div>

                </form>
            </div>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>