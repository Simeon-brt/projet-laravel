<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Statistics') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Here are some statistics about the tasks.') }}
        </p>
    </header>

    <div class="bg-gray-50 p-4 rounded-md shadow">
        <p class="text-sm text-gray-600">
            <strong>@lang('Number of tasks'):</strong> {{ $nbTasks }}
        </p>
    </div>
    <div class="bg-gray-50 p-4 rounded-md shadow">
        <p class="text-sm text-gray-600">
            <strong>@lang('Number of tasks with image'):</strong> {{ $nbTasksWithImage}}
        </p>
    </div>
    <div class="bg-gray-50 p-4 rounded-md shadow">
        <p class="text-sm text-gray-600">
            <strong>@lang('Nombre de tâches finis '):</strong> {{ $nbFinishedTasks}}
        </p>
    </div>
     <div class="bg-gray-50 p-4 rounded-md shadow">
        <p class="text-sm text-gray-600">
            <strong>@lang('Temps moyen pour finir une tâche'):</strong> {{ $formattedTime}}
        </p>
    </div>
</section>
