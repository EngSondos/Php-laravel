<?php

$title = "Results";
include_once("layout/header.php");
include_once("App/HTTP/MiddleWare/guest.php")
?>
<div class="containar">
    <div class="row">
        <div class="col-12 text-center text-info h1 mt-5">
            Results
        </div>
        <div class="col-7 offset-3 mt-4">

            <table class="table">
                <thead>
                    <tr>
                        <th>Questions</th>
                        <th>Result</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $Reviews = 0;
                   
                    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                        if (count($_SESSION['question']) != count($_POST)) {
                            header('location:Review.php');
                        } else {
                            $error = [];
                            foreach ($_POST as $key => $review) {
                    ?>
                                <tr>
                                    <td value="" name=""><?= $_SESSION['question'][$key] ?></td>
                                    <td name=""><?= $review ?></td>
                                </tr>
                            <?php switch ($review) {
                                    case 'Good':
                                        $Reviews += 3;
                                        break;
                                    case 'Very Good':
                                        $Reviews += 5;
                                        break;
                                    case 'execllent':
                                        $Reviews += 10;
                                        break;
                                    default:
                                }
                            }
                            ?>
                            <tr class="bg-info text-light">
                                <td>Your Review is :</td>
                                <?php if ($Reviews < 25) {
                                ?>
                                    <td>Bad</td>
                            </tr>
                </tbody>
            </table>
            <p class="alert alert-danger">We will call you later on this phone :<?= $_SESSION["phone"] ?></p>
        <?php
                                } else { ?>
            <td>Exellence</td>
            </tr>
            </tbody>
            </table>
            <p class="alert alert-success text-center">Thanks</p>

<?php   }
                            }
                        }
?>


        </div>
    </div>
</div>

<?php
include_once("layout/scripts.php");

?>