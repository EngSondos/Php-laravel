
<?php
if(empty($_SESSION['phone'])){
    header("location:Number.php");
    die;
}