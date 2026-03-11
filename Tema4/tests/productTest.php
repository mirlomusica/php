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
    print "Book getDetails:<br>";
    print $details."<br>";

    $book->setId(2);
    $book->setName("b1");
    $details=$book->__toString();
    print "Book getDetails after setters:<br>";
    print $details."<br>";
}

function test_create_course(){
    $course = new Course(1,"b1","a1",1.0,"t1",2000,true);
    $details=$course->__toString();
    print "Course getDetails:<br>";
    print $details."<br>";
}

function test_create_software(){
    $software = new Software(1,"b1","a1",1.0, 2000,1,"OS","1.0");
    $details=$software->__toString();
    print "software getDetails:<br>";
    print $details."<br>";
}
