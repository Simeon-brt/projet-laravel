<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            @lang('Users List')
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            @lang('Manage and view all the users in your application.')
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <div>


            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-2 py-2 text-xs text-gray-500">@lang('ID')</th>
                        <th class="px-2 py-2 text-xs text-gray-500">@lang('Name')</th>
                        <th class="px-2 py-2 text-xs text-gray-500">@lang('Email')</th>
                        <th class="px-2 py-2 text-xs text-gray-500">@lang('Role')</th>
                        <th class="px-2 py-2 text-xs text-gray-500">@lang('Action')</th>
                        <th class="px-2 py-2 text-xs text-gray-500"></th>
                        

                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($users as $user)
                        <tr class="whitespace-nowrap">
                            <td class="px-4 py-4 text-sm text-gray-500">{{ $user->id }}</td>
                            <td class="px-4 py-4">{{ $user->name }}</td>
                            <td class="px-4 py-4">{{ $user->email }}</td>
                            <td class="px-4 py-4">{{ $user->role }}</td>
                            <td class="px-4 py-4 flex space-x-2">
                                <!-- Bouton "Show" -->
                                <x-link-button href="{{ route('admin.module.show', $user->id) }}">
                                    @lang('Show')
                                </x-link-button>

                                <!-- Bouton "Delete" (si rôle = utilisateur) -->
                                @if($user->role == "utilisateur")
                                    <x-link-button onclick="event.preventDefault(); document.getElementById('deleteUser{{ $user->id }}').submit();">
                                        @lang('Delete')
                                    </x-link-button>
                                    <form id="deleteUser{{ $user->id }}" action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
