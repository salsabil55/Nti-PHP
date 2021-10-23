<?php
$title = "Verify Email";
include_once "views/layouts/header.php";
include_once "app/request/registerRequest.php";
include_once "app/database/models/User.php";
include_once "app/mail/mail.php";

if(isset($_POST['verify-email'])){
    $errors = [];
    // use validation on register request
    $emailValidation = new registerRequest;
    $emailValidation->setEmail($_POST['email']);
    $emailValidationResult = $emailValidation->emailValidation();
    // check no errors
    if(empty($emailValidationResult)){
        // check if email is exist .. it must be user have email
        $emailExistsResult = $emailValidation->emailExists();
        if(!empty($emailExistsResult)){
            // create code to send it in email to can change password
            $code = rand(10000,99999);
            $userData = new User;
            $userData-> setCode($code);
            $userData->setEmail($_POST['email']);
            $updateCodeResult=$userData->updateCode();
            if($updateCodeResult){
                // send mail
                $checkEmailExistResult = $userData->checkIfEmailExist(); // return object of user inside it firstname
                $user = $checkEmailExistResult->fetch_object();  
                // send email
                    $subject = "Ecommerce-Verification-Code-forget-password";
                    $body = "<p>Hello {$user->first_name}</p><p> Your Verification Code is:<b>$code</b></p><p>Thank You.</p>";
                    $newMail = new mail($_POST['email'], $subject, $body);
                    $mailResult = $newMail->sendMail();
                    if ($mailResult) {
                        $_SESSION['email'] = $_POST['email'];
                        header("location:check-code.php?page=verify");
                        exit;
                    } else {
                        $mailError  = "<div class='alert alert-danger'> Try To Verify You Account Later </div>";
                    }
            }
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
                                        <input type="email" name="email" placeholder="Email">
                                        <?php 
                                            if(!empty($emailValidationResult)){
                                                foreach ($emailValidationResult as $key => $value) {
                                                    echo $value;
                                                }
                                            }
                                            if(!empty($errors)){
                                                foreach ($errors as $key => $value) {
                                                    echo $value;
                                                }
                                            }
                                            if(isset($emailExistsResult) AND empty($emailExistsResult)){
                                                echo "<div class='alert alert-danger'>Email Not Found </div>";
                                            }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit" name="verify-email"><span><?= $title ?></span></button>
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