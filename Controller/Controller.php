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
        //TODO: implement system to handle what the user wishes to do within the system.
        //  meaning: the controller should be able to go to a different view depending on whether
        //  the user wants an overview, or a view of a specific class/student/teacher
        //  it might be interesting to cram this additional information in the $get,
        //  and then use that to vary between pages
        //  for now, we stick with the overview.

//        var_dump($GET);
//        echo("POST: ");
//        var_dump($POST);
        $customerLoader = new CustomerLoader(); //see about fitting all the upcoming logic into the loader class directly.
        $groupLoader = new GroupLoader();
        $productLoader = new ProductLoader();

        //var_dump($loader->fetchSingle(1));
        //TODO: Implement delete() method.


        //show all the customer in dropdown
        if (!isset($GET['customer']))
        {
            $data = $customerLoader->getALLCustomers();
            require 'View/Overview.php';
        }

        if (isset($GET['product'])) {
            $data = $productLoader->getALLproducts() ;
            require 'View/Overview.php';
        }
        var_dump($data);

    }
}