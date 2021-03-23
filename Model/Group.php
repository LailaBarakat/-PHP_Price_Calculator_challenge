<?php
declare(strict_types=1);

class Group {

    private string $name;
    private int $fixedDiscount;
    private int $variableDiscount;

    public function __construct(string $name, int $fixedDiscount, int $variableDiscount)
    {
        $this->name = $name;
        $this->fixedDiscount = $fixedDiscount;
        $this->variableDiscount = $variableDiscount;
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
}