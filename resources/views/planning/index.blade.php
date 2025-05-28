<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Planning des séances</h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">

        {{-- Navigation des semaines --}}
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('planning.index', ['startOfWeek' => $previousWeek]) }}"
                class="btn btn-primary hover:underline text-blue-600">
                ← Semaine précédente
            </a>

            <span class="font-semibold">
                Semaine n°{{ $startOfWeek->isoWeek }} du {{ $startOfWeek->format('d/m/Y') }} au {{ $endOfWeek->format('d/m/Y') }}
            </span>


            <a href="{{ route('planning.index', ['startOfWeek' => $nextWeek]) }}"
                class="btn btn-primary hover:underline text-blue-600">
                Semaine suivante →
            </a>
        </div>

        {{-- Tableau du planning --}}
        <table class="w-full table-fixed border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-center">
                    @foreach($dates as $date)
                        <th class="border border-gray-300 px-2 py-2">
                            {{ $date->locale('fr')->dayName }}<br>
                            <span class="text-sm text-gray-600">{{ $date->format('d/m/Y') }}</span>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($dates as $date)
                        <td class="border border-gray-300 align-top px-2 py-4" style="min-height:150px;">
                            @if(isset($showtimesByDate[$date->format('Y-m-d')]))
                                @foreach($showtimesByDate[$date->format('Y-m-d')] as $showtime)
                                    <div class="mb-2 border-b pb-1">
                                        <strong>{{ $showtime->cinema->titre ?? 'Film inconnu' }}</strong><br>
                                        <small>{{ \Carbon\Carbon::parse($showtime->start_time)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($showtime->end_time)->format('H:i') }}</small>
                                    </div>
                                @endforeach
                            @else
                                <span class="text-gray-400 italic">Aucune séance</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>