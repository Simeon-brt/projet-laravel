<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Cinema List')
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <div class="bg-white shadow sm:rounded-lg p-4 sm:p-8">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="border px-2 py-2 text-xs text-gray-500">#</th>
                            <th class="border px-2 py-2 text-xs text-gray-500">@lang('Title')</th>
                            <th class="hidden md:table-cell border px-2 py-2 text-xs text-gray-500">@lang('Description')
                            </th>
                            <th class="border px-2 py-2 text-xs text-gray-500">@lang('Image')</th>
                            <th class="border px-2 py-2 text-xs text-gray-500">@lang('Date')</th>
                            <th class="border px-2 py-2 text-xs text-gray-500" colspan="2">@lang('Actions')</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($cinema as $item)
                            <tr class="whitespace-nowrap border-t border-gray-200">
                                <td class="border px-4 py-4 text-sm text-gray-500">{{ $item->id }}</td>
                                <td class="border px-4 py-4 font-medium">{{ $item->titre }}</td>
                                <td
                                    class="hidden md:table-cell border px-4 py-4 overflow-hidden text-ellipsis line-clamp-3 max-w-xs">
                                    {{ $item->description }}
                                </td>
                                <td class="border px-4 py-4">
                                    @if($item->image)
                                        <img src="{{ asset( $item->image) }}" alt="image"
                                            class="h-12 w-12 object-cover rounded">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-4">{{ $item->date ?? '-' }}</td>
                                <td>
                                    <x-link-button href="{{ route('cinema.show', $item->id) }}" class="btn btn-primary">
                                        @lang('Show')
                                    </x-link-button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>