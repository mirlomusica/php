<?php


include_once __DIR__ . '/Product.php';

class Book extends Product
{
    protected string $theme;
    protected int $publicationYear;

    public function __construct($id, $name, $author, $price,$theme,$publicationYear)
    {
        parent::__construct($id, $name, $author, $price);
        $this->theme = $theme;
        $this->publicationYear = $publicationYear;
    }


    public function getDetails(): string
    {
        return "Book[id: ".$this->id.", "
                ."name: ".$this->name.", "
                ."author: ".$this->author.", "
                ."price: ".$this->price.", "
                ."theme: ".$this->theme.", "
                ."publicationYear: ".$this->publicationYear
                ."]";
    }
}
