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
            <td>id_pun</td>
            <td>id_usuario</td>
            <td>id_simulacion</td>
            <td>tiempo</td>
            <td>fuel</td>
            <td>fecha</td>
        </tr>
    <?php

include "Modelo\puntuacion.php";

$datospuntuacion = [
    new puntuacion(1, 1, 6, 220, 2662, "2024-09-08 20:33:11")

];
foreach ($datospuntuacion as $dato) {
    echo '<tr>';
    echo '<td>' . $dato->getId_Puntuacion() . '</td>';
    echo '<td>' . $dato->getId_Usuario() . '</td>';
    echo '<td>' . $dato->getIdSimulacion() . '</td>';
    echo '<td>' . $dato->getTiempo() . '</td>';
    echo '<td>' . $dato->getFuel() . '</td>';
    echo '<td>' . $dato->getFecha() . '</td>';
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