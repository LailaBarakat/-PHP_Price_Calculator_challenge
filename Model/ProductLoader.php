<?php
require_once 'Product.php';
require_once 'config.php';

class ProductLoader
{

    public function getALLproducts(): array
    {
        $productsArray = [];

        try {
            global $servername; global $dbname; global $username; global $password;
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT * FROM product");
            $stmt->execute();

            // set the resulting array to associative
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $product = new product(intval($row['id']), $row['name'], $row['price']);
                array_push($productsArray, $product);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


        return $productsArray;

    }

    public function getproduct(int $id): product
    {

        try {
            global $servername; global $dbname; global $username; global $password;
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT * FROM product WHERE id = $id");
            $result = $stmt->fetch();
            $product = new product(intval($result['id']), $result['name'], $result['price']);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $product;
    }

}
