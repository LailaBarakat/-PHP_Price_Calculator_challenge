<?php
declare(strict_types=1);

include_once '../View/header.php'
?>

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

<?php require 'footer.php' ?>