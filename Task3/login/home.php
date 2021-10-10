<?php
$title = 'Home';
include_once('layouts/header.php');
include_once('middleware/auth.php');
include_once('layouts/nav.php') ?>


<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-12">
            <div class="row mt-5">
                <div class="col-12">
                    <h1 class="h1 text-dark text-center"> Welcome <?= $_SESSION['user']['name'] ?> </h1>
                </div>
            </div>
        </div>
        <div class="col-4">

            <div class="card">
                <img class="card-img-top" src="images/products/chepsi.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">Chepsi</h4>
                    <p class="card-text">Text</p>
                </div>
            </div>
        </div>
        <div class="col-4">

            <div class="card">
                <img class="card-img-top" src="images/products/mac.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">MacBook PRo</h4>
                    <p class="card-text">Text</p>
                </div>
            </div>
        </div>
        <div class="col-4">

            <div class="card">
                <img class="card-img-top" src="images/products/iphone13.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">Iphone 13</h4>
                    <p class="card-text">Text</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>