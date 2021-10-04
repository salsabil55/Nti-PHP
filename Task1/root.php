<?php
// $maxNum = 25;
// $minNum = 12;

if ($_POST) {
    $firstNumber = $_POST['first_number'];
    $secondNumber = $_POST['second_number'];

    $result1 = $firstNumber ** (1 / $secondNumber);
    $output = "<div class='alert alert-success'> Root of Number $firstNumber is : $result1 </div>";
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Root Task</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- moduls / power/ / -->
    <div class="container text-center">
        <div class="row mt-5 align-content-center">
            <div class="card bg-light text-dark col-12 p-lg-5 offset-12 shadow">
                <div class="card-body text-center text-dark p-20">
                    <h4>Calculate Specific Root of any number </h4>
                </div>

                <form action="" method="post">
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="first_number" id="" class="form-control" placeholder="first number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="second_number" id="" class="form-control" placeholder="second number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <button class="btn btn-dark rounded form-control"> Submit </button>
                    </div>
                </form>

                <?php if (isset($output)) {
                    echo $output;
                } ?>

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