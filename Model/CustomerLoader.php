<?php
require_once 'Customer.php';
require_once 'config.php';


class CustomerLoader
{

    public function getALLCustomers(): array
    {
        $customersArray = [];

        try {
            global $servername; global $dbname; global $username; global $password;

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT id, firstname, lastname, fixed_discount, variable_discount, group_id FROM Customer");
            $stmt->execute();

            // set the resulting array to associative
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $customer = new Customer(
                    intval($row['id']),
                    $row['firstname'],
                    $row['lastname'],
                    $row['fixed_discount']==null? 0 : intval($row['fixed_discount']),
                    $row['variable_discount']==null? 0 : intval($row['variable_discount']),
                    $row['group_id']);
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

            global $servername; global $dbname; global $username; global $password;

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT id, firstname, lastname, fixed_discount, variable_discount, group_id FROM Customer WHERE id = $id");
            $result = $stmt->fetch();
            $customer = new Customer(
                intval($result['id']),
                $result['firstname'],
                $result['lastname'],
                $result['fixed_discount']==null? 0 : intval($result['fixed_discount']),
                $result['variable_discount']==null? 0 : intval($result['variable_discount']),
                $result['group_id']);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $customer;
    }

}

