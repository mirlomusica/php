
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Aprenentatge per Projectes</title>
        <meta charset="UTF-8">
        <meta name="title" content="Portal del Modul 3">
        <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <header  class="title">
            <h2> Aprenentatge per Projectes </h2>
            <section id="menu">
                <nav  class="darkstyle">
                    <div>
                        <a href="../main.php" class="optmenu"> HOME </a>
                        <a href="StringsView.html" class="optmenu"> STRINGS</a>
                        <a href="ArrayAssocView.html" class="optmenu"> ARRAYS_ASSOC </a>
                    </div>	
                </nav>
            </section>
        </header>

        <aside id="leftside">
            <div class="darkstyle">
                <nav>
                    <br><br><br><br><br><br>				
                </nav>
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
            <h4>CALCULS NUMERICS BASICS</h4>

            <article>
                <a name="calculbasic"></a>
                <b>MOSTRA LLIBRES PER ANY</b>

                <div id="formulario">             
                    <form action="../../controllers/activities/BooksByYearController.php" method="POST">
                        <label>Sel·lecciona un any: </label><br><br>
                        <input type="number" name="year" placeholder="introdueix un valor numeric"/><br><br>
                        <input type="submit" value="EXECUTAR" id="enviar"/><br>
                    </form>
                </div>
                <div>
                    <h4>RESULTAT:</h4>
                    <?php
                        $res = filter_input(INPUT_COOKIE, "resultBooksByYear");
                        print $res;
                ?>
                </div>
            </article>

            <article>
                <a name="calculbasic"></a>
                <b>MOSTRA AUTORS PER TEMA</b>

                <div id="formulario">             
                    <form action="../../controllers/activities/AuthorsByTopicController.php" method="POST">
                        <label>Sel·lecciona un tema: </label><br><br>
                        <input type="text" name="topic" placeholder="introdueix tema"/><br><br>
                        <input type="submit" value="EXECUTAR" id="enviar"/><br>
                    </form>
                </div>
                <div>
                    <h4>RESULTAT:</h4>
                    <?php
                        $res = filter_input(INPUT_COOKIE, "resultAuthorsByTopic");
                        print $res;
                ?>
                </div>
            </article>
            
            <article>
                <a name="calculbasic"></a>
                <b>MOSTRA LLIBRES PER AUTOR</b>

                <div id="formulario">             
                    <form action="../../controllers/activities/BooksByAuthorController.php" method="POST">
                        <label>Sel·lecciona un Autor: </label><br><br>
                        <input type="text" name="author" placeholder="introdueix autor"/><br><br>
                        <input type="submit" value="EXECUTAR" id="enviar"/><br>
                    </form>
                </div>
                <div>
                    <h4>RESULTAT:</h4>
                    <?php
                        $res = filter_input(INPUT_COOKIE, "resultBooksByAuthor");
                        print $res;
                ?>
                </div>
            </article>

            <article>
                <a name="calculbasic"></a>
                <b>MOSTRA LLIBRES PER TÍTOL (PARCIAL)</b>

                <div id="formulario">             
                    <form action="../../controllers/activities/BooksByPartialTitleController.php" method="POST">
                        <label>Introdueix part del títol</label><br><br>
                        <input type="text" name="partialTitle" placeholder="Introdueix part del títol"/><br><br>
                        <input type="submit" value="EXECUTAR" id="enviar"/><br>
                    </form>
                </div>
                <div>
                    <h4>RESULTAT:</h4>
                    <?php
                        $res = filter_input(INPUT_COOKIE, "resultBooksByPartialTitle");
                        print $res;
                ?>
                </div>
            </article>
            
             <article>
                <br><br>                    
            </article>	
            
            <article id="BooksByPrice">
                <a name="calculbasic"></a>
                <b>MOSTRA LLIBRES PER PREU</b>

                <div id="formulario">             
                    <form action="../../controllers/activities/BooksByPriceController.php" method="POST">
                        <label>Introdueix els límits de preu:</label><br><br>
                        <input type="number" name="minPrice" placeholder="preu mínim"/><br><br>
                        <input type="number" name="maxPrice" placeholder="preu màxim"/><br><br>
                        <input type="submit" value="EXECUTAR" id="enviar"/><br>
                    </form>
                </div>
                <div>
                    <h4>RESULTAT:</h4>
                    <?php
                        $res = filter_input(INPUT_COOKIE, "resultBooksByPrice");
                        print $res;
                ?>
                </div>
            </article>

            <article id="YearsByAuthor">
                <a name="calculbasic"></a>
                <b>MOSTRA ANYS PER AUTOR</b>

                <div id="formulario">             
                    <form action="../../controllers/activities/YearsByAuthorController.php" method="POST">
                        <label>Introdueix autor:</label><br><br>
                        <input type="text" name="author" placeholder="Autor"/><br><br>
                        <input type="submit" value="EXECUTAR" id="enviar"/><br>
                    </form>
                </div>
                <div>
                    <h4>RESULTAT:</h4>
                    <?php
                        $res = filter_input(INPUT_COOKIE, "resultYearsByAuthor");
                        print $res;
                ?>
                </div>
            </article>

            <article id="Topic">
                <a name="calculbasic"></a>
                <b>MOSTRA TEMES</b>

                <div id="formulario">             
                    <form action="../../controllers/activities/TopicsController.php" method="POST">
                        <input type="submit" value="EXECUTAR" id="enviar"/><br>
                    </form>
                </div>
                <div>
                    <h4>RESULTAT:</h4>
                    <?php
                        $res = filter_input(INPUT_COOKIE, "resultTopics");
                        print $res;
                ?>
                </div>
            </article>
            
            <article id="InfoByAuthor">
                <a name="calculbasic"></a>
                <b>INFORMACIÓ PER AUTORS</b>

                <div id="formulario">             
                    <form action="../../controllers/activities/InfoByAuthorController.php" method="POST">
                        <label>Introdueix autor:</label><br><br>
                        <input type="text" name="author" placeholder="Autor"/><br><br>
                        <input type="submit" value="EXECUTAR" id="enviar"/><br>
                    </form>
                </div>
                <div>
                    <h4>RESULTAT:</h4>
                    <?php
                        $res = filter_input(INPUT_COOKIE, "resultInfoByAuthor");
                        print $res;
                ?>
                </div>
            </article>

            <article id="BooksBetweenYears">
                <a name="calculbasic"></a>
                <b>MOSTRA LLIBRES ENTRE 2 ANYS</b>

                <div id="formulario">             
                    <form action="../../controllers/activities/BooksBetweenYearsController.php" method="POST">
                        <label>Introdueix els límits de preu:</label><br><br>
                        <input type="number" name="minYear" placeholder="any mínim"/><br><br>
                        <input type="number" name="maxYear" placeholder="any màxim"/><br><br>
                        <input type="submit" value="EXECUTAR" id="enviar"/><br>
                    </form>
                </div>
                <div>
                    <h4>RESULTAT:</h4>
                    <?php
                        $res = filter_input(INPUT_COOKIE, "resultBooksBetweenYears");
                        print $res;
                ?>
                </div>
            </article>
            
             <article>
                <br><br>                    
            </article>	

            <article id="BooksByTopicAndYear">
                <a name="calculbasic"></a>
                <b>MOSTRA LLIBRES PER TEMA I ANY</b>

                <div id="formulario">             
                    <form action="../../controllers/activities/BooksByTopicAndYearController.php" method="POST">
                        <label>Introdueix els límits de preu:</label><br><br>
                        <input type="text" name="topic" placeholder="tema"/><br><br>
                        <input type="number" name="year" placeholder="any"/><br><br>
                        <input type="submit" value="EXECUTAR" id="enviar"/><br>
                    </form>
                </div>
                <div>
                    <h4>RESULTAT:</h4>
                    <?php
                        $res = filter_input(INPUT_COOKIE, "resultBooksByTopicAndYear");
                        print $res;
                ?>
                </div>
            </article>
            
             <article>
                <br><br>                    
            </article>	

        </section>

        <footer>
            <div class="darkstyle">  
                <a><b> Autor: Jose Meseguer</b> </a> 
            </div>		
        </footer>
    </body>
</html>
