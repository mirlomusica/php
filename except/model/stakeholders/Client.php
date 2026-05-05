
<?php
include_once __DIR__ . '/Person.php';
include_once(__DIR__."/../validations/Check.php");

class Client extends Person
{
    protected string $cognom;
    protected int $clientId;

    public function __construct(
        int $ident,
        string $name,
        string $email,
        string $provincia,
        string $poblacio,
        string $cognom,
        int $clientId
    ) {
        $this->checkParameters($ident,$name, $email, $provincia, $poblacio);
        $this->cognom = $cognom;
        $this->clientId = $clientId;
    }

    public function getCognom(): string
    {
        return $this->cognom;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function setCognom(string $cognom): void
    {
        $this->cognom = $cognom;
    }

    public function setClientId(string $clientId): bool
    {
        if(Check::isNull($clientId)){
            return false;
        }
        $this->clientId = $clientId;
        return true;
    }


    //Interface Stakeholder
    //
    public function getIdent(): int
    {
        return $this->clientId;
    }

    public function getPersonalInfo(){

        return "name=" . $this->name
                . ", email=" . $this->email
                . ", provincia=" . $this->provincia
                . ", poblacio=" . $this->poblacio
                . ", cognom=" . $this->cognom
                . ", clientId=" . $this->clientId;
    }


    public function __toString(): string
    {
        return "Client[name=" . $this->name
                . ", email=" . $this->email
                . ", provincia=" . $this->provincia
                . ", poblacio=" . $this->poblacio
                . ", cognom=" . $this->cognom
                . ", clientId=" . $this->clientId
                . "]";
    }

}
