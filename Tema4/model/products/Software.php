

<?php


include_once __DIR__ . '/Product.php';

class Software extends Product
{

    protected int $releaseYear;
    protected int $serialNumber;
    protected string $compatibleOS;
    protected string $version;

    public function __construct($id, $name, $author, $price,$releaseYear,$serialNumber,$compatibleOS,$version)
    {
        parent::__construct($id, $name, $author, $price);
        $this->releaseYear = $releaseYear;
        $this->serialNumber = $serialNumber;
        $this->compatibleOS = $compatibleOS;
        $this->version = $version;
    }


    public function getDetails(): string
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
