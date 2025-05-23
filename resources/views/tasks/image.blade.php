<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Liste d\'images')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto mt-6"> 
        <div class="flex flex-col">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <table>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-2 py-2 text-xs text-gray-500">#</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('Title')</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('created_at')</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('Image')</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($tasks as $task)
                                <tr class="whitespace-nowrap">
                                    <td class="px-4 py-4 text-sm text-gray-500">{{ $task->id }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-500">{{ $task->title }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-500">{{ $task->created_at }}</td>
                                    <td class="px-4 py-4">
                                        {!! $task->detail !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
