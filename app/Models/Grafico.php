<?php

namespace App\Models;

class Grafico
{
    /**
     * Genera datos estadísticos de vacantes agrupados por estado.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function obtenerVacantesPorEstado()
    {
        return \App\Models\Vacante::selectRaw('estado, COUNT(*) as cantidad')
            ->groupBy('estado')
            ->get();
    }

    /**
     * Obtiene todas las empresas registradas.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function obtenerEmpresas()
    {
        return \App\Models\Empresa::all();
    }
}
