

<?php


include_once __DIR__ . '/Product.php';

class Software extends Product
{
    protected int $releaseYear;
    protected int $serialNumber;
    protected string $compatibleOS;
    protected string $version;

    public function __construct($id, $name, $author, $price, $releaseYear, $serialNumber, $compatibleOS, $version)
    {
        parent::__construct($id, $name, $author, $price);
        $this->releaseYear = $releaseYear;
        $this->serialNumber = $serialNumber;
        $this->compatibleOS = $compatibleOS;
        $this->version = $version;
    }

    public function getReleaseYear(): int
    {
        return $this->releaseYear;
    }

    public function getSerialNumber(): int
    {
        return $this->serialNumber;
    }

    public function getCompatibleOs(): string
    {
        return $this->compatibleOs;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    //SETTERS

    public function setReleaseYear(int $releaseYear): bool
    {
        if(Check::isNull($releaseYear)){
            return false;
        }
        $this->releaseYear = $releaseYear;
        return true;
    }

    public function setSerialNumber(int $serialNumber): bool
    {
        if(Check::isNull($serialNumber)){
            return false;
        }
        $this->serialNumber = $serialNumber;
        return true;
    }

    public function setCompatibleOs(string $compatibleOs): bool
    {
        if(Check::isNull($compatibleOs)){
            return false;
        }
        $this->compatibleOS =  $compatibleOs;
        return true;
    }

    public function setVersion(string $version): bool
    {
        if(Check::isNull($version)){
            return false;
        }
        $this->version = $version;
        return true;
    }


    public function __toString(): string
    {
        return "Software[id: ".$this->id.", "
                ."name: ".$this->name.", "
                ."author: ".$this->author.", "
                ."price: ".$this->price.", "
                ."releaseYear: ".$this->releaseYear.", "
                ."serialNumber: ".$this->serialNumber.", "
                ."compatibleOS: ".$this->compatibleOS.", "
                ."version: ".$this->version
                ."]";
    }
}
