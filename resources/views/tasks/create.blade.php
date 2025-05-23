
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a task') }}
        </h2>
    </x-slot>

    <x-tasks-card>

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="post">
            @csrf

            <!-- Titre -->
            <div>
                <x-input-label for="title" :value="__('Title')" />

                <x-text-input  id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />

                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Détail -->
            <div class="mt-4 w-full">
                <x-input-label for="detail" :value="__('Detail')" />

                <x-textarea class="block mt-1 w-full" id="detail" name="detail">{{ old('detail') }}</x-textarea>

                <x-input-error :messages="$errors->get('detail')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Send') }}
                </x-primary-button>
            </div>
        </form>

    </x-tasks-card>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script>
$(document).ready(function() {
  
  // Define function to open filemanager window
  var lfm = function(options, cb) {
    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
    window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = cb;
  };

  // Define LFM summernote button
  var LFMButton = function(context) {
    var ui = $.summernote.ui;
    var button = ui.button({
      contents: '<i class="note-icon-picture"></i> ',
      tooltip: 'Insert image with filemanager',
      click: function() {
        lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
          lfmItems.forEach(function(lfmItem) {
            context.invoke('insertImage', lfmItem.url);
          });
        });
      }
    });
    return button.render();
  };

  // Initialize summernote with LFM button integrated into your existing toolbar
  $('#detail').summernote({
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'video', 'lfm']], // Add 'lfm' button here
      ['view', ['fullscreen', 'codeview']],
    ],
    buttons: {
      lfm: LFMButton // Add the LFM button definition
    }
  });
});
</script>


