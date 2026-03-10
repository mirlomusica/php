<?php

include_once (__DIR__."/../model/stakeholders/Client.php");

testClient();

function testClient(){
    $client = new Client("n1", "m1", "p1","pob1", "c1",1);
    print $client->__toString();
}

