<?php


include_once __DIR__ . '/Product.php';

class Book extends Product
{
    protected string $theme;
    protected int $publicationYear;

    public function __construct($id, $name, $author, $price, $theme, $publicationYear)
    {
        parent::__construct($id, $name, $author, $price);
        $this->theme = $theme;
        $this->publicationYear = $publicationYear;
    }


    public function getTheme(): string
    {
        return $this->theme;
    }

    public function getPublicationYear(): int
    {
        return $this->publicationYear;
    }

    //SETTERS


    public function setTheme(string $theme): bool
    {
        if(Check::isNull($theme)){
            return false;
        }
        $this->theme = $theme;
        return true;
    }

    public function setPublicationYear(int $publicationYear): bool
    {
        if(Check::isNull($publicationYear)){
            return false;
        }
        $this->publicationYear = $publicationYear;
        return true;
    }


    public function __toString(): string
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
