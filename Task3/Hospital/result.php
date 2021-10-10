<?php
$title = 'Result';
include_once('layouts/header.php');
include_once('middleware/auth.php');


?>

<div class="container-fluid">
    <div class="row">
        <div class="survey-content">
            <h3>Hospital Review</h3>
            <?php $review ?>

            <div class="survey-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Questions?</th>
                            <th scope="col" class="n">Review</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Are you satisfied with the level of cleanliness?</th>
                            <td>
                                <?php
                                if(isset($_SESSION['review']['ques1'])){
                                    echo $_SESSION['review']['ques1']; 
                                }
                                
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Are you satisfied with the service prices?</th>
                            <td>
                                <?php
                                 if(isset($_SESSION['review']['ques2'])){
                                    echo $_SESSION['review']['ques2']; 
                                } 
                                ?>

                            </td>

                        </tr>
                        <tr>
                            <th scope="row">Are you satisfied with the nursing service</th>
                            <td>
                                <?php
                                  if(isset($_SESSION['review']['ques3'])){
                                    echo $_SESSION['review']['ques3']; 
                                } 
                                 ?>

                            </td>

                        </tr>
                        <tr>
                            <th scope="row">Are you satisfied with the level of the doctor?</th>
                            <td>
                            <?php
                                  if(isset($_SESSION['review']['ques4'])){
                                    echo $_SESSION['review']['ques4']; 
                                } 
                                 ?>


                            </td>

                        </tr>
                        <tr>
                            <th scope="row">Are you satisfied with the calmness in the hospital?</th>
                            <td>
                            <?php
                                  if(isset($_SESSION['review']['ques5'])){
                                    echo $_SESSION['review']['ques5']; 
                                } 
                                 ?>

                            </td>

                        </tr>
                        <tr class="total">
                            <th scope="row">Total Review</th>
                            <td class="bold">
                                <?php 
                                if(isset($_SESSION['totalReview'])){
                                    foreach ($_SESSION['totalReview'] as $attr => $review){
                                        echo $review;
    
                                    }
                                }
                              
                                ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="review">
                    <?php 
                    if(isset($_SESSION['msg'])){
                        foreach ($_SESSION['msg'] as $key => $value){
                        echo $value;
                        }
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php') ?>