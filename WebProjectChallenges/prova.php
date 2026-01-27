<html>

<head>

</head>

<body>
    <div>
        <p>Prova</p>
        <form action="controllers/provaController.php" method="POST">
            <input type="number" name="input" placeholder="Escriu el resultat" />
            <input type="submit" value="CHECK" id="check" name="enviar" />
        </form>

        <?php
            $output = filter_input(INPUT_COOKIE, "output");
            print $output;
        ?>



    </div>
</body>

</html>
