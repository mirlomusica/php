<?php

$nbaTopScorers = [ 
    ["player" => "LeBron James", "position" => "Forward", "champion" => 4, "points" => 38923],   
    ["player" => "Kareem Abdul-Jabbar", "position" => "Center", "champion" => 6, "points" => 38387],
    ["player" => "Karl Malone", "position" => "Forward", "points" => 36928],    
    ["player" => "Kobe Bryant", "position" => "Guard", "champion" => 5, "points" => 33643],
    ["player" => "Michael Jordan", "position" => "Guard", "champion" => 6, "points" => 32292],
    ["player" => "Dirk Nowitzki", "position" => "Forward", "champion" => 1, "points" => 31560],
    ["player" => "Wilt Chamberlain", "position" => "Center", "champion" => 2, "points" => 31419],    
    ["player" => "Shaquille O'Neal", "position" => "Center", "champion" => 4, "points" => 28596],
    ["player" => "Carmelo Anthony", "position" => "Forward", "points" => 28289]
];


print "<p>* Presentar los datos de los jugadores con más de 2 campeonatos (\"champion\") y mas de 30.000 puntos</p>";

$res = [];
foreach($nbaTopScorers as $patata){
    if(array_key_exists('champion', $patata) == true){
        if($patata["points"]>=30000 && $patata["champion"]>=2){
            $res[] = $patata;
        }    
    }
    
}
printArrayPlayers($res);

print "<p>* Presentar los datos de los jugadores con mas de 35000 sin campeonato</p>";

$res2 = [];

foreach ($nbaTopScorers as $player){
    if ($player["points"]>=35000 && $player["champion"] == 0){
        $res2[] = $player;
    }
}
printArrayPlayers($res2);

print "<p>* Presentar los datos de los jugadores en la posición center que han ganado mas de 3 campeonatos</p>";

$res3 = [];

foreach ($nbaTopScorers as $player){
    if ($player["position"] == "Center" && $player["champion"] >= 3){
        $res3[] = $player;
    }
}
printArrayPlayers($res3);


print "<p>* Presentar un String con todos los nombres de los jugadores que han ganado mas de 4 campeonatos, separando cada nombre con una coma</p>";

$string = "";
$resArray = [];


for($i=0; $i<count($nbaTopScorers); $i++){
//    print $i;
//    var_dump($nbaTopScorers[$i]);
//    print"<br>";
    if($nbaTopScorers[$i]["champion"]>4){
        $resArray[] = $nbaTopScorers[$i]["player"];
    }
}

for($i=0; $i<count($resArray);$i++){
    if($i==count($resArray)-1){
         $string = $string.$resArray[$i];   
    }else{
         $string = $string.$resArray[$i].", ";   
    }
}
print $string;

print "<p>* Retornar un array de String con el jugador (o jugadores) que mas campeonatos han conseguido  </p>";

$bestof = [];
$max = 0;

for($i =0; $i<count($nbaTopScorers); $i++){
    if(array_key_exists("champion", $nbaTopScorers[$i])==true){
        $champions = $nbaTopScorers[$i]["champion"];
        if($champions > $max){
            $max = $champions;
        }   
    }
}


foreach ($nbaTopScorers as $player){
    if ($player["champion"] == $max){
        $bestof[] = $player;
    }
}
printArrayPlayers($bestof);


function printArrayPlayers($playerArray){
    print "<br>";
    foreach ($playerArray as $pepito){
        print "<strong>Player:". $pepito['player']."</strong><br>";
        print "position:". $pepito['position']."<br>";
        print "rings:". $pepito['rings']."<br>";
        print "points:". $pepito['points']."<br>";
        print "<br>";
    }
}