<?php

include_once __DIR__ . '/Person.php';
include_once(__DIR__."/../validations/Check.php");

class Employee extends Person
{
    protected int $empId;
    protected DateTime $hiringDate;


    public function __construct(
        int $ident,
        string $name,
        string $email,
        string $provincia,
        string $poblacio,
        string $hiringDate,
        int $empId
    ) {
        $errorMsg = "";
        try {
            $this->checkParameters($ident, $name, $email, $provincia, $poblacio);
        }catch(BuildException $ex){
            $errorMsg .= $ex->getMessage();
        }
        if($this->setHiringDate($hiringDate) ==false){
            $errorMsg .= "Hiring Date incorrecta,";
        } 
        if($this->setEmpId($empId) ==false){
            $errorMsg .= "EmpId incorrecta,";
        }
        if($errorMsg){
            throw new BuildException($errorMsg);
        }
    }

    public function getHiringDate(): string
    {
        return $this->hiringDate->format("d-m-Y");
    }


    public function setHiringDate(string $date): bool
    {
        if (Check::isValidDate($date)) {
            return false;
        }
        $this->hiringDate = new DateTime($date);
        return true;
    }

    public function setEmpId(int $id): bool
    {
        if (Check::isNull($id)) {
            return false;
        }
        $this->empId = $id;
        return true;
    }

    public function getAntiquity(): string
    {
        $currentDate = new DateTime();
        $diff = $this->hiringDate->diff($currentDate);
        return $diff->format("%d dies, %m mesos, %y anys (%a dies)");
    }

    public function getSalaryDates(string $periode, string $endDate): array
    {
        $res = [];

        $currentDate = new DateTime();
        $endDate = new DateTime($endDate);
        $period = new DateInterval($periode);
        $dates = new DatePeriod($currentDate, $period, $endDate);
        foreach ($dates as $date) {
            $res[] = $date->format("d-m-Y");
        }
        return $res;
    }
}
