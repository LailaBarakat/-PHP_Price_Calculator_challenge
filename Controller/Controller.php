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
            $customerFixedDiscount = $customer->getFixedDiscount();
            $customerVariableDiscount = $customer->getVariableDiscount() / 100;
            $customerGroupId = $customer->getGroupId();

            $product = $productLoader->getproduct(intval($GET['product']));
            $price = $product->getPrice();

            $group = $groupLoader->getGroup($customerGroupId);
            $groupFixedDiscount = $group->getFixedDiscount();
            $groupVariableDiscount = $group->getVariableDiscount();

            $ParentId = $group->getParentID();

            //loop till parentId is null
            while ($ParentId !=null){
                //get the group of the parentId
                $parentGroup = $groupLoader->getGroup($ParentId);
                //keep adding the fixed discounts
                $groupFixedDiscount += $parentGroup->getFixedDiscount();
                //get the highest variable discount and overwrite it in the $groupVariableDiscount
                if ($groupVariableDiscount < $parentGroup->getVariableDiscount()){
                    $groupVariableDiscount = $parentGroup->getVariableDiscount();
                }
                //set the parentId to the parent of the parent
                $ParentId = $parentGroup->getParentID();
            }

            //compare the total fixed VS highest variable discount of the groups
            if (($groupVariableDiscount * $price) > ($price - $groupFixedDiscount)){
                //$groupPrice = $price - $groupFixedDiscount;
                if ($customerVariableDiscount == 0)
                    $customerVariableDiscount = 1;

                $totalPrice = (($price - ($groupFixedDiscount+$customerFixedDiscount)) * $customerVariableDiscount) / 100;

            }else {
                //$groupPrice = $groupVariableDiscount * $price;
                if ($groupVariableDiscount > $customerVariableDiscount){
                    if ($groupVariableDiscount == 0)
                        $groupVariableDiscount = 1;

                    $totalPrice = (($price - $customerFixedDiscount) * $groupVariableDiscount) / 100;
                }else {
                    if($customerVariableDiscount == 0)
                        $customerVariableDiscount = 1;

                    $totalPrice = (($price - $customerFixedDiscount) * $customerVariableDiscount) / 100;
                }
            }

        }

        require 'View/Overview.php';


    }
}