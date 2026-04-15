

<?php


include_once __DIR__ . '/Product.php';

class Software extends Product
{
    protected DateTime $releaseDate;
    protected int $serialNumber;
    protected string $compatibleOS;
    protected string $version;

    public function __construct($id, $name, $author, $price, $releaseDate, $serialNumber, $compatibleOS, $version)
    {
        parent::__construct($id, $name, $author, $price);
        $this->releaseDate = new DateTime($releaseDate);
        $this->serialNumber = $serialNumber;
        $this->compatibleOS = $compatibleOS;
        $this->version = $version;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate->format("d-m-Y");
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
        if (Check::isNull($releaseDate) || Check::isValidDate($releaseDate)!=0) {
            return false;
        }
        $this->releaseDate = new DateTime($releaseDate);
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
                ."releaseDate: ".$this->releaseDate->format("d-m-Y").", "
                ."serialNumber: ".$this->serialNumber.", "
                ."compatibleOS: ".$this->compatibleOS.", "
                ."version: ".$this->version
                ."]";
    }

    public function getConfigReleaseDate(string $intervalString): string{
        $interval = new DateInterval($intervalString);
        $newDate = clone $this->releaseDate;
        return $newDate->add($interval)->format("d-m-Y");
    }
    public function getDatePeriods(string $intervalString, int $times): array{

        $interval = new DateInterval($intervalString);
        $res =[$this->releaseDate->format("d-m-Y")];
        $current = clone $this->releaseDate;

        for($i = 0; $i<$times; $i++){
           $current = $current->add($interval); 
            $res[] = $current->format("d-m-Y");
        }
        return $res;
    }
}
