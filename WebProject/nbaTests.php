<?php

include 'model/ArrayQuests.php';

$index = rand(0,19);
$numRes = 4;

$question = questAleat($index,$numRes,"nba");

printQuestion($question);
