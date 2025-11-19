<?php

 $nota = rand(0,10);
 print"<br>NOTA OBTENIDA: ".$nota."<br>";
 
 if($nota >= 5){
     print "<br>aprobado<br>";
 }
 else{
     print "<br>suspendido<br>";
 }
 
 print "<br> SOLUCIÓN DIRECTA:<br>";
 
 if($nota == 10){
          print "<br>Matrícula de honor!<br>";
 }
  if($nota == 9){
          print "<br>Excelente!<br>";
 }
   if($nota == 8){
          print "<br>Notable :)<br>";
 }
   if($nota == 7){
          print "<br>Notable :)<br>";
 }
   if($nota == 6){
          print "<br>Bien<br>";
 }
   if($nota == 5){
          print "<br>Suficiente<br>";
 }
    if($nota == 4){
          print "<br>Insuficiente :(<br>";
 }
    if($nota == 3){
          print "<br> Muy Defificiente :(<br>";
 }
    if($nota == 2){
          print "<br>Muy Deficiente T_T<br>";
 }
 if($nota == 1){
          print "<br>Muy Deficiente T_T<br>";
 }
 if($nota == 0){
          print "<br>Muy Deficiente T_T<br>";
 }
 
  print "<br> SOLUCIÓN ANIDADA:<br>";
 
  if($nota == 10){
          print "<br>Matrícula de honor!<br>";
  }
  else if($nota == 9){
        print "<br>Excelente!<br>";
  }
  else if($nota >= 7){
        print "<br>Notable!<br>";
  }
  else if($nota >= 6){
        print "<br>Bien!<br>";
  }
    else if($nota >= 5){
        print "<br>Suficiente pelado!<br>";
  }
    else if($nota >= 4){
        print "<br>Insufi!<br>";
  }
    else{
        print "<br>Muuuuy Deficiente<br>";
  }