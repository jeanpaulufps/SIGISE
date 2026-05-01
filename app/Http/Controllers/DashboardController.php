<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\AsistenciaDetalle;
use App\Models\Deportista;
use App\Models\Grupo;
use App\Models\Sede;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 📊 Totales
        $totalDeportistas = Deportista::count();
        $totalGrupos = Grupo::count();
        $totalSedes = Sede::count();

        // 📅 Asistencia hoy
        $hoy = Carbon::today();

        $asistenciaHoy = Asistencia::whereDate('fecha', $hoy)->count();

        // 📈 % asistencia promedio
        $totalRegistros = AsistenciaDetalle::count();

        $totalAsistencias = AsistenciaDetalle::where('asistio', true)->count();

        $porcentajeAsistencia = $totalRegistros > 0
            ? round(($totalAsistencias / $totalRegistros) * 100)
            : 0;

        // 🚨 Top inasistencias
        $inasistencias = AsistenciaDetalle::selectRaw('deportista_id, COUNT(*) as faltas')
            ->where('asistio', false)
            ->groupBy('deportista_id')
            ->orderByDesc('faltas')
            ->with('deportista')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalDeportistas',
            'totalGrupos',
            'totalSedes',
            'asistenciaHoy',
            'porcentajeAsistencia',
            'inasistencias'
        ));
    }
}
