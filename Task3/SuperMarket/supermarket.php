<?php
$citys = ['giza', 'cairo', 'alex', 'others'];

$title = "Super Market";
include_once("parts/functions.php");
include_once("layout/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center text-info mt-4 h2">
            Super Market
        </div>
        <div class="col-4 offset-4 mt-5">
            <form action="" method="post">
                <!-- first part of form -->
                <div class="form-group">
                    <label class="text-info" for="name">Client Name</label>
                    <input type="text" value="<?= $_POST['first']['name'] ?? "" ?>" name="first[name] " id="name" class="form-control" placeholder=" " aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label class="text-info" for="citys">Client City</label>
                    <select name="first[citys]" id="" class="form-control" ?>">
                        <option name="first[citys]" value=""></option>
                        <?php foreach ($citys as $city) {  ?>
                            <option name="first[citys]" <?php if (isset($_POST['first']['citys']) && $city == $_POST['first']['citys']) echo 'selected' ?> value='<?= $city ?>'><?= $city ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numberofproducts" class="text-info "> Number Of Products</label>
                    <input value="<?= $_POST['first']['numberofproducts'] ?? "" ?>" type="number" name="first[numberofproducts]" id="numberofproducts" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <button class="btn btn-info w-100" name="" id="" value="First">Submit</button>
                </div>
                <!-- second part of form after first submit -->
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    // print_r($_POST);
                    // $_SESSION['firstRequest']=[$_POST['name'],$_POST['citys'] , $_POST['numberofproducts']] ?? "";
                    $NumberOfProduct = $_POST['first']['numberofproducts'] ?? 0;
                    $count = 0;
                    // print_r($_SESSION);
                    //call function 
                    if (isset($_POST['first'])) {

                        foreach ($_POST['first'] as $key => $name) {
                            print_r($key . "" . $name);
                        }
                    } else {
                    }
                    foreach ($_POST['first'] as $index => $clientinfo) {
                        if (empty($_POST['first'][$index])) {
                            $count++;
                        }
                    }
                    // echo $count;
                    if ($count == 0) {
                        if (isset($_POST['first'])) {
                            if (!isset($_POST['second'])) { ?>
                                <table class="table table-striped table-inverse table-responsive">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="text-info text-center">No.</th>
                                            <th class="text-info text-center">Product Name</th>
                                            <th class="text-info text-center">Price</th>
                                            <th class="text-info text-center">Quantittes</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 0;
                                        while ($i < $NumberOfProduct) {
                                        ?>

                                            <tr>
                                                <td><?= $i ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="second[pname][]" id="" class="form-control" value="<?= $_POST['second']['pname'][$i] ?? "" ?>" placeholder="" aria-describedby="helpId">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" name="second[price][]" id="price =" class="form-control" value="<?= $_POST['second']['price'][$i] ?? "" ?>" placeholder="" aria-describedby="helpId">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" name="second[q][]" id="quantaties" class="form-control" value="<?= $_POST['second']['q'][$i] ?? "" ?>" placeholder="" aria-describedby="helpId">
                                                    </div>
                                                </td>

                                            </tr>

                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <button class="btn btn-info w-100">Calcuate Net</button>



                            <?php

                            } else { ?>
                                <table class="table table-striped table-inverse table-responsive">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="text-info text-center">No.</th>
                                            <th class="text-info text-center">Product Name</th>
                                            <th class="text-info text-center">Price</th>
                                            <th class="text-info text-center">Quantittes</th>
                                            <th class="text-info text-center">Sub Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 0;
                                        $Totalprice=0;
                                        while ($i < $NumberOfProduct) {
                                        ?>

                                            <tr>
                                                <td><?= $i ?></td>
                                                <td>
                                                    <?= $_POST['second']['pname'][$i] ?? "" ?>
                                                </td>
                                                <td>
                                                    <?= $_POST['second']['price'][$i] ?? "" ?>

                                                </td>
                                                <td>
                                                    <?= $_POST['second']['q'][$i] ?? "" ?>
                                                </td>
                                                <td>
                                                    <?= $_POST['second']['q'][$i] * $_POST['second']['price'][$i]  ?>
                                                </td>

                                            </tr>
                                        <?php
                                        $Totalprice += $_POST['second']['q'][$i] * $_POST['second']['price'][$i] ;
                                            $i++;
                                        }
                                        ?>
                                
                                <tr>
                                    <td colspan="5" class="text-center h4" >Reicep</td>
                                </tr>

                                        <tr >
                                            <td colspan="3">
                                                Client Name
                                            </td>
                                            <td colspan="2"> <?= $_POST['first']['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                City
                                            </td >
                                            <td colspan="2"><?= $_POST['first']['citys'] ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                Total
                                            </td>
                                            <td colspan="2"><?= $Totalprice; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                Discount
                                            </td>
                                            <td colspan="2"><?=calculatedescount($Totalprice) ."%"?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                               Total After Discount
                                            </td>
                                            <td colspan="2"><?=$Totalprice - calculatedescount($Totalprice)?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                               Delivery
                                            </td>
                                            <td colspan="2"><?=calculatedelivery($_POST['first']['citys'])?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                               Total Net
                                            </td>
                                            <td colspan="2"><?=calculatedelivery($_POST['first']['citys']) + $Totalprice - calculatedescount($Totalprice)?></td>
                                            
                                        </tr>

                                    </tbody>
                                </table>




                        <?php }
                        }
                    } else { ?>
                        <button class="alert alert-danger"> please enter all information</button>

            </form>

    <?php }
                }
    ?>

        </div>
    </div>
</div>

<?php
include_once("layout/scripts.php");
?>