<?php
declare(strict_types=1);

/*require_once 'Model/Customer.php';
require_once 'Model/CustomerLoader.php';
require_once 'Model/Group.php';
require_once 'Model/GroupLoader.php';
require_once 'Model/Product.php';
require_once 'Model/ProductLoader.php';
require_once 'Controller/Controller.php';*/

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
<form method="get">
    <div class="container">
        <div class="row justify-content-around" id="menu">
            <div class="col-4">
                <label for="customer"></label>
                <select name="customer" id="customer" class="btn btn-secondary dropdown-toggle">
                    <option value><i>Select the customers</i></option>
                    <?php foreach ($datas as $i => $data): ?>
                        <option value="<?php echo $customer['name']; ?>" <?php echo $i = 0 ? 'selected' : 0; ?>><?php echo $customer['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-4">
                <select name="product" id="product" class="btn btn-secondary dropdown-toggle">
                    <option value><i>Select the products</i></option>
                    <?php foreach ($datas as $i => $data): ?>
                        <option value="<?php echo $product['name']; ?>" <?php echo $i = 0 ? 'selected' : 0; ?>><?php echo $product['name']; ?></option>
                    <?php endforeach; ?>
                </select>
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
</form>
</body>
</html>