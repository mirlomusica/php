

<?php


include_once __DIR__ . '/Product.php';

class Software extends Product
{
    protected string $releaseDate;
    protected int $serialNumber;
    protected string $compatibleOS;
    protected string $version;

    public function __construct($id, $name, $author, $price, $releaseDate, $serialNumber, $compatibleOS, $version)
    {
        parent::__construct($id, $name, $author, $price);
        $this->releaseDate = $releaseDate;
        $this->serialNumber = $serialNumber;
        $this->compatibleOS = $compatibleOS;
        $this->version = $version;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
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

    public function setReleaseDate(string $releaseDate): bool
    {
        if (Check::isNull($releaseDate) || !Check::isValidDate($releaseDate)) {
            return false;
        }
        $this->releaseDate = $releaseDate;
        return true;
    }

    public function setSerialNumber(int $serialNumber): bool
    {
        if (Check::isNull($serialNumber)) {
            return false;
        }
        $this->serialNumber = $serialNumber;
        return true;
    }

    public function setCompatibleOs(string $compatibleOs): bool
    {
        if (Check::isNull($compatibleOs)) {
            return false;
        }
        $this->compatibleOS =  $compatibleOs;
        return true;
    }

    public function setVersion(string $version): bool
    {
        if (Check::isNull($version) || !Check::isValidVersion($version)) {
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
                ."releaseDate: ".$this->releaseDate.", "
                ."serialNumber: ".$this->serialNumber.", "
                ."compatibleOS: ".$this->compatibleOS.", "
                ."version: ".$this->version
                ."]";
    }
}
