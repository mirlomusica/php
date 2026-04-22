
<?php


include_once(__DIR__."/../validations/Check.php");
include_once(__DIR__."/../exceptions/BuildException.php");

abstract class Person
{
    protected int $ident;
    protected string $name ;
    protected string $email ;
    protected string $provincia ;
    protected string $poblacio ;


    protected function checkParameters(int $ident, string $name, string $email, string $provincia, string $poblacio): void
    {
        $err = "";
        if ($this->setIdent($ident) == false) {
            $err .= "ident no vàlid,";
        }
        if ($this->setProvincia($provincia) == false) {
            $err .= "Provincia no vàlida,";
        }
        if ($this->setName($name) == false) {
            $err .= "Nom no vàlid,";
        }
        if ($this->setEmail($email) == false) {
            $err .= "Email no vàlid,";
        }
        if ($this->setPoblacio($poblacio) == false) {
            $err .= "Població no vàlida,";
        }
        if ($err) {
            throw new BuildException($err);
        }

    }


    public function getIdent(): int
    {
        return $this->ident;
    }

    public function getProvincia(): string
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
        if (Check::isNull($ident)) {
            return false;
        }
        $this->ident = $ident;
        return true;
    }

    public function setProvincia(string $provincia): bool
    {
        if (Check::isNull($provincia)) {
            return false;
        }
        $this->provincia = $provincia;
        return true;
    }

    public function setName(string $name): bool
    {
        if (Check::isNull($name)) {
            return false;
        }
        $this->name = $name;
        return true;
    }

    public function setEmail(string $email): bool
    {
        if (!Check::isValidEmail($email)) {
            return false;
        }
        $this->email = $email;
        return true;
    }
    public function setPoblacio(string $poblacio): bool
    {
        if (Check::isNull($poblacio)) {
            return false;
        }
        $this->poblacio = $poblacio;
        return true;
    }
}
