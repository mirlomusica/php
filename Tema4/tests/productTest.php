<?php

include_once (__DIR__."/../model/products/Book.php");
include_once (__DIR__."/../model/products/Course.php");
include_once (__DIR__."/../model/products/Software.php");

test_create_book();
test_create_course();
test_create_software();

function test_create_book(){
    $book = new Book(1,"b1","a1",1.0,"t1",2000);
    $details=$book->__toString();
    print "<h2>Book getDetails:<br></h2>";
    print $details."<br>";

    $book->setId(2);
    $book->setName("b1");
    $details=$book->__toString();
    print "<h2>Book getDetails after setters:<br></h2>";
    print $details."<br>";
}

function test_create_course(){
    $course = new Course(1,"b1","a1",1.0,"t1",2000,true);
    $details=$course->__toString();
    print "<h2>Course getDetails:<br></h2>";
    print $details."<br>";
}

function test_create_software(){
    $software = new Software(1,"b1","a1",1.0, "2000-01-01",1,"OS","V.000.000.000");
    $details=$software->__toString();
    print "<h2>software getDetails:<br></h2>";
    print $details."<br>";
    print "<h2>Version regex check</h2>";
    $version = "asdfasdf";
    $res = $software->setVersion($version);
    print "setting incorrect version '$version' : $res<br>";
    print "Version unchanged: ".$software->getVersion()."<br>";

    $version = "V.111.111.111";
    $res = $software->setVersion($version);
    print "setting correct version '$version' : $res<br>";
    print "Version changed: ".$software->getVersion()."<br>";

    print "<h2>Date regex check</h2>";

    $releaseDate = "2012-12-12";

    $res = $software->setReleaseDate($releaseDate);
    print "setting incorrect releaseDate '$releaseDate' : $res<br>";
    print "ReleaseDate unchanged: ".$software->getReleaseDate()."<br>";

    $releaseDate = "12-12-2012";
    $res = $software->setReleaseDate($releaseDate);
    print "setting correct releaseDate '$releaseDate' : $res<br>";
    print "ReleaseDate changed: ".$software->getReleaseDate()."<br>";

    $interval = "P2Y";
    print "adding interval using new function: ".$interval."<br>";
    print "Date with added interval: ".$software->getConfigReleaseDate($interval)."<br>";

    $times = 10;
    print "Date with added interval multiple times: ";
    $intervals = $software->getDatePeriods($interval, $times);
    foreach($intervals as $interval){
        print $interval ."<br>";
    }

    print "ReleaseDate unchanged: ".$software->getReleaseDate()."<br>";

}

