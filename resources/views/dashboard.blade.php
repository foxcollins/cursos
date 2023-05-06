<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class=" mx-auto sm:px-4 lg:px-4 ">


            <div class="grid md:grid-cols-3 ">
                <div class="w-full max-w-sm p-4 bg-white border border-gray-200 md:rounded-lg shadow sm:p-8 dark:bg-blue-800 dark:border-gray-700">
                    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Cursos</h5>
                    <div class="flex items-baseline text-gray-900 dark:text-white">
                        <span class="text-3xl font-semibold mr-3"><i class="fa-solid fa-book-bookmark"></i></span>
                        <span class="text-5xl font-extrabold tracking-tight">0</span>
                        
                    </div>
                </div>
                <div class="w-full max-w-sm p-3 bg-white border border-red-200 md:rounded-lg shadow sm:p-8 dark:bg-pink-800 dark:border-gray-700">
                    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400"> Estudiantes</h5>
                    <div class="flex items-baseline text-gray-900 dark:text-white">
                        <span class="text-3xl font-semibold mr-3" ><i class="fa-solid fa-users-line"></i></span>
                        <span class="text-5xl font-extrabold tracking-tight">49</span>
                        
                    </div>
                </div>
                <div class="w-full max-w-xl p-5 bg-white border border-gray-200 md:rounded-lg shadow sm:p-8 dark:bg-gray-900 dark:border-gray-700">
                    @livewire('dashboard.top-courses')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
