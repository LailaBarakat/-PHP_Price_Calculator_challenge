<?php
declare(strict_types=1);

/*include_once 'Model/Customer.php';
include_once 'Model/CustomerLoader.php';
include_once 'Model/Group.php';
include_once 'Model/GroupLoader.php';
include_once 'Model/Product.php';
include_once 'Model/ProductLoader.php';*/

class Controller
{

    public function render(array $GET, array $POST): void
    {

//        var_dump($GET);
//        echo("POST: ");
//        var_dump($POST);
        $customerLoader = new CustomerLoader(); //see about fitting all the upcoming logic into the loader class directly.
        $groupLoader = new GroupLoader();
        $productLoader = new ProductLoader();

        //show all the customer in dropdown
       $customers = $customerLoader->getALLCustomers();

        //show all the products in dropdown
        $products = $productLoader->getALLproducts();

        //Calculate
        $totalPrice = 0;
        if (isset($GET['customer']) && isset($GET['product'])){
            $customer = $customerLoader->getCustomer(intval($GET['customer']));
            $FixedDiscount = $customer->getFixedDiscount();
            $VariableDiscount = $customer->getVariableDiscount() / 100;

            $product = $productLoader->getproduct(intval($GET['product']));
            $price = $product->getPrice();

            if ($VariableDiscount==0) {
                $totalPrice = ($price - $FixedDiscount) / 100;
            }else{
                $totalPrice = (($price - $FixedDiscount) * $VariableDiscount) / 100;
            }
        }

        require 'View/Overview.php';


    }
}