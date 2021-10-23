<?php
$title = "Check Code";
include_once "views/layouts/header.php";
include_once "app/request/checkCodeRequest.php";
include_once "app/database/models/User.php";


// print_r($_GET);die;
if ($_GET) {
    if (!isset($_GET['page'])) {
        header('location:views/errors/404.php');
        die;
    } else {
        if (!in_array($_GET['page'], ["login", "register", "verify", "profile"])) {
            header('location:views/errors/404.php');
            die;
        }
    }
} else {
    header('location:views/errors/404.php');
    die;
}

if (isset($_POST['check-code'])) { // when click on check code

    // check code validation before check if correct in db
    $checkCode = new checkCodeRequest;
    $checkCode->setCode($_POST['code']);
    $codeValidationResult = $checkCode->codeValidation();
    if (empty($codeValidationResult)) {
        // when code is correct check if correct in db
        $userData = new User;
        $userData->setEmail($_SESSION['email']);
        $userData->setCode($_POST['code']);
        $checkCodeResult = $userData->checkCode(); // check code in db
        if ($checkCodeResult) { // result >0 so it's return user
            $userData->setStatus(1); // update status
            $userData->setVerified_at(date("Y-m-d H:i:s")); //update date
            // update data in bd
            $verifyUserResult = $userData->verifyUser();
            if ($verifyUserResult) { // updated in db & finished checked code 
                // next page go to after verified 
                switch ($_GET['page']) {
                    case 'login':
                        $_SESSION['user'] = $checkCodeResult->fetch_object();
                        unset($_SESSION['email']);
                        header('location:index.php');
                        die;
                    case 'register':
                        unset($_SESSION['email']);
                        header('location:login.php');
                        die;
                    case 'profile':
                        $_SESSION['user'] = $checkCodeResult->fetch_object();
                        unset($_SESSION['email']);
                        header('location:profile.php');
                        die;
                    case 'verify':
                        header('location:new-password.php');
                        die;
                    default:
                        header('location:views/errors/404.php');
                        die;
                }
            } else {
                $errors['something'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
            }
        } else {
            $errors['wrong'] = "<div class='alert alert-danger'> Code Isn't Correct </div>";
        }
    }
}

?>

<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> <?= $title ?> </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="number" name="code" placeholder="Code">
                                        <?php
                                        if (!empty($codeValidationResult)) {
                                            foreach ($codeValidationResult as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        if (isset($errors['wrong'])) {
                                            echo $errors['wrong'];
                                        }
                                        if (isset($errors['something'])) {
                                            echo $errors['something'];
                                        }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit" name="check-code"><span><?= $title ?></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "views/layouts/footer.php" ?>