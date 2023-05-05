<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-6 ">
            <div class="bg-white dark:bg-gray-800  shadow-xl sm:rounded-lg grid md:grid-cols-3 grid-cols-1 gap-3 md:p-4 ">
                @livewire('dashboard.top-courses')
            </div>
        </div>
    </div>
</x-app-layout>
