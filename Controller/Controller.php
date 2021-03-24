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
    private Connection $db;

    public function __construct () {
        $this->db = new Connection ;
    }

    public function render(array $GET, array $POST): void
    {

//        var_dump($GET);
//        echo("POST: ");
//        var_dump($POST);
        $customerLoader = new CustomerLoader(); //see about fitting all the upcoming logic into the loader class directly.
        $groupLoader = new GroupLoader();
        $productLoader = new ProductLoader();

        //show all the customer in dropdown
        if (isset($GET['customer']))
        {
            $data = $customerLoader->getALLCustomers();
            require '../View/Overview.php';
        }

        //show all the products in dropdown
        if (isset($GET['product'])) {
            $data = $productLoader->getALLproducts() ;
            require '../View/Overview.php';
        }


    }
}