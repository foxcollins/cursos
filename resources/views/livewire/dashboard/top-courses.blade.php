<div class="w-full border border-slate-700 ">
    <h3 class="text-xl p-4 dark:text-white">Top 3 cursos</h3>
    @if (isset($cursos) AND $cursos->count()>0)
        <table class="table-auto border-collapse min-w-full dark:text-gray-200 justify-center">
          <thead>
            <tr>
              <th class=" ">Curso</th>
              <th class=" ">Horario</th>
              <th class=" ">Estudiantes</th>
              <th class="">Opciones</th>
            </tr>
          </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td class=" text-center ">{{$curso->nombre}}</td>
                        <td class=" text-center ">{{$curso->horario}}</td>
                        <td class=" text-center ">{{$curso->students_count}}</td>
                        <td class=" text-center ">
                            <a href="" type="button" class="inline-flex justify-center rounded-lg text-md font-semibold py-2 px-2 text-gray-200 hover:bg-slate-700">
                               <i class="fa-regular fa-folder-open"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-xl dark:text-gray-400 p-4">No existen registros <i class="fa-solid fa-triangle-exclamation"></i></h3>
    @endif
</div>

 