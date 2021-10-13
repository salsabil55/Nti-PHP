<?php
$i = 0;
$errors = [];
$products = [];
$prices = [];
$quantity = [];
$subtotal = [];
$x = 0;

if (isset($_POST['info'])) {

    if (empty($_POST['name'])) {
        $errors['name'] = "<div class='alert alert-danger'>* Name is required</div>";
    }
    if (empty($_POST['number'])) {
        $errors['number'] = "<div class='alert alert-danger'>* Please Enter Correct Number </div>";
    } else {
        $count = $_POST['number'];
    }
    if (empty($_POST['city'])) {
        $errors['city'] = "<div class='alert alert-danger'> * Please Choose Your City </div>";
    }
    $city = $_POST['city'];
}

// handle reciept
if (isset($_POST['reciept'])) {

    $count = $_POST['number'];
    $city = $_POST['city'];
    for ($i = 0; $i < $count; $i++) {
        if (isset($_POST["prod-name-" . $i])) {
            $products[$i] = $_POST["prod-name-" . $i];
        }
        if (isset($_POST["price-" . $i])) {
            $price[$i] = $_POST["price-" . $i];
        }
        if (isset($_POST["quantity-" . $i])) {
            $quantity[$i] = $_POST["quantity-" . $i];
        }
        if (isset($_POST["price-" . $i]) && isset($_POST["quantity-" . $i]) && is_numeric($_POST["quantity-" . $i]) && is_numeric($_POST["quantity-" . $i])) {
            $subtotal[$i] = $price[$i] * $quantity[$i];
        } 
        else {
            $errormsg = "<div class='alert alert-danger'>* Please Fill All input Reciept Correctly</div>";
        }
    }
    if ($city == 'Cairo') {
        $delivery = 0;
    } elseif ($city == 'Giza') {
        $delivery = 30;
    } elseif ($city == 'Alex') {
        $delivery = 50;
    } elseif ($city == 'Other') {
        $delivery = 100;
    }
    else{
        $errors['city'] = "<div class='alert alert-danger'> * Please Choose Your City </div>";
    }

    function netValue($total, $delivery)
    {
        $netValue = $total + $delivery;
        return $netValue;
    }
    function discount($x)
    {

        if ($x > 0  &&  $x < 1000) {
            $discount = 0;
            $totalDisc = $x * $discount;
            return $totalDisc;
        } elseif ($x > 1000 && $x < 3000) {
            $discount = 0.1;
            $totalDisc = $x * $discount;
            return $totalDisc;
        } elseif ($x >= 3000  && $x < 4500) {
            $discount = 0.15;
            $totalDisc = $x * $discount;
            return $totalDisc;
        } elseif ($x >= 4500) {
            $discount = 0.2;
            $totalDisc = $x * $discount;
            return $totalDisc;
        } else {
            $discount = 0;
            $totalDisc = $x * $discount;

            return $totalDisc;
        }
    }

    function totalAfterDisc($x)
    {

        if ($x > 0  &&  $x < 1000) {
            $discount = 0;
            $totalDisc = $x * $discount;
            $totalAfterDisc = $x - $totalDisc;
            return $totalAfterDisc;
        } elseif ($x > 1000 && $x < 3000) {
            $discount = 0.1;
            $totalDisc = $x * $discount;
            $totalAfterDisc = $x - $totalDisc;
            return $totalAfterDisc;
        } elseif ($x >= 3000  && $x < 4500) {
            $discount = 0.15;
            $totalDisc = $x * $discount;
            $totalAfterDisc = $x - $totalDisc;
            return $totalAfterDisc;
        } elseif ($x >= 4500) {
            $discount = 0.2;
            $totalDisc = $x * $discount;
            $totalAfterDisc = $x - $totalDisc;
            return $totalAfterDisc;
        } else {
            $discount = 0;
            $totalDisc = $x * $discount;
            $totalAfterDisc = $x - $totalDisc;
            return $totalAfterDisc;
        }
    }



    // handle validation

    if (empty($errors)) {
        $discounts = discount(array_sum($subtotal));
        $totalAfterDisc = totalAfterDisc(array_sum($subtotal));
        $netValue = netValue($totalAfterDisc, $delivery);
    } 
    else {
        $errormsg = "<div class='alert alert-danger'>Please Check Your input values</div>";
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>SuperMarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="container-fluid">
        <div class="market-content">
            <div class="market-logo">
                <img src="img/logo.jpg">
            </div>
            <div class="market-form">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h1 text-dark text-center"> Make Your Order </h1>
                            </div>
                        </div>
                        <form method="post" class="info">
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" name="name" value="<?php if (isset($_POST['name'])) {
                                                                            echo $_POST['name'];
                                                                        } ?>" id="" class="form-control" placeholder="Enter Name" aria-describedby="helpId">
                            </div>
                            <?php if (isset($errors['name'])) {
                                echo $errors['name'];
                            } ?>

                            <div class="form-group">
                                <label for="">City</label>
                                <select name="city" class="form-control">
                                    <option value="">-- Select Your City</option>
                                    <option value="Cairo" <?php if (isset($city) && $city == "Cairo") echo "selected"; ?>>Cairo</option>
                                    <option value="Giza" <?php if (isset($city) && $city == "Giza") echo "selected"; ?>>Giza</option>
                                    <option value="Alex" <?php if (isset($city) && $city == "Alex") echo "selected"; ?>>Alex</option>
                                    <option value="Other" <?php if (isset($city) && $city == "Other") echo "selected"; ?>>Other</option>

                                </select>
                            </div>
                            <?php if (isset($errors['city'])) {
                                echo $errors['city'];
                            } ?>

                            <div class="form-group">
                                <label for="">Number Of Varieties</label>
                                <input type="number" name="number" value="<?php if (isset($_POST['number'])) {
                                                                                echo $_POST['number'];
                                                                            } ?>" id="" class="form-control" aria-describedby="helpId">
                            </div>
                            <?php if (isset($errors['number'])) {
                                echo $errors['number'];
                            } ?>

                            <div class="form-group">
                                <!-- <button class="btn btn-dark rounded form-control">Enter Product</button> -->
                                <input name="info" class="btn btn-dark rounded form-control" type="submit" value="Enter Product">
                            </div>
                    </div>

                    <!-- reciept-form -->
                    <div class="reciept-data">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($count)) {
                                        for ($i; $i < $count; $i++) {
                                            echo "<tr>
                                        <td ><input type='text' name='prod-name-$i' class='form-control' placeholder='Enter Product Name'></td>
                                        <td><input type='number' name='price-$i' class='form-control'></td>
                                        <td><input type='number' name='quantity-$i' class='form-control'></td>
                                    </tr>";
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <!-- <button class="btn btn-dark rounded form-control">Reciept</button> -->

                                <input name="reciept" type="submit" class="btn btn-dark rounded form-control" value="Reciept">
                            </div>
                            </form>

                            <!-- view product -->
                            <table class="table view-data">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantities</th>
                                        <th>Sub Total</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (isset($count)) {
                                        for ($i = 0; $i < $count; $i++) {
                                            if (isset($_POST["prod-name-" . $i]) && isset($_POST["price-" . $i]) && isset($_POST["quantity-" . $i])) {
                                                $products[$i] = $_POST["prod-name-" . $i];
                                                if(isset($products[$i]) && isset($quantity[$i]) && isset($subtotal[$i])){
                                                echo "<tr><td class='products'>$products[$i]</td><td class='products'>$products[$i]</td>
                                            <td class='products'>$quantity[$i]</td><td>$subtotal[$i]</td></tr>";
                                            }
                                        }
                                    }
                                }
                                    ?>

                                </tbody>
                            </table>

                            <br>
                            <div class="input-error">
                            <?php
                            if (isset($errormsg)) {
                                echo $errormsg;
                            }
                            ?>
                            </div>
                            

                            <!-- bill info -->

                            <div class="bill-info">
                                <h3>Details of Your Bill : </h3>
                                <div class="row">
                                    <div class="col-6 txt-left">
                                        <p>Client Name:</p>
                                        <p>City:</p>
                                        <p>Total:</p>
                                        <p>Discount:</p>
                                        <p>Total After Discount:</p>
                                        <p>Delievery:</p>
                                        <p>Net Total:</p>


                                    </div>
                                    <div class="col-6">
                                        <p><?php
                                            if (isset($_POST['name'])) {
                                                echo $_POST['name'];
                                            }
                                            ?></p>
                                        <p><?php
                                            if (isset($_POST['city'])) {
                                                echo $_POST['city'];
                                            }
                                            ?></p>
                                        <p><?php
                                            if (isset($subtotal)) {
                                                print_r(array_sum($subtotal));
                                                echo " EGP";
                                            }

                                            ?> </p>

                                        <p><?php
                                            if (isset($totalDiscount)) {
                                                echo $totalDiscount;
                                            }
                                            ?></p>
                                        <p>
                                            <?php
                                            if (isset($discounts)) {
                                                echo $discounts . " ";
                                            }
                                            ?>
                                            EGP
                                        </p>

                                        <p>
                                            <?php
                                            if (isset($totalAfterDisc)) {
                                                echo $totalAfterDisc . " ";
                                            }
                                            ?>
                                            EGP
                                        </p>

                                        <p>

                                            <?php
                                            if (isset($delivery)) {
                                                echo $delivery . " ";
                                            }
                                            ?>
                                            EGP
                                        </p>
                                        <p>

                                            <?php
                                            if (isset($netValue)) {
                                                echo $netValue . " ";
                                            }
                                            ?>
                                            EGP
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>