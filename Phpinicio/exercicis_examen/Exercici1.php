<?php

print "<p> Generar 10 nombres enters entre 1 i 100. <br> 1. Mostrar per pantalla els valors generats <br> 2. Mostrar el màxim el mínim, la mitjana aritmètica i el nombre de valors superiors a la mitja</p>";


/*Creem el vector buit*/

$vector = [];

/* Generem 10 valors aleatoris i els introduïm al vector*/

for($i=0;$i<10;$i++){
    $numeroAleatori = rand(1,100);
    $vector[]=$numeroAleatori;
}

/* Creem dos variables per al màxim i el mínim, aixi com una que ens sumi tots els elements del vector*/

$max = 0; /*Inicialitzem el màxim amb un valor més petit que tots els valors possibles de l'array per evitar errors*/
$min =200; /*Inicialitzem el mínim amb un valor més gran que tots els valors possibles de l'array per evitar errors*/
$suma =0;

/* aquest loop for comprova tots els elements del array.
 * Per això la variable $i va desde 0 fins a count($vector) (la mida del vector
 * En  el nostre cas, count($vector) == 10*/

for($i=0;$i<count($vector);$i++){
    if($vector[$i]> $max){$max = $vector[$i];} /*Si l'element que estem comprovant és més gran que el màxim, el guardem a la variable $max*/
    if($vector[$i]< $min){$min = $vector[$i];} /* Si l'element que estem comprovant és més petit que el mínim, el guardem a la variable $min*/
    $suma += $vector[$i]; /* sumem l'element a la variable suma (també podriem escriure $suma = $suma + $vector[$i]. És equivalent*/
}

/*la mitjana és igual a la suma de tots els elements dividida pel número d'elements, és a dir, 10*/

$mitjana = $suma/10;

/*Ara que sabem la mitjana, podem tornar a evaluar tots els valors del array amb un loop for igual que l'altre
 * i contar els valors que son majors que $mitjana
 */
$contador=0;
for($i=0;$i<count($vector);$i++){
    if($vector[$i]>$mitjana){$contador++;}/*si l'element evaluat és major que la mitjana, augmenta el contador en 1*/
}

/*Ara que tenim tots els valors que ens interessen procedim a mostrar-los
 * Per a mostrar el vector, escrivim un altre loop for molt semblant, però abans mostrarem el primer terme per tal de poder 
 * donar-li un format adequat a la mostra dels valors
 */

print "Valors: [".$vector[0];

for($i=1; $i<count($vector);$i++){ /*iniciem el loop amb el valor 1, ja que el 0 ja l'hem mostrat*/
    print ", ".$vector[$i]; /* Afegim una coma abans del valor per a que quedin ben separats i llegibles*/
}
print "]<br>"; /*després  de mostrar tots els nostres valors, afegim el tancament de la clau i un salt de linia*/

/*A continuació, mostrem la resta de valors demanats a l'exercici amb els seus corresponents noms*/

print "Màxim: ".$max."<br>";
print "Mínim: ".$min."<br>";
print "Mitjana: ".$mitjana."<br>";
print "Hi ha ".$contador." valors superiors a la mitjana<br>";