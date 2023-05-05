<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Datos del curso') }}
    </h2>
</x-slot>
<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-form-section submit="updateProfileInformation">
            <x-slot name="title">
                {{ __('Datos del curso') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Informacion detallada del curso') }}
            </x-slot>

            <x-slot name="form">
                
                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Nombre') }}" />
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight capitalize">{{$course->nombre}}</h2>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Horario') }}" />
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight capitalize">{{$course->horario}}</h2>
                </div>
                
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Fecha de inicio') }}" />
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{Carbon\Carbon::parse($course->fecha_inicio)->toFormattedDateString()}}</h2>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Fecha de culminación') }}" />
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{Carbon\Carbon::parse($course->fecha_fin)->toFormattedDateString()}}</h2>
                </div>

            </x-slot>

            
                
            
        </x-form-section>
        <div class="grid justify-items-end p-4">
            <div class="inline-flex rounded-md shadow-sm " role="group">
                <livewire:courses.add-student :id="$course->id">
                <a href="{{route('courses.edit',$course->id)}}" class=" rounded-lg text-sm font-semibold py-2.5 px-4 mx-2 bg-white  hover:bg-white/25 hover:ring-slate-900/15 ">
                 <i class="fa-regular fa-plus"></i> Editar
                </a>
            </div>
        </div>
            
        <x-section-border />



        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Estudiantes registrados') }}
            </h2>
        </div>

        <div class="mt-10 sm:mt-0">
            <div class="min-w-full bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (isset($course->students))
                   <table class="table-auto border-collapse border border-slate-500 min-w-full dark:text-gray-200 justify-center">
                     <thead>
                       <tr>
                         <th class="border border-slate-600 ">Nombre</th>
                         <th class="border border-slate-600 ">Apellido</th>
                         <th class="border border-slate-600 ">Opciones</th>
                       </tr>
                     </thead>
                    
                        @foreach ($course->students as $student)
                            <tbody>
                                <tr>
                                    <td class="border border-slate-700 text-center capitalize">{{$student->nombre}}</td>
                                    <td class="border border-slate-700 text-center capitalize">{{$student->apellido}}</td>
                                    <td class="border border-slate-700 text-center ">
                                       <a href="{{route('students.show',$course->id)}}" type="button" class="inline-flex justify-center rounded-lg text-md font-semibold py-2 px-2 text-gray-200 hover:bg-slate-700">
                                          <i class="fa-regular fa-folder-open"></i>
                                       </a>
                                       <a href="javascript:;" wire:click="detachStudent({{$student->id}})" type="button" class="inline-flex justify-center rounded-lg text-md font-semibold py-2 px-2 text-gray-200 hover:bg-slate-700">
                                          <i class="fa-regular fa-trash-can"></i>
                                       </a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    
                   </table>
                @else
                    <h3 class="text-xl text-center dark:text-gray-400 p-4">No existen registros <i class="fa-solid fa-triangle-exclamation"></i></h3>
                @endif
            </div>
        </div>
    </div>
</div>

