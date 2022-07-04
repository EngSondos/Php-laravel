<?php
if ($_POST) {
    $consumption = $_POST['consumption'];
    if($consumption<0){
        $TotalCost ="invalid data";
    }else{
        $TotalCost ="You Must pay";
        $surcharge = 0.2 * $consumption;
        switch ($consumption) {
            
            case $consumption > 0 && $consumption <= 50:
                $consumptionCost = 0.5 * $consumption;
                break;
            case $consumption > 50 && $consumption <= 150:
                $consumptionCost = 0.75 * $consumption;
                break;
            case $consumption > 150 && $consumption <= 250:
                $consumptionCost = 1.20 * $consumption;
                break;
            default:
                $consumptionCost = 1.50 * $consumption;
        }
        $TotalCost .= " ". $consumptionCost+$surcharge ." EGP";
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
            Calculation of electricity Bill
            </div>
            <div class="col-4 offset-4 mt-3">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Consumption</label>
                        <input type="number" name="consumption" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="form-group offset-5">
                        <button class="btn btn-info">Calculate</button>
                    </div>
                    <div class="alert alert-info">
                         <?=$TotalCost?? " "  ?> 
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>