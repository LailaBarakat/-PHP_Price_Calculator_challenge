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

            global $servername; global $dbname; global $username; global $password;

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT id,name ,parent_id,fixed_discount, variable_discount FROM customer_group");
            $stmt->execute();

            // set the resulting array to associative
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $group = new Group(
                    intval($row['id']),
                    $row['name'],
                    $row['parent_id'] == null? 0 : intval($row['parent_id']),
                    $row['fixed_discount'] == null? 0 : intval($row['fixed_discount']),
                    $row['variable_discount'] == null? 0 : intval($row['variable_discount']));
                array_push($groupsArray, $group);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


        return $groupsArray;

    }

    public function getGroup (int $id): Group
    {

        try {

            global $servername; global $dbname; global $username; global $password;

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT id,name ,parent_id,fixed_discount, variable_discount FROM customer_group WHERE id = $id");
            $result = $stmt->fetch();
            $group = new Group(
                intval($result['id']),
                $result['name'],
                $result['parent_id'] == null? 0 : intval($result['parent_id']),
                $result['fixed_discount'] == null? 0 : intval($result['fixed_discount']),
                $result['variable_discount'] == null? 0 : intval($result['variable_discount']));

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $group;
    }

}
