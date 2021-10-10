<!doctype html>
<html lang="en">

<head>
    <title>SuperMarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="container-fluid">
        <div class="market-content">
            <div class="market-logo">
                <img src="img/logo.jpg">
            </div>
            <div class="market-form">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h1 text-dark text-center"> Make Your Order </h1>
                            </div>
                        </div>
                        <form method="post">
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" name="name" value="" id="" class="form-control" placeholder="Enter Name" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">City</label>
                                <select name="city" class="form-control" id="">
                                    <option> Cairo</option>
                                    <option> Giza</option>
                                    <option> Alex</option>
                                    <option> Other</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Number Of Varieties</label>
                                <input type="number" name="number" value="" id="" class="form-control" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark rounded form-control"> Enter Product </button>
                            </div>
                        </form>
                    </div>

                    <!-- reciept-form -->

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