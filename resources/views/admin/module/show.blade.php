<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Show a user')
        </h2>
    </x-slot>

    <x-users-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('name')</h3>
        <p>{{ $user->name }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('email')</h3>
        <p>{{ $user->email }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('role')</h3>
        <p>{{ $user->role }}</p>
    </x-users-card>
</x-app-layout>