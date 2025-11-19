<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $num = 7;
        print"<br>Valor inicial: ".$num."<br>";
        $num = 3;
        var_dump($num);
        print"<br>".$num."<br>";
        $numDec = 1.23;
        var_dump($numDec);
        print"<br>".$numDec."<br>";
        $boolean = true;
        var_dump($boolean);
        print"<br>".$boolean."<br>";
        $texto = "DAW";
        var_dump($texto);
        print"<br>".$texto."<br>";
        $result = $num . $numDec;
        print"<br>".$result."<br>";
        var_dump($result);
        $result = $num % $numDec;
        print"<br>".$result."<br>";
        var_dump($result);
                
        
                
        ?>
    </body>
</html>
