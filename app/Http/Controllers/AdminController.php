<?php
namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Empresa;
use App\Models\Usuario;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalVacantes = Vacante::count();
        $totalEmpresas = Empresa::count();
        $totalPostulantes = Usuario::where('id_rol', 3)->count(); // Asumiendo que 3 es el ID para postulantes
        $totalSolicitudes = Solicitud::where('estado', 'pendiente')->count();

        return view('admin.index', compact(
            'totalVacantes',
            'totalEmpresas',
            'totalPostulantes',
            'totalSolicitudes'
        ));
    }
}
