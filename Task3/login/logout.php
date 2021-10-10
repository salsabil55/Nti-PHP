<?php 
$title='logout';
session_start();
include_once('middleware/auth.php');
unset($_SESSION['user']);
session_destroy();
header('location:login.php');die;
