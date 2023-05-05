
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Estudiantes | Editar') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class=" mx-auto ">
        <div class="flex flex-row p-6">
            <div class="basis-1/2">
                <h3 class="text-lg dark:text-white">Datos del estudiante</h3>
            </div>
            <div class="basis-1/2 text-right">
                <a href="{{route('students')}}" class=" rounded-lg text-sm font-semibold py-3 px-4 bg-white  hover:bg-white/25 hover:ring-slate-900/15 ">
                   <i class="fa-solid fa-xmark"></i> Cancelar
                </a>
            </div>
        </div>
        <form wire:submit.prevent="submit">
            <div class="min-w-full  overflow-hidden shadow-xl sm:rounded-lg md:p-8">
              <div class="flex justify-center bg-white dark:bg-gray-800 p-4 ">
                <div class="grid md:grid-cols-2 gap-4 md:w-3/5 w-full p-10">
                      <div class="grid  grid-cols-1 gap-1 min-w-full">
                          <label class="text-gray-200">Nombre</label>
                          <input type="text" wire:model="nombre" class="rounded text-black font-bold" />
                          @error('nombre') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                      </div>
                      <div class="grid grid-cols-1 gap-1 min-w-full">
                          <label class="text-gray-200">Apellido</label>
                          <input type="text" wire:model="apellido" class="rounded text-black font-bold" />
                          @error('apellido') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                      </div>
                      <div class="grid grid-cols-1 gap-1 min-w-full">
                          <label class="text-gray-200">Email</label>
                          <input type="email" wire:model="email" class="rounded text-black font-bold" />
                          @error('email') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                      </div>
                      <div class="grid grid-cols-1 gap-1 min-w-full">
                          <label class="text-gray-200">Fecha Nacimiento</label>
                          <input type="date" wire:model="birth_date" class="rounded text-black font-bold" />
                          @error('birth_date') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                         
                      </div>
                      <div class="">
                        <button type="submit" class="rounded-lg text-sm font-semibold py-3 px-4 bg-blue-600  hover:bg-white/25 hover:ring-slate-900/15 text-gray-200 w-full md:w-1/4">
                       <i class="fa-regular fa-floppy-disk"></i> Guardar
                    </button>
                    </div>
                    </div>
                    
                    
                </div>
            </div>
        </form>
    </div>
</div>

