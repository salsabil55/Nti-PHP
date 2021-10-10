<?php
$title = 'survey';
include_once('layouts/header.php');
include_once('middleware/auth.php');
$count = 0;
$ques1_count = 0;
$ques2_count = 0;
$ques3_count = 0;
$ques4_count = 0;
$ques5_count = 0;
$review = [];
$totalReview = [];
$msg = [];
$errors = [];
// $user = [];
if ($_POST) {
    // check validation
    if (empty($_POST['ques1'])) {
        $errors['ques1'] = "<div class='alert alert-danger'> * Please Answer First Questions </div>";
    } else {
        $review['ques1'] = $_POST['ques1'];
        $ques1 = $_POST["ques1"];
        $loggedInUser = $review;
    }
    if (empty($_POST['ques2'])) {
        $errors['ques2'] = "<div class='alert alert-danger'> * Please Answer Second Questions </div>";
    } else {
        $review['ques2'] = $_POST['ques2'];
        $ques2 = $_POST["ques2"];
        $loggedInUser = $review;
    }
    if (empty($_POST['ques3'])) {
        $errors['ques3'] = "<div class='alert alert-danger'> * Please Answer Third Questions </div>";
    } else {
        $review['ques3'] = $_POST['ques3'];
        $ques3 = $_POST["ques3"];
        $loggedInUser = $review;
    }
    if (empty($_POST['ques4'])) {
        $errors['ques4'] = "<div class='alert alert-danger'> * Please Answer Fouth Questions </div>";
    } else {
        $review['ques4'] = $_POST['ques4'];
        $ques4 = $_POST["ques4"];
        $loggedInUser = $review;
    }
    if (empty($_POST['ques5'])) {
        $errors['ques5'] = "<div class='alert alert-danger'> * Please Answer Fifth Questions </div>";
    } else {
        $review['ques5'] = $_POST['ques5'];
        $ques5 = $_POST["ques5"];
        $loggedInUser = $review;
    }


    // save review answer
    if (isset($_POST['ques1'])) {
        $review['ques1'] = $_POST['ques1'];
        if ($_POST['ques1'] == 'Bad') {
            $ques1_count = 0;
        } elseif ($_POST['ques1'] == 'Good') {
            $ques1_count = 3;
        } elseif ($_POST['ques1'] == 'Very Good') {
            $ques1_count = 5;
        } else {
            $ques1_count = 10;
        }
    }
    if (isset($_POST['ques2'])) {
        $review['ques2'] = $_POST['ques2'];
        if ($_POST['ques2'] == 'Bad') {
            $ques2_count = 0;
        } elseif ($_POST['ques2'] == 'Good') {
            $ques2_count = 3;
        } elseif ($_POST['ques2'] == 'Very Good') {
            $ques2_count = 5;
        } else {
            $ques2_count = 10;
        }
    }
    if (isset($_POST['ques3'])) {
        $review['ques3'] = $_POST['ques3'];
        if ($_POST['ques3'] == 'Bad') {
            $ques3_count = 0;
        } elseif ($_POST['ques3'] == 'Good') {
            $ques3_count = 3;
        } elseif ($_POST['ques3'] == 'Very Good') {
            $ques3_count = 5;
        } else {
            $ques3_count = 10;
        }
    }
    if (isset($_POST['ques4'])) {
        $review['ques4'] = $_POST['ques4'];
        if ($_POST['ques4'] == 'Bad') {
            $ques4_count = 0;
        } elseif ($_POST['ques4'] == 'Good') {
            $ques4_count = 3;
        } elseif ($_POST['ques4'] == 'Very Good') {
            $ques4_count = 5;
        } else {
            $ques4_count = 10;
        }
    }
    if (isset($_POST['ques5'])) {
        $review['ques5'] = $_POST['ques5'];
        if ($_POST['ques5'] == 'Bad') {
            $ques5_count = 0;
        } elseif ($_POST['ques5'] == 'Good') {
            $ques5_count = 3;
        } elseif ($_POST['ques5'] == 'Very Good') {
            $ques5_count = 5;
        } else {
            $ques5_count = 10;
        }
    }
    $count = $ques1_count + $ques2_count + $ques3_count + $ques4_count + $ques5_count;
    // return total review
    if ($count == 0  && $count < 14) {
        $msg['call'] = "<div class='alert alert-danger'>We will call you later on this phone :   " . $_SESSION['user']['phone'] . "</div>";
        $loggedInCount = $msg;
        $loggedInUser = $review;
        $totalReview['bad'] = 'Bad';
        $loggedInReview = $totalReview;
    } elseif ($count >= 14 && $count < 25) {
        $msg['call'] = "<div class='alert alert-danger'>We will call you later on this phone :   " . $_SESSION['user']['phone'] . "</div>";
        $loggedInCount = $msg;
        $loggedInUser = $review;
        $totalReview['good'] = 'Good';
        $loggedInReview = $totalReview;
    } elseif ($count >= 25 && $count < 50) {
        $msg['thanks'] = "<div class='alert alert-success'>Thanks For Your Time </div>";
        $loggedInCount = $msg;
        $loggedInUser = $review;
        $totalReview['very'] = 'Very Good';
        $loggedInReview = $totalReview;
    } elseif ($count >= 50) {
        $msg['thanks'] = "<div class='alert alert-success'>Thanks For Your Time </div>";
        $loggedInCount = $msg;
        $totalReview['exce'] = 'Excellent';
        $loggedInReview = $totalReview;
    } else {
        $msg['call'] = "<div class='alert alert-danger'>We will call you later on this phone :   " . $_SESSION['user']['phone'] . "</div>";
        $loggedInCount = $msg;
        $loggedInUser = $review;
        $totalReview['bad'] = 'Bad';
        $loggedInReview = $totalReview;
    }




    if (empty($errors)) {
        $loggedInUser = $review;
        $loggedInCount = $msg;
        $loggedInReview = $totalReview;
        if (isset($loggedInUser)) {
            // correct answer
            // header to result page
            $_SESSION['review'] = $loggedInUser;
            $_SESSION['msg'] = $loggedInCount;
            $_SESSION['totalReview'] = $loggedInReview;

            header("location:result.php");
            die;
        } else {
            $errors['total-error'] = "<div class='alert alert-danger'> Please Answer Questions </div>";
        }
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="survey-content">
            <h3>Hospital Survey</h3>
            <div class="survey-table">
                <form method="post" id="my_form">
                    <?php
                    if (isset($errors['ques1'])) {
                        echo $errors['ques1'];
                    }
                    if (isset($errors['ques2'])) {
                        echo $errors['ques2'];
                    }
                    if (isset($errors['ques3'])) {
                        echo $errors['ques3'];
                    }
                    if (isset($errors['ques4'])) {
                        echo $errors['ques4'];
                    }
                    if (isset($errors['ques5'])) {
                        echo $errors['ques5'];
                    }
                    if (isset($errors['total-error'])) {
                        echo $errors['total-error'];
                    }
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Questions?</th>
                                <th scope="col">Bad</th>
                                <th scope="col">Good</th>
                                <th scope="col">Very Good</th>
                                <th scope="col">Excellent</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th scope="row">Are you satisfied with the level of cleanliness?</th>
                                <td>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ques1" <?php if (isset($ques1) && $ques1 == "Bad") echo "checked"; ?> value="Bad" form="my_form">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ques1" <?php if (isset($ques1) && $ques1 == "Good") echo "checked"; ?> value="Good" form="my_form">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ques1" <?php if (isset($ques1) && $ques1 == "Very Good") echo "checked"; ?> value="Very Good" form="my_form">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ques1" <?php if (isset($ques1) && $ques1 == "Excellent") echo "checked"; ?> value="Excellent" form="my_form">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Are you satisfied with the service prices?</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php if (isset($ques2) && $ques2 == "Bad") echo "checked"; ?> name="ques2" value="Bad">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php if (isset($ques2) && $ques2 == "Good") echo "checked"; ?> name="ques2" value="Good">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php if (isset($ques2) && $ques2 == "Very Good") echo "checked"; ?> name="ques2" value="Very Good">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php if (isset($ques2) && $ques2 == "Excellent") echo "checked"; ?> name="ques2" value="Excellent">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Are you satisfied with the nursing service</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php if (isset($ques3) && $ques3 == "Bad") echo "checked"; ?> name="ques3" value="Bad">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php if (isset($ques3) && $ques3 == "Good") echo "checked"; ?> name="ques3" value="Good">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php if (isset($ques3) && $ques3 == "Very Good") echo "checked"; ?> name="ques3" value="Very Good">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php if (isset($ques3) && $ques3 == "Excellent") echo "checked"; ?> name="ques3" value="Excellent">
                                    </div>
                                </td>>
                            </tr>
                            <tr>
                                <th scope="row">Are you satisfied with the level of the doctor?</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php if (isset($ques4) && $ques4 == "Bad") echo "checked"; ?> name="ques4" value="Bad">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php if (isset($ques4) && $ques4 == "Good") echo "checked"; ?> name="ques4" value="Good">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ques4" <?php if (isset($ques4) && $ques4 == "Very Good") echo "checked"; ?> value="Very Good">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ques4" <?php if (isset($ques4) && $ques4 == "Excellent") echo "checked"; ?> value="Excellent">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Are you satisfied with the calmness in the hospital?</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ques5" <?php if (isset($ques5) && $ques5 == "Bad") echo "checked"; ?> value="Bad">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ques5" <?php if (isset($ques5) && $ques5 == "Good") echo "checked"; ?> value="Good">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ques5" <?php if (isset($ques5) && $ques5 == "Very Good") echo "checked"; ?> value="Very Good">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ques5" <?php if (isset($ques5) && $ques5 == "Excellent") echo "checked"; ?> value="Excellent">
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <button type="submit" class="result-btn" form="my_form">Result</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php') ?>