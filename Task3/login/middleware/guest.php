<?php
if(isset($_SESSION['user'])){
    header('location:home.php');die;
}