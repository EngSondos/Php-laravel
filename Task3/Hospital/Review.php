<?php
$questions = [
    'q1' => 'Are you satisfied with the cleanliness?',
    'q2' => 'Are you satisfied with the prices of the services?',
    'q3' => 'Are you satisfied with the nursing service?',
    'q4' => 'Are you satisfied with the level of the doctor?',
    'q5' => 'Are you satisfied with the calmness in the hospital? ',
];

$reviews = ['bad', 'good', 'very good', 'execllent'];


$title = "Review";
include_once("layout/header.php");

include_once("App/HTTP/MiddleWare/guest.php")


?>
<div class="containar">
    <div class="row">
        <div class="col-12 text-center text-info h1 mt-5">
            You Review
        </div>
        <div class="col-6 offset-3 mt-5">
            <form action="Results.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Questions</th>
                            <th>Bad</th>
                            <th>Good</th>
                            <th>Very Good</th>
                            <th>Excellent</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $_SESSION['question'] = $questions;


                        foreach ($questions as $key => $question) { ?>
                            <tr>
                                <td name=""><?= $question ?></td>
                                <?php
                                foreach ($reviews as $review) { ?>
                                    <td><input type="radio" value="<?= $review ?>" name="<?= $key ?>"></td>
                            <?php }
                            } ?>

                            </tr>

                    </tbody>
                </table>
                <div class="form-group">
                    <button class="btn btn-info w-100"> Submit</button>
                </div>

            </form>


        </div>
    </div>
</div>

<?php
include_once("layout/scripts.php");
?>