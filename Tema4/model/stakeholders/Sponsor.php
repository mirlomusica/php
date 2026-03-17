<?php

include_once __DIR__ . '/Person.php';

class Sponsor extends Person implements Stakeholder
{
    protected float $aport;

    public function __construct(

        int $ident,
        string $name,
        string $email,
        string $provincia,
        string $poblacio,
        int $aport
    ) {
        parent::__construct($ident,$name, $email, $provincia, $poblacio);
        $this->aport = $aport;
    }


    public function getAport(): string
    {
        return $this->aport;
    }

    public function setAport(string $aport): void
    {
        $this->aport = $aport;
    }

    public function getData():string{
        return $this->ident . " for: " . $this->getAport();

    }

}
