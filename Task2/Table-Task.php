<?php
$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ]

    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ]
    ],
    (object)[
        'id' => 3,
        'name' => 'mena',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ]
    ],
    (object)[
        'id' => 3,
        'name' => 'mena',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ]
    ]

];
?>

<!-- id -->

<!-- <?php
        foreach ($users as $index => $objects) {
            echo "<td>$objects->id</td><br>";
            echo "<td>$objects->name</td><br>";
            foreach ($objects->gender as $genderInIndex => $gender) {
                echo "<td>$gender</td><br>";
            }
            foreach ($objects->hobbies as $key => $attr) {
                echo "<td>$attr</td><br>";
            }
            foreach ($objects->activities as $activitiesInIndex => $activities) {
                echo "<td>$activities</td><br>";
            }
        }
        ?> -->

<!doctype html>
<html lang="en">

<head>
    <title>Table Task</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5 align-content-center">
            <div class="card bg-light text-dark col-12 p-lg-5 offset-12 shadow">
                <div class="card-body text-center text-dark p-20">
                    <h4>Dynamic Table " Columns & Rows "</h4>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <?php 
                        foreach ($users[0] as $key => $val) {
                           echo "<th>$key</th>";}
                        ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $index => $objects) {?>
                            <tr>
                             <?php  
                              foreach ($objects as $key => $value) {?>
                                <td>
                                <?php
                                    if(gettype($value)!='array' AND gettype($value)!='object'){
                                        echo $value;
                                    }
                                    else{
                                        foreach ($value as $k => $v) {
                                            if($key == 'gender'){
                                                if($v == 'm'){
                                                    $v = 'male';
                                                }
                                                else{
                                                    $v='female';
                                                }
                                            }
                                            echo $v . ',';
                                        }
                                    }
                                ?>

                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>

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