
<?php

class Person
{
    protected string $name ;
    protected string $email ;
    protected string $provincia ;
    protected string $poblacio ;

    public function __construct(string $name, string $email, string $provincia, string $poblacio)
    {
        $this->provincia = $provincia;
        $this->name = $name;
        $this->email = $email;
        $this->poblacio = $poblacio;
    }

    public function getProvincia(): int
    {
        return $this->provincia;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPoblacio(): string
    {
        return $this->poblacio;
    }

    public function setProvincia(int $provincia): void
    {
        $this->provincia = $provincia;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setPoblacio(string $poblacio): void
    {
        $this->poblacio = $poblacio;
    }
}
