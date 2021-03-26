<?php
declare(strict_types=1);

class Group {

    private int $id;
    private string $name;
    private int $fixedDiscount;
    private int $variableDiscount;
    Private int $parentID;

    public function __construct(int $id,string $name, int $parentID, int $fixedDiscount, int $variableDiscount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->fixedDiscount = $fixedDiscount;
        $this->variableDiscount = $variableDiscount;
        $this->parentID = $parentID;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
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
    public function getParentID(): int
    {
        return $this->parentID;
    }
}