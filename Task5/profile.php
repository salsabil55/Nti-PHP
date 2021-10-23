<?php
$title = "Profile";
include_once "views/layouts/header.php";
include_once "app/middlewares/auth.php";
include_once "app/request/loginRequest.php";
include_once "app/request/registerRequest.php";
include_once "app/database/models/User.php";
include_once "app/services/uploadImage.php";
include_once "app/mail/mail.php";

define('notverified',0);

$userData = new User;
$userData->setEmail($_SESSION['user']->email);

// update user in db , galal => ahmed
if (isset($_POST['update-profile'])) {
    $errors = [];
    $success = [];
    // validation
    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) and !empty($_POST['phone']) and !empty($_POST['gender'])) {
        // pass form data to user model
        $userData->setFirst_name($_POST['first_name']);
        $userData->setLast_name($_POST['last_name']);
        $userData->setPhone($_POST['phone']);
        $userData->setGender($_POST['gender']);
        // upload photo if exists
        if ($_FILES['image']['error'] == 0) {
            $directory = "assets/img/users/";
            $uploadImage = new uploadimage($_FILES['image'], $directory);
            $uploadImageSizeErrors = $uploadImage->validateOnSize();
            $uploadImageExtensionErrors = $uploadImage->validateOnExtension();
            if (empty($uploadImageSizeErrors) and empty($uploadImageExtensionErrors)) {
                $photoName = $uploadImage->uploadPhoto();
                $_SESSION['user']->image = $photoName;
                $userData->setImage($photoName);
            }
        }
        // update data if no errors in image
        if (empty($uploadImageSizeErrors) and empty($uploadImageExtensionErrors)) {
            // update database
            $updateResult = $userData->update();
            // if updated
            if ($updateResult) {
                // update session
                $_SESSION['user']->first_name = $_POST['first_name'];
                $_SESSION['user']->last_name = $_POST['last_name'];
                $_SESSION['user']->phone = $_POST['phone'];
                $_SESSION['user']->gender = $_POST['gender'];
                $success['update-profile']['message']['success'] = "<div class='alert alert-success'> Data Updated Successfully </div>";
            } else {
                // print error
                $errors['update-profile']['message']['something'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
            }
        }
    } else {
        $errors['update-profile']['message']['all-fields'] = "<div class='alert alert-danger'> All Fields Are Required </div>";
    }
}


// change password

if (isset($_POST['change-password'])) {
    $errors = [];
    $success = [];
    // validation
    // validation on old password is correct // required/reqex
    $oldPasswordObject = new loginRequest;
    $oldPasswordObject->setPassword($_POST['old_password']);
    $passwordValidationResult = $oldPasswordObject->passwordValidation();

    if (empty($passwordValidationResult)) {
        //validate on old password is correct exist 
        $userData->setPassword($_POST['old_password']); // shai password crypt
        if ($userData->getPassword() != $_SESSION['user']->password) { // comapre between passord to check if exist
            $errors = [];
            $errors['old-wrong'] = "<div class='alert alert-danger'>Wrong Password !</div>";
        }
        if (empty($errors['old-wrong'])) {
            // validation on new password
            $newConfirmPassword = new registerRequest;
            $newConfirmPassword->setPassword($_POST['new_password']);
            $newConfirmPassword->setConfirmPassword($_POST['confirm_password']);
            $newConfirmPasswordResult = $newConfirmPassword->passwordValidation();

            if (empty($newConfirmPasswordResult)) {
                // validation on new password not equal old
                if ($_POST['new_password'] == $_POST['old_password']) {
                    $errors['old-equal-new'] = "<div class='alert alert-danger'>You Have entered old password again !</div>";
                }
            }
        }
    }

    // check if all validation corrects
    if(empty($passwordValidationResult) AND empty($errors) AND empty($newConfirmPasswordResult)){
        // update password
        $userData->setPassword($_POST['new_password']);
        $result = $userData->updatePassword();
        if($result){
            $_SESSION['user']->password= $userData->getPassword(); // to save password with crypt
            $success['data'] = "<div class='alert alert-success'>Password Has Been Changed</div>";
        }
        else{
            $errors['something'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
        }

    }
}

// change email

if(isset($_POST['change-email'])){
    $errors = [];
    $success = [];
    $emailValidation = new registerRequest;
    $emailValidation->setEmail($_POST['email']);
    $emailValidationResult = $emailValidation->emailValidation();
    if(empty($emailValidationResult)){
        // check new email not equal exist email // repeat email again
        if($_POST['email'] == $_SESSION['user']->email){
            $errors['old-email'] = "<div class='alert alert-danger'>You Must Change Email </div>";
        }
        else{
            //check if new email not exist in db
            $emailExist = $userData->checkIfEmailExist();
            if($emailExist){
                $errors['unique-email'] = "<div class='alert alert-danger'>Email is already Exist </div>";
            }
            else{
                // email is correct and unique
                // update email ,, change status to be 0 until verifiy , change varifiy
                $code = rand(10000, 99999);
                $userData->setCode($code);
                $userData->setStatus(notverified);
                $userData->setVerified_at('Null');
                $userData->setId($_SESSION['user']->id);
                $updateEmail = $userData->updateEmail();

                if($updateEmail){
                    // if changed email in db
                    // sendemail
                    $subject = "Ecommerce-Verification-Code";
                    $body = "<p>Hello {$_POST['first_name']}</p><p> Your Verification Code is:<b>$code</b></p><p>Thank You.</p>";
                    $newMail = new mail($_POST['email'], $subject, $body);
                    $mailResult = $newMail->sendMail();
                    if ($mailResult) {
                        $_SESSION['email'] = $_POST['email'];
                        unset($_SESSION['user']);
                        header("location:check-code.php?page=profile");
                        exit;
                    } else {
                        $errors['email']  = "<div class='alert alert-danger'> Try To Verify You Account Later </div>";
                    }

                    
                    //check code

                }else{
                    $errors['something'] = "<div class=''>Something Went Wrong</div>";
                }


            }
        }
    }
}


// get user from database => galal
$userData->setEmail($_SESSION['user']->email);
$userDataResult = $userData->checkIfEmailExist(); // return data of user
$user = $userDataResult->fetch_object();

include_once "views/layouts/nav.php";
?>


<!-- my account start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse <?php if (isset($_POST['update-profile'])) {
                                                                                        echo "show";
                                                                                    } ?>">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper text-center">
                                            <h4>My Account Information</h4>
                                            <br>

                                        </div>
                                        <div class="col-lg-12 col-md-12 text-center">
                                            <?php
                                            if (isset($errors['update-profile']['message'])) {
                                                foreach ($errors['update-profile']['message'] as $key => $value) {
                                                    echo $value;
                                                }
                                            }
                                            if (isset($success['update-profile']['message'])) {
                                                foreach ($success['update-profile']['message'] as $key => $value) {
                                                    echo $value;
                                                }
                                            }
                                            ?>
                                        </div>
                                        <form method="post" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 offset-4 mb-5">
                                                    <img src="assets/img/users/<?= $user->image ?>" alt="<?= $user->first_name . ' ' . $user->last_name ?>" class="w-80">
                                                    <br>
                                                    <input type="file" name="image" class="form-control" id="" style="
    margin-bottom: 20px;
    margin-top: 20px;
">
                                                    <?php
                                                    if (isset($uploadImageSizeErrors)) {
                                                        foreach ($uploadImageSizeErrors as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }
                                                    if (isset($uploadImageExtensionErrors)) {
                                                        foreach ($uploadImageExtensionErrors as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" value=" <?php if (isset($user->first_name)) {
                                                                                                            echo $user->first_name;
                                                                                                        } ?>
                                                        ">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" value=" <?php if (isset($user->last_name)) {
                                                                                                        echo $user->last_name;
                                                                                                    } ?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Telephone</label>
                                                        <input type="tel" name="phone" value="<?= $user->phone; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Gender</label>
                                                        <select name="gender" class="form-control" id="">
                                                            <option value="m" <?= $user->gender == 'm' ? 'selected' : ''  ?>>Male</option>
                                                            <option value="f" <?= $user->gender == 'f' ? 'selected' : ''  ?>>Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="billing-back-btn">

                                                <div class="billing-btn">
                                                    <button type="submit" name="update-profile" style="    background-color: #8bc34a;
    border: medium none;
    color: #ffffff;">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse <?php if (isset($_POST['change-password'])) {
                                                                                        echo "show";
                                                                                    } ?>">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper text-center">
                                            <h4>Change Password</h4>
                                            <h5>Your Password</h5>
                                        </div>

                                        
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 text-center">
                                            <?php
                                         
                                            if (isset($success['data'])) {
                                                    echo $success['data'];
                                            }
                                            ?>
                                        </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Old Password</label>
                                                        <input type="password" name="old_password">
                                                    </div>
                                                    <?php

                                                    if (isset($passwordValidationResult)) {
                                                        foreach ($passwordValidationResult as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }

                                                    if (!empty($errors)) {
                                                        foreach ($errors as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>New Password</label>
                                                        <input type="password" name="new_password">
                                                    </div>
                                                    <?php
                                                    if (isset($newConfirmPasswordResult['password-required'])) {
                                                        echo $newConfirmPasswordResult['password-required'];
                                                    }
                                                    if (isset($newConfirmPasswordResult['password-pattern'])) {
                                                        echo $newConfirmPasswordResult['password-pattern'];
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password Confirm</label>
                                                        <input type="password" name="confirm_password">
                                                    </div>
                                                    <?php
                                                    if (isset($newConfirmPasswordResult['confirmPassword-required'])) {
                                                        echo $newConfirmPasswordResult['confirmPassword-required'];
                                                    }
                                                    if (isset($newConfirmPasswordResult['password-confirmed'])) {
                                                        echo $newConfirmPasswordResult['password-confirmed'];
                                                    }


                                                    ?>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">

                                                <div class="billing-btn">
                                                    <button type="submit" name="change-password" style="    background-color: #8bc34a;
    border: medium none;
    color: #ffffff;">Change Your Password</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Change Email Address </a></h5>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse <?php if(isset($_POST['change-email'])) {echo "show";} ?>">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Email</h4>
                                        </div>
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>New Email Address</label>
                                                        <input type="email" name="email" value="<?= $user->email; ?>">
                                                    </div>
                                                    <?php 
                                                            if(isset($emailValidationResult)){
                                                                foreach ($emailValidationResult as $key => $value) {
                                                                    echo $value;
                                                                }
                                                            }
                                                            if(isset($errors)){
                                                                foreach ($errors as $key => $value) {
                                                                    echo $value;
                                                                }
                                                            }
                                                        ?>
                                                </div>


                                            </div>
                                            <div class="billing-back-btn">

                                                <div class="billing-btn">
                                                    <button type="submit" name="change-email" style="    background-color: #8bc34a;
    border: medium none;
    color: #ffffff;">Change Email</button>
                                                </div>
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
</div>
<!-- my account end -->


<?php include_once "views/layouts/footer.php" ?>