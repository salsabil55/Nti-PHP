<?php
if(!isset($_SESSION['user'])){
    header('location:phone.php');die;
}