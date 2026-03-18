<?php

include_once(__DIR__."/Check.php");

class Person{
    protected string $id;
    protected string $name;
    protected string $address;
    protected string $fechaNacimiento;
    
    public function __construct(string $id, string $name, string $address, string $fechaNacimiento) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    //GETTERS
    public function getId(): string {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAddress(): string {
        return $this->address;
    }
    
    public function getFechaNacimiento(): string {
        return $this->fechaNacimiento;
    }

    //Setter
    public function setId(string $id): void {
        $this->id = $id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }

    public function setFechaNacimiento(string $fechaNacimiento): bool{

        if(!Check::isValidDate($fechaNacimiento)){
            return false;
        }
        $this->fechaNacimiento = $fechaNacimiento;
        return true;
    }



    
}
