
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
            <td>Id_ds</td>
            <td>Tiempo</td>
            <td>Velocidad</td>
            <td>Fuel</td>
            <td>Distancia</td>
            <td>Id_sim</td>
        </tr>
    <?php

    include "ClasesPhp\DatosSim.php";

    $datosSimulacion = [
        new DatosSIM(1,0,0,2800,3500,6),
        new DatosSIM(2,5,-6.100000000000001,2800,	3469.5,	6),
        new DatosSIM(3,10,-14.200000000000003,2800,3398.5,	6),
        new DatosSIM(4,15,-22.300000000000004,2800,	3287,	6),
        new DatosSIM(5,20,-30.400000000000006,2800,	3135,	6),
        new DatosSIM(6,25,-38.50000000000001,2800,2942.5,6),
        new DatosSIM(7,30,-46.60000000000001,2800,2709.5,6),
        new DatosSIM(8,35,-54.70000000000001,2800,2436,6),
        new DatosSIM(9,40,-27.80000000000001,2786,2297,6),
        new DatosSIM(10,45,-20.900000000000013,2780,2192.5,6),
        new DatosSIM(11,50,-14.00000000000001,2774,2122.5,6),
        new DatosSIM(12,55,-22.100000000000016,2774,2012,6),
        new DatosSIM(13,60,-30.200000000000017,2774,1861,6),
        new DatosSIM(14,65,-38.30000000000002,2774,1669.5,6),
        new DatosSIM(15,70,-31.40000000000002,2768,1512.5,6),
        new DatosSIM(16,75,-24.50000000000002,2762,1390,6),
        new DatosSIM(17,80,-2.6000000000000227,2750,1377,6),
        new DatosSIM(18,85,-10.700000000000024,2750,1323.4999999999998,6),
        new DatosSIM(19,90,-18.800000000000026,2750,1229.4999999999995,6),
        new DatosSIM(20,95,-11.900000000000027,2744,1169.9999999999993,6),
        new DatosSIM(21,100,-5.0000000000000275,2738,1144.999999999999,6),
        new DatosSIM(22,105,-13.10000000000003,2738,1079.4999999999989,6),
        new DatosSIM(23,110,-6.20000000000003,2732,1048.4999999999986,6),
        new DatosSIM(24,115,-14.300000000000033,2732,976.9999999999984,6),
        new DatosSIM(25,120,-7.400000000000033,2726,939.9999999999983,6),
        new DatosSIM(26,125,-0.5000000000000338,2720,937.4999999999982,6),
        new DatosSIM(27,130,-8.600000000000035,2720,894.499999999998,6),

    ];
    foreach ($datosSimulacion as $dato) {
        echo '<tr>';
        echo '<td>' . $dato->get_dist() . '</td>';
        echo '<td>' . $dato->get_acel() . '</td>';
        echo '<td>' . $dato->get_vel() . '</td>';
        echo '<td>' . $dato->get_impulso() . '</td>';
        echo '<td>' . $dato->get_fuel() . '</td>';
        echo '<td>' . $dato->get_tiempo() . '</td>';
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