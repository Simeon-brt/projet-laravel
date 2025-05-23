<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Tasks List')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto mt-6"> <!-- Ajout de mt-6 ici -->
        <div class="flex flex-col">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <table>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-2 py-2 text-xs text-gray-500">#</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('Title')</th>
                                <th class="px-2 py-2 text-xs text-gray-500">Etat</th>
                                <th class="px-2 py-2 text-xs text-gray-500"></th>
                                <th class="px-2 py-2 text-xs text-gray-500"></th>
                                <th class="px-2 py-2 text-xs text-gray-500"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($tasks as $task)
                                <tr class="whitespace-nowrap">
                                    <td class="px-4 py-4 text-sm text-gray-500">{{ $task->id }}</td>
                                    <td class="px-4 py-4">{{ $task->title }}</td>
                                    <td class="px-4 py-4">@if($task->state) {{ __('Done') }} @else {{ __('To do') }} @endif</td>
                                    <x-link-button href="{{ route('tasks.show', $task->id) }}">
                                        @lang('Show')
                                    </x-link-button>
                                    <x-link-button href="{{ route('tasks.edit', $task->id) }}">
                                        @lang('edit')
                                    </x-link-button>
                                    <x-link-button onclick="event.preventDefault(); document.getElementById('destroy{{ $task->id }}').submit();">
                                        @lang('Delete')
                                    </x-link-button>
                                    <form id="destroy{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('tasks.export')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
