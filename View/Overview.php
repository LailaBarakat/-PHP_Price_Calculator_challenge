<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css?v=<?php echo time(); ?>">
    <title>Overview</title>
</head>
<body>
<h1>Welcome to everything</h1>
<div class="container">
    <div class="row justify-content-around" id="menu">
        <div class="col-4">
            <label for="customer"></label>
            <button name="customer" id="customer" class="btn btn-secondary dropdown-toggle">
                Select the customer
            </button>
        </div>

        <div class="col-4">
            <button name="product" id="product" class="btn btn-secondary dropdown-toggle">
                Select the product
            </button>
        </div>
    </div>

    <div class="row justify-content-center" id="calculate">
        <div class="col-4">
            <button type="submit" name="calculate" class="btn btn-primary">Check the price</button>
        </div>
    </div>
    <div class="row justify-content-center" id="price">
        <div class="col-4">
            <span>Show the price here!!</span>
        </div>
    </div>
</div>

</body>
</html>