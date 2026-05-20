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
        <table>
            <tbody>
                <th>id_client</th>
                <th>nom</th>
                <th>cognom</th>
                <th>email</th>
                <th>provincia</th>
                <th>poblacio</th>
        <?php
            $msg = filter_input(INPUT_COOKIE, "res");
        print $msg;
        $headerValues = explode(":", $msg);
        $header = $headerValues[0];
        $rows = explode(";", $headerValues[1]);

        print "<h2>$header</h2>";
        foreach ($rows as $row) {
            $fields = explode(",", $row);
            if (count($fields) != 6) {
                continue;
            }
            $id_client = $fields[0];
            $nom = $fields[1];
            $cognom = $fields[2];
            $email = $fields[3];
            $provincia = $fields[4];
            $poblacio = $fields[5];

            print "<tr>
                        <td>$id_client</td>
                        <td>$nom</td>
                        <td>$cognom</td>
                        <td>$email</td>
                        <td>$provincia</td>
                        <td>$poblacio</td>
                
                    </tr>";
        }
        ?>
            </tbody>
        </table>
    
    </body>
    
    <style>
        table{
            gap:0px;
            border-spacing: 0px
             
        }

        table td, th{
            
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</html>
