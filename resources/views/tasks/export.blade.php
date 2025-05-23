<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Exporter la liste des tâches') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('En cliquant ici, vous pouvez choisir d exporter la liste des tâches en PDF ou en Excel.') }}
        </p>
    </header>

    <x-link-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-export')"
    >{{ __('Exporter la liste des tâches') }}</x-link-button>

    <x-modal name="confirm-export" class="p-6">
            @csrf
        <form class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Exporter la liste des tâches') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Voulez-vous exporter la liste des tâches en PDF ou en Excel ?') }}
            </p>
            <div class="mt-6 flex justify-center space-x-10">
                <x-link-button href="{{ route('tasks.export-pdf') }}" class="btn btn-primary">
                        Exporter en PDF
                    </x-link-button>
                <x-link-button href="{{ route('tasks.export-excel') }}" class="btn btn-primary">
                        Exporter en Excel
                    </x-link-button>
            </div>

            
            <div class="mt-6 flex">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </div>
        </form>
    </x-modal>
</section>
