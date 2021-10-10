<?php
$title = 'phone';
include_once('layouts/header.php');
include_once('middleware/guest.php');

// $user = [];
if ($_POST) {
    if (empty($_POST['phone'])) {
        $errors = "<div class='alert alert-danger'> Please Enter Your Phone Number </div>";
    } else {
        if (isset($_POST)) {
            $msg = "<div class='alert alert-success'> Thanks! PLease Complete Survey </div>";
            $user['phone'] = $_POST['phone'];
            $loggedInUser = $user;
        }
    }
    if (isset($loggedInUser)) {
        // correct login
        // header to home page
        $_SESSION['user'] = $loggedInUser;
        header("location:question.php");
    }
}
?>


<div class="container-fluid">
    <div class="row">

        <div class="phone-content">

            <h3>Hospital</h3>
            <div class="phone">
                <form method="post">
                    <div class="form-group">
                        <label for="phone">* Please Enter Your Phone Number</label>
                        <input type="number" name="phone" class="form-control" id="phone" value="<?php if (isset($_POST['phone'])) {
                                                                                                        echo $_POST['phone'];
                                                                                                    } ?>">
                    </div>
                    <?php if (isset($errors)) {
                        echo $errors;
                    } ?>
                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
                    <div class="form-group">
                        <button class="btn btn-blue rounded form-control"> Enter</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
<?php include_once('layouts/footer.php') ?>