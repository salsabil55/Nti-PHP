<?php
$title = 'login';
include_once('layouts/header.php');
include_once('middleware/guest.php');

$users = [
    [
        'id' => 1,
        'name' => 'ahmed',
        "email" => 'ahmed@gmail.com',
        "password" => 123456,
        'image' => '1.jpg',
        'gender' => 'm'

    ],
    [
        'id' => 2,
        'name' => 'mohamed',
        "email" => 'mohamed@gmail.com',
        "password" => 123456,
        'image' => '2.jpg',
        'gender' => 'm'

    ],
    [
        'id' => 3,
        'name' => 'menna',
        "email" => 'menna@gmail.com',
        "password" => 123456,
        'image' => '3.jpg',
        'gender' => 'f'
    ]
];

if ($_POST) {
    $errors = [];
    if (empty($_POST['email'])) {
        $errors['email'] = "<div class='alert alert-danger'>Email is required</div>";
    }
    if (empty($_POST['password'])) {
        $errors['password'] = "<div class='alert alert-danger'>Password is required</div>";
    }
    if (empty($errors)) {
        foreach ($users as $index => $user) {
            if ($_POST['email'] == $user['email'] && $_POST['password'] == $user['password']) {
                $loggedUser = $user;
            }
        }

        if (isset($loggedUser)) {
            $_SESSION['user'] = $loggedUser;
            header("location:home.php");
        } else {
            $errors['email-password'] = "<div class='alert alert-danger'>Wrong Email or password</div>";
        }
    }
}
include_once('layouts/nav.php');

?>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-6 offset-3 mt-5">
                <h1 class="h1 text-dark text-center"> Login </h1>
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" <?php if (isset($_POST['email'])) {
                                                                echo $_POST['email'];
                                                            } ?> class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <?php if (isset($errors['email'])) {
                        echo $errors['email'];
                    } ?>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" value="<?php if (isset($_POST['password'])) {
                                                                            echo $_POST['password'];
                                                                        } ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <?php if (isset($errors['password'])) {
                        echo $errors['password'];
                    } ?>
                    <?php if (isset($errors['email-password'])) {
                        echo $errors['email-password'];
                    } ?>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('layouts/footer.php') ?>