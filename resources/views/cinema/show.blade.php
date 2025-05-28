<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Show a movie')
        </h2>
    </x-slot>

    <x-tasks-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Title')</h3>
        <p>{{ $cinema->titre }}</p>

        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Description')</h3>
        <p>{{ $cinema->description }}</p>

        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Image')</h3>
        @if($cinema->image)
            <img src="{{ $cinema->image }}" alt="Image" class="h-48 w-auto object-cover rounded shadow">
        @else
            <p>-</p>
        @endif

        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date')</h3>
        <p>{{ \Carbon\Carbon::parse($cinema->date)->format('d/m/Y') }}</p>

        {{-- Nouveau tableau des horaires --}}
        <h3 class="font-semibold text-xl text-gray-800 pt-4">@lang('Showtimes')</h3>

        @if($showtimes->isEmpty())
            <p>@lang('No showtimes available')</p>
        @else
            <table class="min-w-full text-left border">
                <thead>
                    <tr>
                        <th class="border px-2 py-1">@lang('Date')</th>
                        <th class="border px-2 py-1">@lang('Start Time')</th>
                        <th class="border px-2 py-1">@lang('End Time')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($showtimes as $showtime)
                        <tr>
                            <td class="border px-2 py-1">{{ \Carbon\Carbon::parse($showtime->date)->format('d/m/Y') }}</td>
                            <td class="border px-2 py-1">{{ \Carbon\Carbon::parse($showtime->start_time)->format('H:i') }}</td>
                            <td class="border px-2 py-1">{{ \Carbon\Carbon::parse($showtime->end_time)->format('H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </x-tasks-card>
</x-app-layout>