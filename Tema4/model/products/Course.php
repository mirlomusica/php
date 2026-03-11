
<?php


include_once __DIR__ . '/Product.php';

class Course extends Product
{
    protected string $theme;
    protected int $duration;
    protected bool $certification;

    public function __construct($id, $name, $author, $price, $theme, $duration, $certification)
    {
        parent::__construct($id, $name, $author, $price);
        $this->theme = $theme;
        $this->duration = $duration;
        $this->certification = $certification;
    }

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getCertification(): bool
    {
        return $this->certification;
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

    public function setDuration(int $duration): bool
    {
        if(Check::isNull($duration)){
            return false;
        }
        $this->duration = $duration;
        return true;
    }


    public function setCertification(bool $certification): bool
    {
        if(Check::isNull($certification)){
            return false;
        }
        $this->certification = $certification;
        return true;
    }

    public function __toString(): string
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
