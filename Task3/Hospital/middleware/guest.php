<?php
if(isset($_SESSION['user'])){
    header('location:question.php');die;
}