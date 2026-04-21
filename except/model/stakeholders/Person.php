
<?php


include_once(__DIR__."/../validations/Check.php");

class Person
{
    protected int $ident;
    protected string $name ;
    protected string $email ;
    protected string $provincia ;
    protected string $poblacio ;

    public function __construct(int $ident,string $name, string $email, string $provincia, string $poblacio)
    {
        $this->ident = $ident;
        $this->provincia = $provincia;
        $this->name = $name;
        $this->email = $email;
        $this->poblacio = $poblacio;
    }

    public function getIdent(): int
    {
        return $this->ident;
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

    public function setIdent(int $ident): bool
    {
        if(Check::isNull($ident)){
            return false;
        }
        $this->ident = $ident;
        return true;
    }

    public function setProvincia(string $provincia): bool
    {
        if(Check::isNull($provincia)){
            return false;
        }
        $this->provincia = $provincia;
        return true;
    }

    public function setName(string $name): bool
    {
        if(Check::isNull($name)){
            return false;
        }
        $this->name = $name;
        return true;
    }

    public function setEmail(string $email): bool
    {
        if(!Check::isValidEmail($email)){
            return false;
        }
        $this->email = $email;
        return true;
    }
    public function setPoblacio(string $poblacio): bool
    {
        if(Check::isNull($poblacio)){
            return false;
        }
        $this->poblacio = $poblacio;
        return true;
    }
}
