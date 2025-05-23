<td class="px-2 py-2">
    <a role="button" {{ $attributes->merge(['class' => 'inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
        <!-- Si une image est fournie, l'afficher -->
        @if(isset($image))
            <img src="{{ $image }}" alt="icon" class="mr-2 h-5 w-5">
        @endif
        
        <!-- Le contenu du bouton (ex : texte) -->
        {{ $slot }}
    </a>
</td>
