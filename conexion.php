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

            <table>
                <?php
                $hostname = "127.0.0.1:3306";
                $userDB = "root";
                $passwordDB = "";
                $schemaDB = "telefonia";

                $conexionSQL = mysqli_connect($hostname, $userDB, $passwordDB, $schemaDB);

                $consulta = mysqli_query($conexionSQL, "SELECT * FROM usuario WHERE usuario.saldo > 150");

                $registro = mysqli_fetch_assoc($consulta);

                echo generarTitulo($schemaDB);
                echo generarEncabezado($registro);
                echo generarCuerpo($registro, $consulta);
                mysqli_close($conexionSQL);

                /* FUNCIONES */

                function generarTitulo($nombreDB){
                    return "<caption><h1 class='title-style'>"."Tabla de ".$nombreDB."</h1></caption>";
                }

                function generarEncabezado($registro){

                    $codigoHTML = "<thead><tr>";

                    foreach ($registro as $key => $value) {
                        $codigoHTML = $codigoHTML . "<th>" . $key . "</th>";
                    }

                    $codigoHTML = $codigoHTML . "</tr></thead>";

                    return $codigoHTML;
                }

                function generarCuerpo($registro, $resultado){
                    $codigoHTML = "<tbody>";

                    do {

                        $codigoHTML = $codigoHTML . "<tr>";

                        foreach ($registro as $value) {
                            $codigoHTML = $codigoHTML . "<td>" . $value . "</td>";
                        }

                        $codigoHTML = $codigoHTML . "</tr>";

                    } while ($registro = mysqli_fetch_assoc($resultado));

                    $codigoHTML = $codigoHTML . "</tbody>";
                    return $codigoHTML;
                }

                ?>
            </table>

        </section>

    </main>

    <footer class="title-style">
        <p>Curso UTN FULL STACK</p>
    </footer>

</body>

</html>