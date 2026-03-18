<?php

include_once(__DIR__."/Person.php");
include_once(__DIR__."/Stakeholder.php");

class Client extends Person implements Stakeholder{
    protected string $email;
    
    public function __construct(string $id, string $name, string $adress, string $fechaNacimiento, string $email) {
        parent::__construct($id, $name, $adress, $fechaNacimiento);
        $this->email = $email;
    }

        public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }
    
    public function getData(): string{
        return "Client["
        . "email: $this->email"
        . "]";
    }
}
