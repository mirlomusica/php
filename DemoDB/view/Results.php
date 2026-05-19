<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Resultats</h1>
        <?php
            $msg = filter_input(INPUT_COOKIE, "result");
            print $msg;
            $headerValues = explode(":",$msg);
            $header = $headerValues[0];
            $rows = explode(";",$headerValues[1]);

            print "<h2>$header</h2>";
            foreach($rows as $row){
                $fields = explode(",",$row);
                if(count($fields)!=6){
                    continue;
                }
                $id_llibre = $fields[0];
                $titol = $fields[1];
                $autor = $fields[2];
                $tema = $fields[3];
                $any = $fields[4];
                $preu = $fields[5];
                
                print "<h3>$titol</h3>";
                print "<p>id_llibre: $id_llibre</p>";
                print "<p>autor: $autor</p>";
                print "<p>tema: $tema</p>";
                print "<p>any de publicació: $any</p>";
                print "<p>preu: $preu</p>";
            }
        ?>
    
    </body>
</html>
