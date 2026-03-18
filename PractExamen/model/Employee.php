<?php

include_once(__DIR__."/Person.php");
include_once(__DIR__."/Stakeholder.php");

class Employee extends Person implements Stakeholder{
    protected float $salary;
    
    public function __construct(string $id, string $name, string $address, string $fechaNacimiento, float $salary) {
        parent::__construct($id, $name, $address, $fechaNacimiento);
        $this->salary = $salary;
    }
    public function getSalary(): float {
        return $this->salary;
    }

    public function setSalary(float $salary): void {
        $this->salary = $salary;
    }
    
    public function getData(): string{
        return "Employee["
        . "salary: $this->salary"
        . "]";
    }
    
}
