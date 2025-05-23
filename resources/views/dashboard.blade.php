<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- Utilisation de Flexbox avec alignement à droite -->
                <div class="flex justify-end space-x-8"> <!-- Utilise justify-end pour aligner les éléments à droite -->
                    <!-- Partie des statistiques -->
                    <div class="flex-1 text-left"> <!-- Aligne le texte à droite -->
                        @include('tasks.stats', ['nbTasks' => $nbTasks, 'nbTasksWithImage' => $nbTasksWithImage])
                    </div>


                        <div class="border-l border-gray-300 self-stretch"></div>


                    <!-- Partie du diagramme -->
                    <div class="flex-1">
                        <canvas id="myChart"></canvas>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

    

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Type de graphique : barre
        data: {
            labels: ['Tasks', 'Tasks with Images', 'Finished Tasks'], // Labels
            datasets: [{
                label: '', // Pas de label pour la légende
                data: [{{ $nbTasks }}, {{ $nbTasksWithImage }}, {{$nbFinishedTasks}}], // Données
                backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)'], // Couleur de fond des barres
                borderWidth: 0 // Pas de bordure
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Masquer la légende
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false // Masquer la grille de l'axe X
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        display: true // Masquer la grille de l'axe Y
                    },
                    ticks: {
                        display: true // Masquer les ticks (valeurs) de l'axe Y
                    }
                }
            }
        }
    });
</script>



</x-app-layout>
