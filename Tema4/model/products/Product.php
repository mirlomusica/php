<?php

include_once(__DIR__."/../validations/Check.php");

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
        $this->price = $price;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function setName(string $name): bool
    {
        if (Check::isNull($name)) {
            return false;
        }

        $this->name = $name;
        return true;
    }

    public function setAuthor(string $author): bool
    {
        if (Check::isNull($author)) {
            return false;
        }

        $this->author = $author;
        return true;
    }

    public function setPrice(float $price): bool
    {

        if (Check::isNull($price)) {
            return false;
        }
        $this->price = $price;
        return true;
    }

}
