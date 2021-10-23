<?php

include_once "app/database/models/Product.php";

$productObject = new Product;


if ($_GET) {
    if (isset($_GET['product'])) {
        if (is_numeric($_GET['product'])) {
            $productObject->setId($_GET['product']);
            $findResult = $productObject->getDetailsOfProduct();
            if ($findResult) {
                $product = $findResult->fetch_object();

                $productObject->setSubcategory_id($product->subcategory_id);
                $productResult = $productObject->getProductBySubcategory();
            } else {
                header('location:views/errors/404.php');
                die;
            }
        } else {
            header('location:views/errors/404.php');
            die;
        }
    } else {
        header('location:views/errors/404.php');
        die;
    }
} else {
    header('location:views/errors/404.php');
    die;
}

$title = $product->name_en;
include_once "views/layouts/header.php";
include_once "views/layouts/nav.php";

?>

<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img class="zoompro" src="assets/img/product/<?= $product->image ?>" data-zoom-image=" assets/img/product/<?= $product->image ?>" alt="products" />

                    <span>-29%</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4><?= $product->name_en; ?></h4>
                    <div class="rating-review">
                        <div class="pro-dec-rating">

                            <?php
                            for ($i = 1; $i <= $product->reviews_avg; $i++) { ?>
                                <i class="ion-android-star-outline theme-star"></i>
                            <?php }
                            for ($i = 1; $i <= 5 - $product->reviews_avg; $i++) { ?>
                                <i class="ion-android-star-outline"></i>
                            <?php } ?>

                        </div>
                        <div class="pro-dec-review">
                            <ul>
                                <li><?= $product->reviews_count ?> Reviews </li>
                            </ul>
                        </div>
                    </div>
                    <span><?= $product->price; ?> EGP</span>
                    <div class="in-stock">
                        <?php
                        if ($product->quantity > 0 and $product->quantity <= 5) {
                            $message = "in stock ($product->quantity)";
                            $color = "warning";
                        } elseif ($product->quantity == 0) {
                            $message = "out of stock";
                            $color = "danger";
                        } else {
                            $message = "in stock";
                            $color = "success";
                        }
                        ?>
                        <p>Available: <span class="text-<?= $color ?>"><?= $message ?></span></p>
                    </div>
                    <p><?= $product->description_en; ?></p>
                    <div class="pro-dec-feature">
                        <ul>
                            <h5>Product Spec:</h5>
                            <br>
                            <?php
                            $specsResult = $productObject->getSpecsOfProduct();
                            if ($specsResult) {
                                $specsProducts = $specsResult->fetch_all(MYSQLI_ASSOC);
                                foreach ($specsProducts as $specIndex => $spec) { ?>
                                    <li><?= $spec['name_en'] ?> : <span><?= $spec['spec_value'] ?></span></li>

                            <?php }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="quality-add-to-cart">
                        <div class="quality">
                            <h5>Qunatity In Store: <span><?= $product->quantity ?></span>
                            </h5>
                        </div>

                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Categories:</li>

                            <li><a href="categoryProduct.php?category=<?= $product->category_id ?>"><?= $product->category_name_en ?> </a> </li>
                            , <li><a href="shop.php?sub=<?= $product->subcategory_id ?>"> <span><?= $product->subcategory_name_en ?></span> </a> </li>,
                            <li> <a href="shop.php?brand=<?= $product->brand_id ?>"> <span><?= $product->brand_name_en ?></span> </a></li>


                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Deatils Area End -->
<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                <a data-toggle="tab" href="#des-details3">Review</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p><?= $product->description_en; ?></p>

                    </div>
                </div>

                <div id="des-details3" class="tab-pane">
                    <div class="rattings-wrapper">
                        <?php
                        $reviewsProductResult = $productObject->getReviewsOfProduct();
                        if ($reviewsProductResult) {
                            $reviews = $reviewsProductResult->fetch_all(MYSQLI_ASSOC);
                            foreach ($reviews as $indexReview => $review) { ?>
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <?php
                                            for ($i = 1; $i <= $review['value']; $i++) { ?>
                                                <i class="ion-star theme-color"></i>
                                            <?php }
                                            for ($i = 1; $i <= 5 - $review['value']; $i++) { ?>
                                                <i class="ion-android-star-outline"></i>
                                            <?php } ?>

                                            <span><?= $review['value'] ?></span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3><?= $review['full_name'] ?></h3>
                                            <span><?= $review['created_at'] ?></span>
                                        </div>
                                    </div>
                                    <p><?= $review['comments'] ?></p>
                                </div>
                        <?php }
                        }
                        ?>


                    </div>
                    <?php
                    if (isset($_SESSION['user'])) {

                    ?>
                        <div class="ratting-form-wrapper">
                            <h3>Add your Comments :</h3>
                            <div class="ratting-form">
                                <form action="#">
                                    <div class="star-box">
                                        <h2>Rating:</h2>
                                        <div class="ratting-star">
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <input placeholder="Name" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <input placeholder="Email" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="rating-form-style form-submit">
                                                <textarea name="message" placeholder="Message"></textarea>
                                                <input type="submit" value="add review">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Related Products</h3>
            </div>
        </div>

        <div class="grid-list-product-wrapper">
            <div class="product-grid product-view pb-20">
                <div class="row">
                    <!-- // show all product  -->
                    <?php
                    // fetch product according sub

                    if ($productResult) { // if return products
                        $products = $productResult->fetch_all(MYSQLI_ASSOC);
                        foreach ($products as $index => $product) { ?>

                            <div class="product-width related-product mb-30">
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
                                            <span class="price">Price: <?= $product['price'] ?></span>
                                        </div>
                                    </div>
                                    <div class="product-list-details">
                                        <h4>
                                            <a href="single-product.php?product=<?= $product['id'] ?>"><?= $product['name_en'] ?></a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span><?= $product['price'] ?></span>
                                        </div>
                                        <p><?= $product['desc_en'] ?></p>
                                        <div class="shop-list-cart-wishlist">
                                            <a href="#" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            <a href="#" title="Add To Cart"><i class="ion-ios-shuffle-strong"></i></a>
                                            <a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                <i class="ion-ios-search-strong"></i>
                                            </a>
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
<?php include_once "views/layouts/footer.php" ?>