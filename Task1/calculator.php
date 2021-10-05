<?php
error_reporting(0);
if ($_POST['sum']) {
    $firstNumber = $_POST['first_number'];
    $secondNumber = $_POST['second_number'];
    $result1 = $firstNumber + $secondNumber;
    $output = "<div class='alert alert-success'> Result of Sum $firstNumber and $secondNumber is : $result1 </div>";
}
if ($_POST['sub']) {
    $firstNumber = $_POST['first_number'];
    $secondNumber = $_POST['second_number'];
    $result2 = $firstNumber - $secondNumber;
    $output2 = "<div class='alert alert-success'> Result of Substract $firstNumber and $secondNumber is : $result2 </div>";
}
if ($_POST['multiply']) {
    $firstNumber = $_POST['first_number'];
    $secondNumber = $_POST['second_number'];
    $result3 = $firstNumber * $secondNumber;
    $output3 = "<div class='alert alert-success'> Result of Multiply $firstNumber and $secondNumber is : $result3 </div>";
}
if ($_POST['divid']) {
    $firstNumber = $_POST['first_number'];
    $secondNumber = $_POST['second_number'];
    $result4 = $firstNumber / $secondNumber;
    $output4 = "<div class='alert alert-success'> Result of Dividing $firstNumber and $secondNumber is : $result4 </div>";
}
if ($_POST['modlus']) {
    $firstNumber = $_POST['first_number'];
    $secondNumber = $_POST['second_number'];
    $result5 = $firstNumber % $secondNumber;
    $output5 = "<div class='alert alert-success'> Result of Moduls $firstNumber and $secondNumber is : $result5 </div>";
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Calculator Task</title>
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
                    <h4>Simple Calculator </h4>
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
                        <input name="sum" type="submit" class="btn btn-dark rounded" value="+">
                        <input name="sub" type="submit" class="btn btn-dark rounded" value="-">
                        <input name="multiply" type="submit" class="btn btn-dark rounded" value="*">
                        <input name="divid" type="submit" class="btn btn-dark rounded" value="/">
                        <input name="modlus" type="submit" class="btn btn-dark rounded" value="%">

                    </div>
                </form>
                <div id="sum">
                    <?php if (isset($output)) {
                        echo $output;
                    } ?>
                </div>
                <div id="sub">
                    <?php if (isset($output2)) {
                        echo $output2;
                    } ?>
                </div>
                <div id="multiply">
                    <?php if (isset($output3)) {
                        echo $output3;
                    } ?>
                </div>
                <div id="divid">
                    <?php if (isset($output4)) {
                        echo $output4;
                    } ?>
                </div>
                <div id="moduls">
                    <?php if (isset($output5)) {
                        echo $output5;
                    } ?>
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