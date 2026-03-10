<?php
include_once __DIR__ . '/Person.php';

class Client extends Person {
    protected string $cognom;
    protected string $provincia;
    protected string $poblacio;
    
    public function __construct(int $id, string $name, string $email, 
                                string $cognom, string $provincia, string $poblacio) {
        parent::__construct($id, $name, $email);
        $this->cognom = $cognom;
        $this->provincia = $provincia;
        $this->poblacio = $poblacio;
    }

    public function getCognom(): string {
        return $this->cognom;
    }

    public function getProvincia(): string {
        return $this->provincia;
    }

    public function getPoblacio(): string {
        return $this->poblacio;
    }

    public function setCognom(string $cognom): void {
        $this->cognom = $cognom;
    }

    public function setProvincia(string $provincia): void {
        $this->provincia = $provincia;
    }

    public function setPoblacio(string $poblacio): void {
        $this->poblacio = $poblacio;
    }
    
    public function __toString(): string {
        return "Client[id=" . $this->id
                . ", cognom=" . $this->cognom
                . ", nom=" . $this->nom
                . ", provincia=" . $this->provincia
                . ", email=" . $this->email
                . ", poblacio=" . $this->poblacio
                . "]";
    }

}
