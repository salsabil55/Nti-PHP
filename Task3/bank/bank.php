<?php
if ($_POST) {
  $errors = [];
  // calcualte methods

  function interest($loanAmount, $loanYear)
  {
    if ($loanYear < 3) {
      $interestval = 0.1;
      $interest = $loanAmount * $interestval * $loanYear;
      return $interest;
    } else {
      $interestval = 0.15;
      $interest = $loanAmount * $interestval * $loanYear;
      return $interest;
    }
  }
  function loan($amount, $int)
  {
    $loan = $amount + $int;
    return $loan;
  }
  function monthly($year)
  {
    $month = $year * 12;
    return $month;
  }
  function loanMonthly($year, $loan, $month)
  {
    $month = $year * 12;
    $loanMonthly = $loan / $month;
    return $loanMonthly;
  }
  //validation
  if (empty($_POST['name'])) {
    $errors['name'] = "<div class='alert alert-danger'>* Name is required</div>";
  }
  if (empty($_POST['loan-amount'])) {
    $errors['loan-amount'] = "<div class='alert alert-danger'>* Loan Amount is required and cannot accept zero</div>";
  }
  if (empty($_POST['loan-year'])) {
    $errors['loan-year'] = "<div class='alert alert-danger'>* Loan Year is required and cannot accept zero</div>";
  }

  if (empty($errors)) {
    $loanAmount = $_POST['loan-amount'];
    $loanYear = $_POST['loan-year'];
    $interest = interest($loanAmount, $loanYear); // interest
    $loan = loan($loanAmount, $interest);
    $month = monthly($loanYear);
    $loanMonthly = loanMonthly($loanYear, $loan, $month);
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Bank</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div class="container">
    <div class="row bank">
      <div class="col-2">
        <img src="img/23.jpg">
      </div>
      <div class="col-1"></div>
      <div class="col-9">

        <div class="bank-bg">
          <div class="form">
            <h3>Bank</h3>
            <form method="post">
              <div class="form-group">
                <label>User Name:</label>
                <input class="form-control" name="name" value="<?php if (isset($_POST['name'])) {
                                                                  echo $_POST['name'];
                                                                } ?>">
              </div>
              <?php if (isset($errors['name'])) {
                echo $errors['name'];
              } ?>

              <div class="form-group">
                <label>Loan Amount:</label>
                <input class="form-control" name="loan-amount" value="<?php if (isset($_POST['loan-amount'])) {
                                                                        echo $_POST['loan-amount'];
                                                                      } ?>">
              </div>
              <?php if (isset($errors['loan-amount'])) {
                echo $errors['loan-amount'];
              } ?>

              <div class="form-group">
                <label>Loan Year:</label>
                <input class="form-control" name="loan-year" value="<?php if (isset($_POST['loan-year'])) {
                                                                      echo $_POST['loan-year'];
                                                                    } ?>">
              </div>
              <?php if (isset($errors['loan-year'])) {
                echo $errors['loan-year'];
              } ?>

              <div class="form-group">
                <button class="btn btn-dark rounded form-control">Calculate</button>
              </div>

            </form>


            <div class="result">

              <div class="row">
                <div class="col-md-3">
                  <?php if (isset($interest)) {
                    echo " <h6>Interest Rate</h6>";
                  }
                  ?>
                </div>
                <div class="col-md-5">
                  <?php if (isset($loan)) {
                    echo " <h6>Total payment after interest</h6>";
                  }
                  ?>
                </div>
                <div class="col-md-4">
                  <?php if (isset($loanMonthly)) {
                    echo " <h6>Monthly Payment</h6>";
                  }
                  ?>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-3">
                  <p>
                    <?php
                    if (isset($interest)) {
                      echo $interest;
                    }
                    ?>
                  </p>
                </div>
                <div class="col-5">
                  <p>
                    <?php
                    if (isset($loan)) {
                      echo $loan;
                    }
                    ?>
                  </p>
                </div>
                <div class="col-4">
                  <p>
                    <?php
                    if (isset($loanMonthly)) {
                      echo $loanMonthly;
                    }
                    ?>
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