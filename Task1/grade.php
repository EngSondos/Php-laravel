<?php 
define('ALL_GRADE',500);

if($_POST){
  # for loop احلي .... sad 
    if($_POST['physicsgrade']<0 
    ||$_POST['chemistrygrade'] <0
     ||$_POST['biologygrade']<0 
    ||$_POST['mathematicsgrade'] <0
     || $_POST['computergrade']< 0
    ||$_POST['physicsgrade']>100 
    ||$_POST['chemistrygrade']>100
    ||$_POST['biologygrade']>100
    ||$_POST['mathematicsgrade']>100
    ||$_POST['computergrade']>100 
    ||empty($_POST['physicsgrade'])
    ||empty($_POST['chemistrygrade'] )
    ||empty($_POST['biologygrade'])
    ||empty($_POST['mathematicsgrade'])
    ||empty($_POST['computergrade'])
    ){  
        $finalGrade = "Sorry Your Grades is invalid";
    }else{
      $TotalGrades= $_POST['physicsgrade']+$_POST['chemistrygrade']+$_POST['biologygrade']+$_POST['mathematicsgrade']+$_POST['computergrade'];

        $percentage= $TotalGrades/ALL_GRADE*100;
        if($percentage >=90 ){
             $finalGrade="percentage : {$percentage} Your Grade A";
        }elseif($percentage>=80){
            $finalGrade="percentage : {$percentage} Your Grade B";
        }elseif($percentage>=70){
            $finalGrade="percentage : {$percentage} Your Grade C";
        }elseif($percentage>=60){
            $finalGrade="percentage : {$percentage} Your Grade D";
        }elseif($percentage>=40){
            $finalGrade="percentage : {$percentage} Your Grade E";
        }elseif($percentage<40  ){
            $finalGrade="percentage : {$percentage} Your Grade F";
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
             Calculate your Grade        
              </div>
            <div class="col-4 offset-4 mt-3">
                <form action="" method="post">
                    <div class="form-group">
                      <label for="">Physics</label>
                      <input type="number" name="physicsgrade" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Chemistry</label>
                      <input type="number" name="chemistrygrade" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Biology</label>
                      <input type="number" name="biologygrade" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Mathematics</label>
                      <input type="number" name="mathematicsgrade" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Computer</label>
                      <input type="number" name="computergrade" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group offset-5">
                      <button class="btn btn-info">Calculate</button>
                    </div>
                    <div class="alert alert-info">
                        <?= $finalGrade ?? " " ?>
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