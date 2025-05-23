<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Barryvdh\DomPDF\Facade\Pdf;
use Rap2hpoutre\FastExcel\FastExcel;

class TaskController extends Controller
{
    /**
     * Affiche la liste des tâches.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Formulaire de création d'une tâche.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Enregistre une nouvelle tâche.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:100',
            'detail' => 'required|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $task = new Task();
        $task->title = $data['title'];
        $task->detail = $data['detail'];
        $task->state = false; // Par défaut, la tâche est "À faire"
        $task->save();

        return redirect()->route('tasks.create')->with('message', __('La tâche a bien été créée !'));
    }

    /**
     * Affiche une tâche spécifique.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Formulaire d'édition d'une tâche.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Met à jour une tâche.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|max:100',
            'detail' => 'required|max:500',
        ]);

        $task->title = $data['title'];
        $task->detail = $data['detail'];
        $task->state = $request->has('state'); // Met à jour l'état
        $task->save();

        return redirect()->route('tasks.index')->with('message', __('La tâche a bien été modifiée !'));
    }

    /**
     * Supprime une tâche.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('message', __('La tâche a bien été supprimée !'));
    }

    /**
     * Affiche les tâches contenant des images.
     */
    public function image()
    {
        $tasks = Task::where('detail', 'like', '%<figure class="image">%')->get();
        return view('tasks.image', compact('tasks'));
    }

    
    public function exportToPDF()
    {
        $tasks = Task::all();
        $pdf = Pdf::loadView('tasks.pdf', compact('tasks'));
        return $pdf->download('liste_des_taches.pdf');
    }

    public function exportToExcel()
    {
        $tasks = Task::all();
        return (new FastExcel($tasks))->download('liste_des_taches.xlsx');
    }

    public function nbTasks()
    {
        $nbTasks = Task::count();
        $nbTasksWithImage = Task::where('detail', 'like', '%<figure class="image">%')->count();
        $nbFinishedTasks = Task::where('state', true)->count();
        $avgTimeInSeconds = Task::whereNotNull('updated_at') // Filtrer les tâches mises à jour
            ->where('state', 1) // Tâches marquées comme complétées
            ->get()
            ->map(function ($task) {
                // Calculer la différence en secondes entre created_at et updated_at
                return $task->created_at->diffInSeconds($task->updated_at);
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



        return view('dashboard', compact('nbTasks', 'nbTasksWithImage', 'nbFinishedTasks', 'avgTimeInSeconds', 'formattedTime'));
    }

    
}
