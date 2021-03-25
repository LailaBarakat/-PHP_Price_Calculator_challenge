<?php
require_once 'Model/Customer.php';
require_once 'Model/CustomerLoader.php';
require_once 'Model/Group.php';
require_once 'Model/GroupLoader.php';
require_once 'Model/Product.php';
require_once 'Model/ProductLoader.php';
require_once 'Controller/Controller.php';


$controller = new Controller();
$controller->render($_GET,$_POST);