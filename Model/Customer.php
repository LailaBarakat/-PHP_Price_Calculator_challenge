<?php
declare(strict_types=1);

class Customer {

    private int $id;
    private string $firstname;
    private string $lastname;
    private int $fixedDiscount;
    private int $variableDiscount;
    private int $groupId;

    public function __construct (int $id,string $firstname, string $lastname, int $fixedDiscount, int $variableDiscount, int $groupId){
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->fixedDiscount = $fixedDiscount;
        $this->variableDiscount = $variableDiscount;
        $this->groupId = $groupId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getFullName(): string{
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * @param int $fixedDiscount
     */
    public function getFixedDiscount(): int
    {
        return $this->fixedDiscount;
    }

    /**
     * @return int
     */
    public function getVariableDiscount(): int
    {
        return $this->variableDiscount;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }
}
