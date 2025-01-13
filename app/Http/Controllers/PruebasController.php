<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelicula;
namespace App\Http\Controllers;

use App\Helpers\FechaHelper;

class PruebasController extends Controller
{



    public function ejemploParaFechasEjercicio()
    {
        $fechaMysql = '2025-01-13';
        $fechaEsp = FechaHelper::convertirFecha1($fechaMysql);
    
        echo "La fecha en formato español es: $fechaEsp";
    
        $fechaEsp = '13/01/25';
        $fechaMysql = FechaHelper::convertirFecha2($fechaEsp);
    
        echo "La fecha en formato MySQL es: $fechaMysql";
    }
    



    // public function ejemploParaFechasEjercicio()
    // {
    //     // Fecha en formato MySQL (YYYY-mm-dd)
    //     $fechaMysql = '2025-01-13';

    //     // Depurando la fecha MySQL antes de la conversión
    //     dd("Fecha MySQL antes de la conversión:", $fechaMysql);

    //     // Convertir fecha MySQL a formato español (dd/mm/yy)
    //     $fechaEsp = FechaHelper::convertirFecha1($fechaMysql);

    //     // Depurando la fecha convertida a formato español
    //     dd("Fecha en formato español:", $fechaEsp);

    //     // Fecha en formato español (dd/mm/yy)
    //     $fechaEsp = '13/01/25';

    //     // Depurando la fecha española antes de la conversión
    //     dd("Fecha española antes de la conversión:", $fechaEsp);

    //     // Convertir fecha española a formato MySQL (YYYY-mm-dd)
    //     $fechaMysql = FechaHelper::convertirFecha2($fechaEsp);

    //     // Depurando la fecha convertida a formato MySQL
    //     dd("Fecha en formato MySQL:", $fechaMysql);
    // }
}