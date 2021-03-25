<?php
require_once 'Customer.php';
//require_once '../View/config.php';

class CustomerLoader
{

    public function getALLCustomers(): array
    {
        $customersArray = [];

        try {

            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT id, firstname, lastname, fixedDiscount, variableDiscount, groupId FROM Customer");
            $stmt->execute();

            // set the resulting array to associative
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $customer = new Customer(intval($row['id']), $row['firstname'], $row['lastname'], $row['fixedDiscount'], $row['variableDiscount'], $row['groupId']);
                array_push($customersArray, $customer);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


        return $customersArray;

    }

    public function getCustomer(int $id): Customer
    {

        try {

            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT id, firstname, lastname, fixedDiscount, variableDiscount, groupId FROM Customer WHERE id = $id");
            $result = $stmt->fetch();
            $customer = new Customer(intval($result['id']), $result['firstname'], $result['lastname'], $result['fixedDiscount'], $result['variableDiscount'], $result['groupId']);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $customer;
    }

}

