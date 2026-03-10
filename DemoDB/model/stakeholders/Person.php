<?php

class Person {
    protected int $id ;
    protected string $nom ;
    protected string $email ;
    
    public function __construct(int $id, string $name, string $email) {
        $this->id = $id;
        $this->nom = $name;
        $this->email = $email;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNom(string $name): void {
        $this->nom = $name;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }
}


