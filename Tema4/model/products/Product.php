<?php

include_once(__DIR__."/../validations/Check.php");
include_once(__DIR__."/../exceptions/BuildException.php");

abstract class Product
{
    protected int $id;
    protected string $name;
    protected string $author;
    protected float $price;

    public function checkParameters(int $id, string $name, string $author, float $price) : void
    {
        $msg = "";
        if (!$this->setId($id)){
            $msg .= "id incorrecta, ";
        }
        if (!$this->setName($name)){
            $msg .="nom incorrecte, ";
        }
        $this->author = $author;

        if (!$this->setAuthor($author)){
            $msg .="Autor incorrecte, ";
        }
        $this->price = $price;
        if (!$this->setPrice($price)){
            $msg .= "preu incorrecte, ";
        }
        if ($msg){
            throw new BuildException($msg);
        }
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

    public function setId(int $id): bool
    {
        $this->id = $id;
        return true;
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

        if (Check::isNull($price)||Check::isNegative($price)) {
            return false;
        }
        $this->price = $price;
        return true;
    }

}
