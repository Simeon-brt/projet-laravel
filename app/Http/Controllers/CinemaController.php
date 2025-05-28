<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use Barryvdh\DomPDF\Facade\Pdf;
use Rap2hpoutre\FastExcel\FastExcel;

class CinemaController extends Controller
{
    /**
     * Affiche la liste des tâches.
     */
    public function index()
    {
        $cinema = Cinema::all();
        return view('cinema.index', compact('cinema'));
    }

    /**
     * Formulaire de création d'une tâche.
     */
    public function create()
    {
        return view('cinema.create');
    }

    /**
     * Enregistre une nouvelle tâche.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|max:500',
            'description' => 'required|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'date'=> 'required|date_format:Y-m-d',
        ]);

        $cinema = new Cinema();
        $cinema->titre = $data['titre'];
        $cinema->description = $data['description'];
        $cinema->save();

        return redirect()->route('cinema.create')->with('message', __('La tâche a bien été créée !'));
    }

    /**
     * Affiche une tâche spécifique.
     */
    public function show($id)
    {
        $cinema = Cinema::findOrFail($id);

        // Charger les horaires associés (avec une relation)
        $showtimes = $cinema->showtimes()->orderBy('date')->orderBy('start_time')->get();
        return view('cinema.show', compact('cinema', 'showtimes'));

    }

    /**
     * Formulaire d'édition d'une tâche.
     */
    public function edit(Cinema $cinema)
    {
        return view('cinema.edit', compact('cinema'));
    }

    /**
     * Met à jour une tâche.
     */
    public function update(Request $request, Cinema $cinema)
    {
        $data = $request->validate([
            'titre' => 'required|max:100',
            'description' => 'required|max:500',
        ]);

        $cinema->titre = $data['titre'];
        $cinema->description = $data['description'];
        $cinema->save();

        return redirect()->route('cinema.index')->with('message', __('La tâche a bien été modifiée !'));
    }

    /**
     * Supprime une tâche.
     */
    public function destroy(Cinema $cinema)
    {
        $cinema->delete();
        return redirect()->route('cinema.index')->with('message', __('La tâche a bien été supprimée !'));
    }

    /**
     * Affiche les tâches contenant des images.
     */
    public function image()
    {
        $cinema = Cinema::where('description', 'like', '%<figure class="image">%')->get();
        return view('cinema.image', compact('cinema'));
    }

    
    public function exportToPDF()
    {
        $cinema = Cinema::all();
        $pdf = Pdf::loadView('cinema.pdf', compact('cinema'));
        return $pdf->download('liste_des_taches.pdf');
    }

    public function exportToExcel()
    {
        $cinema = Cinema::all();
        return (new FastExcel($cinema))->download('liste_des_taches.xlsx');
    }

    public function nbcinema()
    {
        $nbcinema = Cinema::count();
        $nbcinemaWithImage = Cinema::where('description', 'like', '%<figure class="image">%')->count();
        $nbFinishedcinema = Cinema::where('state', true)->count();
        $avgTimeInSeconds = Cinema::whereNotNull('updated_at') // Filtrer les tâches mises à jour
            ->where('state', operator: 1) // Tâches marquées comme complétées
            ->get()
            ->map(function ($cinema) {
                // Calculer la différence en secondes entre created_at et updated_at
                return $cinema->created_at->diffInSeconds($cinema->updated_at);
            })
            ->average();
            $formattedTime = null;
            if ($avgTimeInSeconds !== null) {
                $days = floor($avgTimeInSeconds / 86400); // 86400 secondes dans une journée
                $hours = floor(($avgTimeInSeconds % 86400) / 3600); // Heures restantes après avoir extrait les jours
                $minutes = floor(($avgTimeInSeconds % 3600) / 60); // Minutes restantes après avoir extrait les heures
                $seconds = $avgTimeInSeconds % 60; // Secondes restantes après avoir extrait les minutes

                $formattedTime = "{$days}j {$hours}h {$minutes}m {$seconds}s";
    }



        return view('dashboard', compact('nbcinema', 'nbcinemaWithImage', 'nbFinishedcinema', 'avgTimeInSeconds', 'formattedTime'));
    }

    
}
