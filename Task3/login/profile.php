<?php
$title = 'Profile';
include_once "layouts/header.php";

// validation
$errors = [];
if ($_POST) {
    if (empty($_POST['email'])) {
        $errors['email'] = "<div class='alert alert-danger'>Email is required</div>";
    }
    if (empty($_POST['name'])) {
        $errors['name'] = "<div class='alert alert-danger'>Name is required</div>";
    }
    if(empty($_POST['gender'])){
        $errors['gender'] = "<div class='alert alert-danger'>gender is required</div>";
    }
    if (empty($errors)) {

           // check if the request has photo
           if ($_FILES['image']['error'] == 0) {
            // validate on size
            $maxUploadedFile = 10 ** 6; //1mega
            if ($_FILES['image']['size'] > $maxUploadedFile) {
                $errors['image']['size'] = "<div class='alert alert-danger'> Max Size To Upload Is $maxUploadedFile Bytes </div>";
            }
            // validate on extension
            $allowedExtensions  = ['png', 'jpg'];
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION); // png , jpg
            if (!in_array($extension, $allowedExtensions)) {
                $errors['image']['extension'] = "<div class='alert alert-danger'> Allowed extensions png , jpg </div>";
            }

            // upload photo
            $path = 'images/users/';
            $photoName = time() . '-user-id-' . $_SESSION['user']['id'] . '.' . $extension; // 1231532-user-id-1.png
            $fullPath = $path . $photoName;
            // uploaded
            move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);
            $_SESSION['user']['image'] = $photoName;
        }

        if (empty($_POST['image'])) {
            //updated data
            $_SESSION['user']['email'] = $_POST['email'];
            $_SESSION['user']['name'] = $_POST['name'];
            $_SESSION['user']['gender'] = $_POST['gender'];
            $success = "<div class='alert alert-success'>Data Updated Successfully</div>";
        }
        
    }
}
include_once('layouts/nav.php') ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-6 offset-3 mt-5">
            <h1 class="h1 text-dark text-center"> updated data Profile </h1>
            <?php if (isset($success)) {
                echo $success;
            } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-4 offset-4 m-auto">
                        <img src="images/users/<?= $_SESSION['user']['image'] ?>" alt="" class="w-100 rounded-circle">
                        <input type="file" name="image" class="form-control" id="">

                    </div>
                    <div class="col-12">
                        <?php
                        if (isset($errors['image'])) {
                            foreach ($errors['image'] as $key => $value) {
                                echo $value;
                            }
                        }

                        if (isset($errors['image']['size'])) {
                            echo $errors['image']['size'];
                        }
                        if (isset($errors['image']['extension'])) {
                            echo $errors['image']['extension'];
                        }
                        ?>
                    </div>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail">Name</label>
                    <input type="text" name="name" value="<?= $_SESSION['user']['name'];?>" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                </div>
                <?php if (isset($errors['name'])) {
                    echo $errors['name'];
                } ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="<?= $_SESSION['user']['email'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <?php if (isset($errors['email'])) {
                    echo $errors['email'];
                } ?>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" value="<?= $_SESSION['user']['password'];?>" class="form-control" id="exampleInputPassword1">
                </div>
                <?php if (isset($errors['password'])) {
                    echo $errors['password'];
                } ?>
                <?php if (isset($errors['email-password'])) {
                    echo $errors['email-password'];
                } ?>

                <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender" class="form-control" id="">
                        <option <?php if ($_SESSION['user']['gender'] == 'm') {
                                    echo "selected";
                                } ?> value="m">Male</option>
                        <option <?php if ($_SESSION['user']['gender'] == 'f') {
                                    echo "selected";
                                } ?> value="f">Female</option>
                    </select>
                    <?php
                    if (isset($errors['gender'])) {
                        echo $errors['gender'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-success rounded form-control"> Change </button>
                </div>            </form>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php')?>
