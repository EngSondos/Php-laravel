<?php
$title = "Profile";
use APP\Model\Tables\User;
use APP\Validation\Validation;

include_once 'layout/header.php';
include_once 'layout/navbar.php';
include_once 'layout/breadcrumb.php';
include_once "APP/HTTP/Middleware/Guest/guest.php";

$validation = new Validation;
$user = new User;
if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(isset($_POST['change_passowrd'])){
        $validation->setInputName("Current Password")->setInputValue($_POST['current'])->require()->regex("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/");
        $validation->setInputName("New Password")->setInputValue($_POST['new'])->require()->regex("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/")->confirm($_POST['confirm']);
        $validation->setInputName("New Password Confirm")->setInputValue($_POST['confirm'])->require();
        if(!$validation->get_Errors()){
            if(password_verify($_POST['current'],$_SESSION['user']->password)){
                $user->setEmail($_SESSION['user']->email)->setPassword($_POST['new']);
               $result= $user->updatePassword();
               if($result){
                $_SESSION['user']->password=$user->getPassword();
                $submit="<div class='alert alert-success'> Your Password is Change</div>";
               } else{
                $error="<div class='alert alert-danger'> Try Again Later .</div>";
               }
            } else{
                $error="<div class='alert alert-danger'> Your Current Password is Incorrect .</div>";
            }
        }
           }
        }
        if(isset($_POST['account_info'])){
            
        }
            
        


    

?>
        <!-- my account start -->
        <div class="checkout-area pb-80 pt-100">
            <div class="container">
                <div class="row">
                    <div class="ml-auto mr-auto col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                                    </div>
                                    <div id="my-account-1" class="panel-collapse collapse <?php if($_POST['account_info']) {echo'show';}?>"  >
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper ">
                                                <div class="account-info-wrapper">
                                                    <h4>My Account Information</h4>
                                                    <h5>Your Personal Details</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>First Name</label>
                                                            <input type="text" value="<?=$_SESSION['user']->first_name?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Last Name</label>
                                                            <input type="text" value="<?=$_SESSION['user']->last_name?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Email Address</label>
                                                            <input type="email" value="<?=$_SESSION['user']->email?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Telephone</label>
                                                            <input type="text" value="<?=$_SESSION['user']->phone?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit" name="account_info">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                    </div>
                                    <div id="my-account-2" class="panel-collapse collapse <?php if($_POST['change_password']) echo'show';?>">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Change Password</h4>
                                                    <h5>Your Password</h5>
                                                </div>
                                         <div class="row">
                                         <form action="" method="post">
                                            <?=$submit ?? ""?>
                                            <?=$error ?? ""?>
                                                <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Current Password</label>
                                                            <input type="password" name ="current">
                                                            <?=$validation->alertMessage("Current Password");?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>New Password</label>
                                                            <input type="password" name ="new">
                                                            <?=$validation->alertMessage("New Password");?>

                                                        </div>
                                                </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>New Password Confirm</label>
                                                            <input type="password" name ="confirm">
                                                            <?=$validation->alertMessage("New Password Confirm");?>

                                                        </div>
                                                    </div>
                                                 
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                   
                                                    <div class="billing-btn">
                                                        <button type="submit" name="change_passowrd" value="true">Continue</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries   </a></h5>
                                    </div>
                                    <div id="my-account-3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Address Book Entries</h4>
                                                </div>
                                                <div class="entries-wrapper">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                            <div class="entries-info text-center">
                                                                <p>Farhana hayder (shuvo) </p>
                                                                <p>hastech </p>
                                                                <p> Road#1 , Block#c </p>
                                                                <p> Rampura. </p>
                                                                <p>Dhaka </p>
                                                                <p>Bangladesh </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                            <div class="entries-edit-delete text-center">
                                                                <a class="edit" href="#">Edit</a>
                                                                <a href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>4</span> <a href="wishlist.html">Modify your wish list   </a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- my account end -->
<?php

 include_once 'layout/footer.php';
include_once 'layout/scrips.php';
?>
