<?php


namespace App\Entities;


use App\Contracts\IEntity;

class Currency implements IEntity
{

    /**
     * @var string
     */
    private string $name;

    /**
     * @var float
     */
    private float $rate;


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }



}
