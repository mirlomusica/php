<?php

include_once __DIR__ . '/Person.php';
include_once __DIR__ . '/Stakeholder.php';

class Partner extends Person implements Stakeholder
{
    protected string $interest;

    public function __construct(
        int $ident,
        string $name,
        string $email,
        string $provincia,
        string $poblacio,
        string $interest
    ) {
        parent::__construct($ident, $name, $email, $provincia, $poblacio);
        $this->interest = $interest;
    }


    public function getInterest(): string
    {
        return $this->interest;
    }

    public function setInterest(string $interest): void
    {
        $this->interest = $interest;
    }
    public function getData():string{
        return $this->ident . " for: " . $this->getInterest();

    }
}
