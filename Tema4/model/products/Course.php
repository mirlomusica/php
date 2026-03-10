
<?php


include_once __DIR__ . '/Product.php';

class Course extends Product
{
    protected string $theme;
    protected int $duration;
    protected bool $certification;

    public function __construct($id, $name, $author, $price,$theme,$duration,$certification)
    {
        parent::__construct($id, $name, $author, $price);
        $this->theme = $theme;
        $this->duration = $duration;
        $this->certification = $certification;
    }


    public function getDetails(): string
    {
        return "Course[id: ".$this->id.", "
                ."name: ".$this->name.", "
                ."author: ".$this->author.", "
                ."price: ".$this->price.", "
                ."theme: ".$this->theme.", "
                ."duration: ".$this->duration.", "
                ."certification: ".$this->certification
                ."]";
    }
}
