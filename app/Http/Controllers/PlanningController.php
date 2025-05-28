<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Cinema;

class PlanningController extends Controller
{
    /**
     * Affiche le planning des séances.
     */
    public function index(Request $request)
    {
        // Date de début de la semaine (lundi)
        $startOfWeek = $request->query('startOfWeek')
            ? Carbon::parse($request->query('startOfWeek'))->startOfWeek()
            : Carbon::now()->startOfWeek();

        // Date de fin de la semaine (dimanche)
        $endOfWeek = $startOfWeek->copy()->endOfWeek();

        // Générer un tableau des 7 jours de la semaine
        $dates = [];
        for ($i = 0; $i < 7; $i++) {
            $dates[] = $startOfWeek->copy()->addDays($i);
        }

        // Récupérer les séances entre lundi et dimanche de la semaine sélectionnée
        $showtimes = \App\Models\Showtime::whereBetween('date', [$startOfWeek->format('Y-m-d'), $endOfWeek->format('Y-m-d')])
            ->with('cinema')
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        // Grouper les séances par date (clé format Y-m-d)
        $showtimesByDate = $showtimes->groupBy('date');

        // Dates pour navigation : semaine précédente et semaine suivante
        $previousWeek = $startOfWeek->copy()->subWeek()->format('Y-m-d');
        $nextWeek = $startOfWeek->copy()->addWeek()->format('Y-m-d');

        return view('planning.index', compact(
            'dates',
            'showtimesByDate',
            'previousWeek',
            'nextWeek',
            'startOfWeek',
            'endOfWeek'
        ));
    }
}
