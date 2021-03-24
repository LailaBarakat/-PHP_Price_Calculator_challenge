<?php
declare(strict_types=1);

require_once "Group.php";
require_once "config.php";

class GroupLoader
{

    public function getALLGroups(): array
    {
        $groupsArray = [];

        try {

            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT * FROM customer_group");
            $stmt->execute();

            // set the resulting array to associative
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $group = new group(intval($row['id']), $row['name'], $row['parentId'], $row['fixedDiscount'], $row['variableDiscount']);
                array_push($groupsArray, $group);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


        return $groupsArray;

    }

    public function getGroups (int $id): Group
    {

        try {

            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT * FROM customer_group WHERE id = $id");
            $result = $stmt->fetch();
            $group = new group(intval($result['id']), $result['name'], $result['parentId'], $result['fixedDiscount'], $result['variableDiscount']);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $group;
    }

}
