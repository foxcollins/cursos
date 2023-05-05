<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Información del estudiante') }}
    </h2>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-form-section submit="updateProfileInformation">
            <x-slot name="title">
                {{ __('Datos del estudiante') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Informacion personal') }}
            </x-slot>

            <x-slot name="form">
                
                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Nombre') }}" />
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight capitalize">{{$student->nombre}}</h2>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Apellido') }}" />
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight capitalize">{{$student->apellidoi}}</h2>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Email') }}" />
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{$student->email}}</h2>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Fecha Nacimiento') }}" />
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{Carbon\Carbon::parse($student->birth_date)->toFormattedDateString()}}</h2>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Edad') }}" />
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{$student->age}}</h2>
                </div>

            </x-slot>

            <x-slot name="actions">
                <a href="{{route('students.edit',$student->id)}}" class=" rounded-lg text-sm font-semibold py-3 px-4 bg-white  hover:bg-white/25 hover:ring-slate-900/15 ">
                   <i class="fa-regular fa-plus"></i> Editar
                </a>
            </x-slot>
        </x-form-section>
        <x-section-border />
      


        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cursos asignados') }}
            </h2>
        </div>

        <div class="mt-10 sm:mt-0">
            <div class="min-w-full bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (isset($student->courses))
                   <table class="table-auto border-collapse border border-slate-500 min-w-full dark:text-gray-200 justify-center">
                     <thead>
                       <tr>
                         <th class="border border-slate-600 ">Curso</th>
                         <th class="border border-slate-600 ">Horario</th>
                         <th class="border border-slate-600 ">Opciones</th>
                       </tr>
                     </thead>
                    
                        @foreach ($student->courses as $course)
                            <tbody>
                                <tr>
                                    <td class="border border-slate-700 text-center capitalize">{{$course->nombre}}</td>
                                    <td class="border border-slate-700 text-center capitalize">{{$course->horario}}</td>
                                    <td class="border border-slate-700 text-center ">
                                       <a href="{{route('students.show',$course->id)}}" type="button" class="inline-flex justify-center rounded-lg text-md font-semibold py-2 px-2 text-gray-200 hover:bg-slate-700">
                                          <i class="fa-regular fa-folder-open"></i>
                                       </a>
                                       {{-- <a href="" type="button" class="inline-flex justify-center rounded-lg text-md font-semibold py-2 px-2 text-gray-200 hover:bg-slate-700">
                                          <i class="fa-regular fa-trash-can"></i>
                                       </a> --}}
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