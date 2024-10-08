<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Simulacion</title>
    <style>
        body{
            background-color: slategrey;
        }
        h1{
            text-align: center;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        td{
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }
        tr{
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <form action="inicio.php" method="get">
        <button type="submit">Volver</button>
    </form>
    <h1>Datos de Simulación</h1>
    <table>
        <tr>
            <td>id_sim</td>
            <td>id_usuario</td>
            <td>id_lander</td>
            <td>id_escenario</td>
            <td>fecha</td>
        </tr>
    <?php

include "Modelo\Simulacion.php";

$datossimulacion = [
    new simulacion(6,1,1,1,"2024-09-08 20:33:01")

];
foreach ($datossimulacion as $dato) {
    echo '<tr>';
    echo '<td>' . $dato->getId() . '</td>';
    echo '<td>' . $dato->getUser() . '</td>';
    echo '<td>' . $dato->getLander() . '</td>';
    echo '<td>' . $dato->getPlanet() . '</td>';
    echo '<td>' . $dato->getTimeStamp() . '</td>';
    echo '<tr>';
}
echo '</table>';
?>
    </table>
    <form action="inicio.php" method="get">
        <button type="submit">Volver</button>
    </form>
</body>
</html>