<?php

include_once(__DIR__."/../model/validations/Check.php");


testIsNull();
testIsShort();
testIsZero();
testIsNegative();
testIsPositive();
testIsBetweenValues();
testIsValidDni();
testIsValidEmail();
testIsValidDate();
testErrorMessage();


function testIsNull()
{
    print "<h1>TEST isNull</h1>";
    print "resultado isNull con input null: ";
    print Check::isNull(null);
    print "<br>";

    print "resultado isNull con input not null: ";
    print Check::isNull(0);
    print "<br>";
}

function testIsShort()
{
    print "<h1>TEST isShort</h1>";
    print "resultado isShort con input corto: ";
    print Check::isShort("corto", 10);
    print "<br>";

    print "resultado isShort con input largo: ";
    print Check::isShort("asdfasdfasdfasdfasd", 10);
    print "<br>";
}

function testIsZero()
{
    print "<h1>TEST isZero</h1>";
    print "resultado isZero con input zero: ";
    print Check::isZero(0);
    print "<br>";

    print "resultado isZero con input no zero: ";
    print Check::isZero(1);
    print "<br>";
}

function testIsNegative()
{
    print "<h1>TEST isNegative</h1>";

    print "resultado isNegative con input negativo: ";
    print Check::isNegative(-1);
    print "<br>";

    print "resultado isNegative con input zero: ";
    print Check::isNegative(0);
    print "<br>";

    print "resultado isNegative con input positivo: ";
    print Check::isNegative(1);
    print "<br>";

}

function testIsPositive()
{
    print "<h1>TEST isPositive</h1>";

    print "resultado isPositive con input positivo: ";
    print Check::isPositive(1);
    print "<br>";

    print "resultado isPositive con input zero: ";
    print Check::isPositive(0);
    print "<br>";

    print "resultado isPositive con input negativo: ";
    print Check::isPositive(-1);
    print "<br>";



}

function testIsBetweenValues()
{
    print "<h1>TEST betweenValues</h1>";

    print "resultado betweenValues value 1 min 0 max 5: ";
    print Check::betweenValues(1,0,5);
    print "<br>";

    print "resultado betweenValues value -3 min 0 max 5: ";
    print Check::betweenValues(-3,0,5);
    print "<br>";

    print "resultado betweenValues value 6 min 0 max 5: ";
    print Check::betweenValues(6,0,5);
    print "<br>";

}

function testIsValidDni()
{
    print "<h1>TEST IsValidDni</h1>";

    print "resultado con dni 12345678A (correcto): ";
    print Check::IsValidDni("12345678A");
    print "<br>";


    print "resultado con dni R345678A (incorrecto: ";
    print Check::IsValidDni("R345678A");
    print "<br>";
}

function testIsValidEmail()
{
    print "<h1>TEST IsValidEmail</h1>";

    print "resultado con email jaume@nuria.com: ";
    print Check::IsValidEmail("jaume@nuria.com");
    print "<br>";


    print "resultado con email a: ";
    print Check::IsValidEmail("a");
    print "<br>";

    $email ="jaume.estalella@gmail.com";
    print "resultado con email $email: ";
    print Check::IsValidEmail($email);
    print "<br>";

    $email ="jaume-estalella@jaume-estalella.com";
    print "resultado con email $email: ";
    print Check::IsValidEmail($email);
    print "<br>";

    $email ="jaume-estalella@jaume.m";
    print "resultado con email $email: ";
    print Check::IsValidEmail($email);
    print "<br>";

    $email ="jaume-estalella@jaume-estalella.com.com";
    print "resultado con email $email: ";
    print Check::IsValidEmail($email);
    print "<br>";
}

function testIsValidDate(){

    print "<h1>TEST IsValidDate</h1>";

    $date = "12-12-2012";
    print "resultado con date $date: ";
    print (int)Check::isValidDate($date);
    print "<br>";

    $date = "treintayuno de junio";
    print "resultado con date $date: ";
    print (int)Check::isValidDate($date);
    print "<br>";

    $date = "45-12-2012";
    print "resultado con date $date: ";
    print (int)Check::isValidDate($date);
    print "<br>";

    $date = "30-02-2012";
    print "resultado con date $date: ";
    print (int)Check::isValidDate($date);
    print "<br>";

}

function testErrorMessage(){
    
    print "<h1>TEST testErrorMessage()</h1>";

    $error = 0;
    print "resultado con error $error: ";
    print Check::errorMessage($error);
    print "<br>";

    $error = -1;
    print "resultado con error $error: ";
    print Check::errorMessage($error);
    print "<br>";

    $error = -2;
    print "resultado con error $error: ";
    print Check::errorMessage($error);
    print "<br>";
    
    $error = -7;
    print "resultado con error $error: ";
    print Check::errorMessage($error);
    print "<br>";

    $error = -8;
    print "resultado con error $error: ";
    print Check::errorMessage($error);
    print "<br>";

    $error = -9;
    print "resultado con error $error: ";
    print Check::errorMessage($error);
    print "<br>";

}
