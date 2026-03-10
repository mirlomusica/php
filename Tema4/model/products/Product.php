<?php

abstract class Product
{

    protected int $id;
    protected string $name;
    protected string $author;
    protected float $price;

    public function __construct(int $id, string $name, string $author, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->price = $id;
    }

}
