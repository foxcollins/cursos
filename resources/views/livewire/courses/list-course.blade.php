
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Cursos') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class=" mx-auto ">
        <div class="flex flex-row p-6">
            <div class="basis-1/2">
                <h3 class="text-lg dark:text-white">Lista de cursos</h3>
            </div>
            <div class="basis-1/2 text-right">
                <a href="{{route('courses.create')}}" class=" rounded-lg text-sm font-semibold py-3 px-4 bg-white  hover:bg-white/25 hover:ring-slate-900/15 ">
                   <i class="fa-regular fa-plus"></i> Nuevo Curso
                </a>
            </div>
        </div>
        <div class="min-w-full bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            @if (isset($cursos))
               <table class="table-auto border-collapse border border-slate-500 min-w-full dark:text-gray-200 justify-center">
                 <thead>
                   <tr>
                     <th class="border border-slate-600 ">Nombre</th>
                     <th class="border border-slate-600 ">Horario</th>
                     <th class="border border-slate-600 ">Inicio | Fin</th>
                     <th class="border border-slate-600 ">Estudiantes Asignados</th>
                     <th class="border border-slate-600 ">Opciones</th>
                   </tr>
                 </thead>
                
                    @foreach ($cursos as $curso)
                        <tbody>
                            <tr>
                                <td class="border border-slate-700 text-center capitalize">{{$curso->nombre}}</td>
                                <td class="border border-slate-700 text-center capitalize">{{$curso->horario}}</td>
                                <td class="border border-slate-700 text-center uppercase">{{Carbon\Carbon::parse($curso->fecha_inicio)->toFormattedDateString()}} | {{Carbon\Carbon::parse($curso->fecha_fin)->toFormattedDateString()}}</td>
                                <td class="border border-slate-700 text-center ">{{$curso->students->count()}}</td>
                                <td class="border border-slate-700 text-center ">
                                   <a href="{{route('courses.show',$curso->id)}}" type="button" class="inline-flex justify-center rounded-lg text-md font-semibold py-2 px-2 text-gray-200 hover:bg-slate-700">
                                      <i class="fa-regular fa-folder-open"></i>
                                   </a>
                                   <a href="{{route('courses.edit',$curso->id)}}" type="button" class="inline-flex justify-center rounded-lg text-md font-semibold py-2 px-2 text-gray-200 hover:bg-slate-700">
                                      <i class="fa-solid fa-pen-to-square"></i>
                                   </a>
                                   <a href="javascript:;" wire:click="deleteCourse({{$curso->id}})" type="button" class="inline-flex justify-center rounded-lg text-md font-semibold py-2 px-2 text-gray-200 hover:bg-slate-700">
                                      <i class="fa-regular fa-trash-can"></i>
                                   </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    
               </table>
               <div class="my-4">
                       {{ $cursos->links() }}
                </div>
            @else
                <h3 class="text-xl text-center dark:text-gray-400 p-4">No existen registros <i class="fa-solid fa-triangle-exclamation"></i></h3>
            @endif
        </div>
    </div>
</div>
