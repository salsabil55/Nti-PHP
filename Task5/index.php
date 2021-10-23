<?php
$title = "Home";
include_once "views/layouts/header.php";
include_once "views/layouts/nav.php";
include_once "app/database/models/Product.php";
$productObject = new Product;
$latestProductResult = $productObject->getLatestProduct();
$mostOrderdProduct = $productObject->getMostOrderdProduct();
$mostRatedProduct = $productObject->getMostReviewdProduct();

?>

<!-- header end -->
<!-- Slider Start -->
<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        <div class="single-slider ptb-240 bg-img" style="background-image:url(assets/img/slider/slider-1.jpg);">
            <div class="container">
                <div class="slider-content slider-animated-1">

                </div>
            </div>
        </div>
        <div class="single-slider ptb-240 bg-img" style="background-image:url(assets/img/slider/slider-1-1.jpg);">
            <div class="container">
                <div class="slider-content slider-animated-1">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider End -->

<!-- New Products Start -->
<div class="product-area pt-90 pb-65 products">
    <div class="container">

        <div class="grid-list-product-wrapper">
            <div class="product-grid product-view pb-20">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Newest Products</h3>
                </div>
                <br>
                <div class="row">
                    <!-- // show all product  -->
                    <?php
                    if ($latestProductResult) { // if return products
                        $products = $latestProductResult->fetch_all(MYSQLI_ASSOC);
                        foreach ($products as $index => $product) { ?>

                            <div class="product-width newest">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="single-product.php?product=<?= $product['id'] ?>">
                                            <img alt="" src="assets/img/product/<?= $product['image'] ?>">
                                        </a>

                                    </div>
                                    <div class="product-content text-left">
                                        <div class="product-hover-style">
                                            <div class="product-title">
                                                <h4>
                                                    <a href="single-product.php?product=<?= $product['id'] ?>"><?= $product['name_en'] ?></a>
                                                </h4>
                                            </div>

                                        </div>
                                        <div class="product-price-wrapper">
                                            <span class="price">Price:<?= $product['price'] ?></span>
                                        </div>
                                    </div>
                                    <div class="product-list-details">
                                        <h4>
                                            <a href="single-product.php?product=<?= $product['id'] ?>"><?= $product['name_en'] ?></a>
                                        </h4>
                                        <div class="product-price-wrapper">

                                            <span class="price">Price: <?= $product['price'] ?></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    <?php  }
                    }

                    ?>



                </div>
            </div>

        </div>
        <!-- most orderd product -->

        <br>
        <br>
        <br>
        <div class="grid-list-product-wrapper most-order">

            <div class="product-grid product-view pb-20">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Most Orderd Product</h3>
                </div>
                <br>
                <div class="row">
                    <!-- // show all product  -->
                    <?php
                    if ($mostOrderdProduct) { // if return products
                        $orderProducts = $mostOrderdProduct->fetch_all(MYSQLI_ASSOC);
                        foreach ($orderProducts as $indexProduct => $orderProduct) { ?>

                            <div class="product-width newest">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="single-product.php?product=<?= $orderProduct['id'] ?>">
                                            <img alt="" src="assets/img/product/<?= $orderProduct['image'] ?>">
                                        </a>

                                    </div>
                                    <div class="product-content text-left">
                                        <div class="product-hover-style">
                                            <div class="product-title">
                                                <h4>
                                                    <a href="single-product.php?product=<?= $orderProduct['id'] ?>"><?= $orderProduct['name_en'] ?></a>
                                                </h4>
                                            </div>

                                        </div>
                                        <div class="product-price-wrapper">
                                            <span class="price">Price : <?= $orderProduct['price'] ?></span>
                                        </div>
                                    </div>
                                    <div class="product-list-details">
                                        <h4>
                                            <a href="single-product.php?product=<?= $orderProduct['id'] ?>"><?= $orderProduct['name_en'] ?></a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span class="price">Price : <?= $orderProduct['price'] ?></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    <?php  }
                    }

                    ?>



                </div>
            </div>

        </div>
        <!-- most rated prodcut -->
        <br>
        <br>
        <div class="grid-list-product-wrapper most-order">
            <div class="product-grid product-view pb-20">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Most Rated Product</h3>
                </div>
                <br>
                <div class="row">
                    <!-- // show all product  -->
                    <?php
                    if ($mostRatedProduct) { // if return products
                        $ratedProducts = $mostRatedProduct->fetch_all(MYSQLI_ASSOC);
                        foreach ($ratedProducts as $indexRatedProduct => $ratedProduct) { ?>

                            <div class="product-width newest">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="single-product.php?product=<?= $ratedProduct['id'] ?>">
                                            <img alt="" src="assets/img/product/<?= $ratedProduct['image'] ?>">
                                        </a>

                                    </div>
                                    <div class="product-content text-left">
                                        <div class="product-hover-style">
                                            <div class="product-title">
                                                <h4>
                                                    <a href="single-product.php?product=<?= $ratedProduct['id'] ?>"><?= $ratedProduct['name_en'] ?></a>
                                                </h4>
                                            </div>

                                        </div>
                                        <div class="product-price-wrapper">
                                            <span class="price">Price : <?= $ratedProduct['price'] ?></span>
                                        </div>
                                    </div>
                                    <div class="product-list-details">
                                        <h4>
                                            <a href="single-product.php?product=<?= $ratedProduct['id'] ?>"><?= $orderProduct['name_en'] ?></a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span class="price">Price : <?= $ratedProduct['price'] ?></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    <?php  }
                    }

                    ?>



                </div>
            </div>

        </div>


    </div>
</div>



<!-- container end -->
</div>
</div>


</div>
<!-- New Products End -->


<!-- News Area End -->
<!-- Newsletter Araea Start -->
<div class="newsletter-area bg-image-2 pt-90 pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-45">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Join to our Newsletter</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-6 col-md-10 col-md-auto">
                <div class="footer-newsletter">
                    <div id="mc_embed_signup" class="subscribe-form">
                        <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll" class="mc-form">
                                <input type="email" value="" name="EMAIL" class="email" placeholder="Your Email Address*" required>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                <div class="submit-button">
                                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "views/layouts/footer.php"; ?>