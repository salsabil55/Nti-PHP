<?php
$title = "categoryProduct";
include_once "views/layouts/header.php";
include_once "views/layouts/nav.php";
include_once "app/database/models/Product.php";
include_once 'app/database/models/Category.php';
include_once 'app/database/models/Subcategory.php';

// product
$productObject = new Product;
$categoryObject = new Category;
$subCategoryObject = new Subcategory;

//fetch category 
$categoryResult = $categoryObject->read();
$productResult = $productObject->read();

// check get validation

if ($_GET) {

    if (isset($_GET['category'])) {
        if (is_numeric($_GET['category'])) {
            $categoryObject->setId($_GET['category']);
            $findSubResult = $categoryObject->findSubcategoryById();
            if ($findSubResult) {
                $subCategoryObject->setCategory_id($_GET['category']);
                // fetch product according sub
                $productResult = $subCategoryObject->getSubByCategory();
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


?>
<!-- Shop Page Area Start -->
<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper">
                    <div class="shop-topbar-left">
                        <ul class="view-mode">
                            <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                            <li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                        <p>Showing 1 - 20 of 30 results </p>
                    </div>
                    <div class="product-sorting-wrapper">
                        <div class="product-shorting shorting-style">
                            <label>View:</label>
                            <select>
                                <option value=""> 20</option>
                                <option value=""> 23</option>
                                <option value=""> 30</option>
                            </select>
                        </div>
                        <div class="product-show shorting-style">
                            <label>Sort by:</label>
                            <select>
                                <option value="">Default</option>
                                <option value=""> Name</option>
                                <option value=""> price</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">
                            <!-- // show all product  -->
                            <?php
                            if ($productResult) { // if return products
                                $subcategoryProducts = $productResult->fetch_all(MYSQLI_ASSOC);
                                foreach ($subcategoryProducts as $index => $subproduct) { ?>

                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="shop.php?sub=<?= $subproduct['id'] ?>">
                                                    <img alt="" src="assets/img/product/<?= $subproduct['image'] ?>">
                                                </a>
                                                <div class="product-action">
                                                    <a class="action-wishlist" href="#" title="Wishlist">
                                                        <i class="ion-android-favorite-outline"></i>
                                                    </a>

                                                    <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content text-left">
                                                <div class="product-hover-style">
                                                    <div class="product-title category">
                                                        <h4>
                                                            <a href="shop.php?sub=<?= $subproduct['id'] ?>"><?= $subproduct['name_en'] ?></a>
                                                        </h4>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="product-list-details">
                                                <h4>
                                                    <a href="shop.php?sub=<?= $subproduct[$id] ?>"><?= $subproduct['name_en'] ?></a>
                                                </h4>

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
                    <div class="pagination-total-pages">
                        <div class="pagination-style">
                            <ul>
                                <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">10</a></li>
                                <li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
                            </ul>
                        </div>
                        <div class="total-pages">
                            <p>Showing 1 - 20 of 30 results </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Shop By Categories</h4>
                        <div class="shop-catigory">
                            <ul id="faq">
                                <?php
                                if ($categoryResult) {
                                    $categories = $categoryResult->fetch_all(MYSQLI_ASSOC);
                                    foreach ($categories as $catIndex => $category) {
                                        // take category id
                                        $subCategoryObject->setCategory_id($category['id']);
                                        $subCategoryResult = $subCategoryObject->getSubByCategory();
                                ?>
                                        <li> <a data-toggle="collapse" data-parent="#faq" href="#<?= $category['id'] ?>"><?= $category['name_en'] ?> <i class="ion-ios-arrow-down"></i></a>
                                            <ul id="<?= $category['id'] ?>" class="panel-collapse collapse">
                                                <?php
                                                if ($subCategoryResult) {
                                                    $subcategories = $subCategoryResult->fetch_all(MYSQLI_ASSOC);

                                                    foreach ($subcategories as $subIndex => $subcategory) { ?>
                                                        <li><a href="shop.php?sub=<?= $subcategory['id'] ?>"><?= $subcategory['name_en'] ?></a></li>
                                                    <?php }
                                                } else { ?>
                                                    <li class="text-warning"> No Subs Yet </li>
                                                <?php }

                                                ?>

                                            </ul>
                                        </li>

                                <?php }
                                }
                                ?>


                                <li> <a href="#">Herbal Tea</a> </li>
                                <li> <a href="#">Rooibos Tea</a></li>
                                <li> <a href="#">Organic Tea</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-price-filter mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Price Filter</h4>
                        <div class="price_filter mt-25">
                            <span>Range: $100.00 - 1.300.00 </span>
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">By Brand</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <li><input type="checkbox"><a href="#">Green </a>
                                <li><input type="checkbox"><a href="#">Herbal </a></li>
                                <li><input type="checkbox"><a href="#">Loose </a></li>
                                <li><input type="checkbox"><a href="#">Mate </a></li>
                                <li><input type="checkbox"><a href="#">Organic </a></li>
                                <li><input type="checkbox"><a href="#">White </a></li>
                                <li><input type="checkbox"><a href="#">Yellow Tea </a></li>
                                <li><input type="checkbox"><a href="#">Puer Tea </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">By Color</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <li><input type="checkbox"><a href="#">Black </a></li>
                                <li><input type="checkbox"><a href="#">Blue </a></li>
                                <li><input type="checkbox"><a href="#">Green </a></li>
                                <li><input type="checkbox"><a href="#">Grey </a></li>
                                <li><input type="checkbox"><a href="#">Red</a></li>
                                <li><input type="checkbox"><a href="#">White </a></li>
                                <li><input type="checkbox"><a href="#">Yellow </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Compare Products</h4>
                        <div class="compare-product">
                            <p>You have no item to compare. </p>
                            <div class="compare-product-btn">
                                <span>Clear all </span>
                                <a href="#">Compare <i class="fa fa-check"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Popular Tags</h4>
                        <div class="shop-tags mt-25">
                            <ul>
                                <li><a href="#">Green</a></li>
                                <li><a href="#">Oolong</a></li>
                                <li><a href="#">Black</a></li>
                                <li><a href="#">Pu'erh</a></li>
                                <li><a href="#">Dark </a></li>
                                <li><a href="#">Special</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Page Area End -->
<?php include_once "views/layouts/footer.php" ?>