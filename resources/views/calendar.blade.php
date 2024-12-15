<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('カレンダー') }}
        </h2>
    </x-slot>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    <body>
        <div id='calendar' class="px-6 py-5"></div>
    </body>
</x-app-layout>