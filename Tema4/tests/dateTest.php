<?php

$d1 = new DateTime("01-01-2023");
$d2 = new DateTime("23-03-2024");

print $d1->format("d-m-Y");
print "<br>";

$dif = $d1->diff($d2);
print $dif->format("%a");

print "<br>";
$dif = $d2->diff($d1);
print $dif->format("%a");

print "<br>";
print $dif->format("%d dies, %m mesos, %y anys. %a dies en total");
