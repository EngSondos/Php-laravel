<?php
$title = "Result";
include_once("layout/header.php");
// print_r($_POST);
function ClubSubscripe($count)
{
    return 10000 + $count * 2500;
}

?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center text-info h1 mt-3">
            Result
        </div>
        <div class="col-10 text-center mt-5 bg-info text-light offset-1">Subscriper : <?= $_SESSION['name'] ?></div>

        <?php
        $costeachmembergame = 0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST)) { ?>
                <div class="col-10 offset-3">

                </div>
                <?php foreach ($_POST as $index => $value) {
                ?>
                    <div class="col-4 mt-3">

                        <div class="card" style="width: 100%">
                            <div class="card-header">
                                <h4> Member information</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <b>Name : </b> <?= $value['name'] ?>
                                </li>


                                <?php
                                if (isset($value['games'])) {
                                    foreach ($value['games'] as $game => $cost) { ?>
                                        <li class="list-group-item"><b>Game</b> <?= " : " . $game ?></li>

                                <?php $costeachmembergame += $cost;
                                    }
                                }
                                ?>
                                <li class="list-group-item"><?= "<b> Total for games : </b>" . $costeachmembergame ?>LE</li>
                                <?php $costeachmembergame = 0;
                                ?>
                            </ul>

                        </div>
                    </div>


            <?php

                }
            } ?>
            <div class="col-12 mt-5">
                <div class="card" style="width: 100%">
                    <div class="card-header text-center">
                        Results
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php
                        // $totalcost + = totalforeachgame($_POST[$index]['games']);
                        $gamecost = [];
                        foreach ($_POST as $index => $value) {
                            if (isset($value['games'])) {
                                foreach ($value['games'] as $game => $cost) {
                                    $gamecost[$game] = 0;
                                }
                            }
                        }
                        foreach ($_POST as $index => $value) {
                            if (isset($value['games'])) {
                                foreach ($value['games'] as $game => $cost) {

                                    settype($cost, 'integer');

                                    $gamecost[$game] += $cost;
                                }
                            }
                        }
                        // print_r($totalcost);
                        $totalcost = 0;
                        foreach ($gamecost as $game => $cost) { ?>
                            <li class="list-group-item  text-center "> <?= $game . " Club  :   " . $cost . "LE"  ?></li>
                        <?php $totalcost += $cost;
                        } ?>
                        <li class="list-group-item text-center">Total for all Games : <?= $totalcost ?> LE</li>
                        <li class="list-group-item text-center">Club Subscription : <?= ClubSubscripe($_SESSION['count']) ?> LE</li>
                        <li class="list-group-item text-center bg-info text-light">Total Price : <?= ClubSubscripe($_SESSION['count']) + $totalcost ?> LE</li>



                    </ul>
                </div>
            </div>
        <?php
        }
        ?>



    </div>
</div>
</div>

<?php
include_once("layout/scripts.php");
?>