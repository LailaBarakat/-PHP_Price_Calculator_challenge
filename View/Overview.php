<?php include_once 'header.php' ?>

<h1>Check the price here</h1>
<form method="get">
    <div class="">
        <div class="row justify-content-around" id="menu">
            <div class="col-2">
                <label for="customer"></label>
                <select name="customer" id="customer" class="btn btn-secondary dropdown-toggle">
                    <option value><i>Select the customers</i></option>
                    <?php foreach ($customers as $i => $customer): ?>
                        <option value="<?php echo $customer->getId(); ?>" <?php echo $i = 0 ? 'selected' : 0; ?>><?php echo $customer->getFullName(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-2">
                <label for="product"></label>
                <select name="product" id="product" class="btn btn-secondary dropdown-toggle">
                    <option value><i>Select the products</i></option>
                    <?php foreach ($products as $i => $product): ?>
                        <option value="<?php echo $product->getId(); ?>" <?php echo $i = 0 ? 'selected' : 0; ?>><?php echo $product->getName(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row justify-content-center" id="calculate">
            <div class="col-2">
                <button type="submit" name="calculate" class="btn btn-primary">Check the price</button>
            </div>
        </div>
        <div class="row justify-content-center" id="price">
            <div class="col-2">
                <span><?php echo $totalPrice; ?></span>
            </div>
        </div>
    </div>

</form>

<br>
<br>
<?php include_once 'footer.php' ?>
