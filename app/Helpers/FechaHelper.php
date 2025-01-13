<?php


namespace App\Helpers;

class FechaHelper
{
    // Convierte fecha de formato MySQL (YYYY-mm-dd) a formato español (dd/mm/yy)
    public static function convertirFecha1($fechaMysql)
    {
        // Convertir de formato MySQL a Español (dd/mm/yy)
        $fechaEsp = date('d/m/y', strtotime($fechaMysql));

        return $fechaEsp;
    }

    // Convierte fecha de formato español (dd/mm/yy) a formato MySQL (YYYY-mm-dd)
    public static function convertirFecha2($fechaEsp)
    {
        // Convertir de formato Español (dd/mm/yy) a MySQL (YYYY-mm-dd)
        $partes = explode('/', $fechaEsp);
        $fechaMysql = "20{$partes[2]}-{$partes[1]}-{$partes[0]}";

        return $fechaMysql;
    }
}
