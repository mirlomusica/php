
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Aprenentatge per Projectes</title>
        <meta charset="UTF-8">
        <meta name="title" content="Portal del Modul 3">
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>       
        <header  class="title">
            <h1> P H P. Aprenentatge per Projectes </h1>
            <section id="menu">
                <nav  class="darkstyle">
                    <div>
                        <a href="../Main.php" class="optmenu"> HOME</a>                       
                    </div>
                </nav>
            </section>
        </header>

        <aside id="leftside">
            <div class="darkstyle">
                <br><br><b>REGLES DEL REPTE:</b><br>
                Encerta les preguntes sobre la NBA
            </div>
        </aside>
        <aside id="rightside">
            <div class="darkstyle">
                <h4>Referencies utils:</h4>
                <br>
                <a href="https://www.php.net/manual/es/" class="optmenu"><i>PHP.NET</i></a>  
                <br><br>
                <a href="https://www.w3schools.com/php/default.asp" class="optmenu"><i>W3CSCHOOLS</i></a> 
            </div>
        </aside>

        <section id="central">
            <a name="principal"></a>
            <br><b>SPORTS CHALLENGE: ENCERTA LES PREGUNTES</b><br><br>
            El repte acaba quan assoleixes 5 encerts consecutius<br><br>
            <article>
                <?php
                // carrega del valor de les cookies per presentar-les a l'uuari
                $level = filter_input(INPUT_COOKIE, 'level');
                $user = filter_input(INPUT_COOKIE, 'user');
                $points = filter_input(INPUT_COOKIE, 'points');
                $activeGame = filter_input(INPUT_COOKIE, 'inMathChallenge');
                $challengeObjective = filter_input(INPUT_COOKIE, 'objective');
                $continuedSuccess = filter_input(INPUT_COOKIE, 'continuedSuccess');
                $success = filter_input(INPUT_COOKIE, 'success');


                $intentos = filter_input(INPUT_COOKIE, 'intentos');
                $pregunta = filter_input(INPUT_COOKIE, 'pregunta');

                print "<p>Te quedan: $intentos intentos</p>";
                print "<p><b>Pregunta: $pregunta</b></p>";

                
                ?>
                
                <div id="formulario">             
<?php
                $a = filter_input(INPUT_COOKIE, 'a)');
                $b = filter_input(INPUT_COOKIE, 'b)');
                $c = filter_input(INPUT_COOKIE, 'c)');
                    print '
                    <form action = "../../controllers/challenges/MathChallengeController.php" method="POST">
                        <input type="radio" id="a" name="resposta" />
                        <label for="a">'.$a.'</label>
                        <input type="radio" id="b" name="resposta" />
                        <label for="a">'.$b.'</label>
                        <input type="radio" id="c" name="resposta" />
                        <label for="a">'.$c.'</label>
                        <input type="submit" value="CHECK" id="check" name="enviar"/>
                    ';
                    ?>
                    </form>
                </div>
            </article>	
        </section>

        <footer>
            <div class="darkstyle">
                <a><b> Autor: Jose Meseguer</b> </a>  
            </div>		
        </footer>
    </body>
</html>
