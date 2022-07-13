<?php

$title = "Games";
include_once("layout/header.php");
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
$games = ['Football'=> 300, 'Swimming'=>250, 'Volleyball'=>150, 'Others'=>100]

?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST)) {
        if (validation($_POST)) {
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['count']= $_POST['count'];
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-info h1 mt-5">
                        Club
                    </div>
                    <div class="col-4 offset-4 mt-5 ">
                        <form action="Result.php" method="post">
                            <?php
                            $i = 1;
                            while ($_POST['count']) {
                            ?>
                                <div class="form-group">
                                    <label class="text-info mt-5 " for="">Member <?= $i ?></label>
                                    <input type="text" name="<?=$i?>[name]" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                 <?php foreach ($games as $game=> $cost) { ?>
                                    <div class="form-check">
                                    <input type="checkbox" class="form-check-input mb-5" name="<?=$i?>[games][<?= $game?>]" id="a" value="<?=$cost?>">

                                        <label class="form-check-label text-info  mb-3 ml-4">
                                            <?= $game?>

                                        </label>
                                    </div>
                                    

                    <?php
                                        }
                                        $i++;
                                        $_POST['count']--;
                                    }?>
                                    <button class="btn btn-info w-100">Submit</button>
                                    <?php
                                } else {
                                    header('location:Subscribe.php');
                                    die;
                                }
                            }
                        } ?>
                        </form>

                    </div>
                </div>
            </div>


            <?php
            include_once("layout/scripts.php");
            ?>