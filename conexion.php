<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefonia</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./img/phone-solid.svg">
</head>

<body>
    <header class="title-style">
        <h1>Practica SQL</h1>
    </header>

    <main>

        <section>

                <?php
                
                $hostname = "127.0.0.1:3306";
                $userDB = "root";
                $passwordDB = "";
                $schemaDB = "telefonia";
                $conexionSQL = mysqli_connect($hostname, $userDB, $passwordDB, $schemaDB);
                $consulta = mysqli_query($conexionSQL, "SELECT * FROM usuario");

                echo createTable($consulta, $schemaDB);

                mysqli_close($conexionSQL);


                function createTable($consulta, $nameDB){
                    $tableHTML = "<table>";
                    $tableContent = createTableContent($consulta);
                    return $tableHTML.createTitle($nameDB).$tableContent."</table>";
    
                }

                function createTableContent($consulta){
                    $tableBodyHTML = "<tbody>";
                    $tableHeadHTML = "<thead>";

                    while($registro = mysqli_fetch_assoc($consulta)){
                        $tableBodyHTML = $tableBodyHTML.createRow($registro, "<td>" , "</td>");
                        $campos = array_keys($registro);
                    }

                    $tableHeadHTML = $tableHeadHTML.createRow($campos, "<th>", "</th>");

                    return $tableHeadHTML."</thead>".$tableBodyHTML."</tbody>";
                }

                function createRow($registro, $apertura, $cierre){
                    $tableRow = "<tr>";

                    foreach($registro as $value) {
                        $tableRow = $tableRow.$apertura.$value.$cierre;
                    }

                    return $tableRow."</tr>";
                }


                function createTitle($nombreDB){
                    return "<caption><h1 class='title-style'>"."Tabla de ".$nombreDB."</h1></caption>";
                }


                ?>

        </section>

    </main>

    <footer class="title-style">
        <p>Curso UTN FULL STACK</p>
    </footer>

</body>

</html>