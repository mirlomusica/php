<?php

include_once __DIR__."/../../exceptions/BuildException.php";

class Book {
    protected int $id_llibre;
    protected string $titol;
    protected string $autor;
    protected string $tema;
    protected int $any_publicacio;
    protected  float $preu;

    public function __construct(int $id_llibre, string $titol, string $autor, string $tema, int $any_publicacio, float $preu){

        $this->setId_llibre($id_llibre);
        $this->setTitol($titol);
        $this->setAutor($autor);
        $this->setTema($tema);
        $this->setAny_publicacio($any_publicacio);
        $this->setPreu($preu);
    }

    //Getters
    
    
    
    public function getId_llibre(): int {
        return $this->id_llibre;
    }

    public function getTitol(): string {
        return $this->titol;
    }

    public function getAutor(): string {
        return $this->autor;
    }

    public function getTema(): string {
        return $this->tema;
    }

    public function getAny_publicacio(): int {
        return $this->any_publicacio;
    }

    public function getPreu(): float {
        return $this->preu;
    }


    //Setters
    
    public function setId_llibre(int $id_llibre): void {
        $this->id_llibre = $id_llibre;
    }

    public function setTitol(string $titol): void {
        $this->titol = $titol;
    }

    public function setAutor(string $autor): void {
        $this->autor = $autor;
    }

    public function setTema(string $tema): void {
        $this->tema = $tema;
    }
    
    public function setAny_publicacio(int $any_publicacio): void {
        $this->any_publicacio = $any_publicacio;
    }

    public function setPreu(float $preu): void {
        $this->preu = $preu;
    }

    public function __toString(): string
    {
        return "id_llibre: ". $this->getId_llibre()."<br>"
            . "titol". $this->getTitol()."<br>"
        ."autor: ". $this->getAutor()."<br>"
            ."tema: ". $this->getTema()."<br>"
            ."any_publicacio: ".$this->getAny_publicacio()."<br>"
        ."preu: ".$this->getPreu()."<br>";
    }



}
