<div>
    <!-- Modal toggle -->
    <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" >
      Asignar Estudiante
    </button>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full" wire:ignore.self>

    {{-- fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center flex" --}}


        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Asignar Nuevo Estudiante
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-2  ">

                    <div class="text-left min-w-full md:p-5 ">
                        <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email del estudiante</label>
                        <div class="relative flex">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            </div>
                            <input type="text" wire:model="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg rounded-none rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@dominio.com">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                              Buscar
                            </span>
                        </div>
                        @error('search') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror

                        <ul>
                            @if ($result)
                            <p class="text-gray-200">Resultados:</p>
                                <li>
                                    <h3 class="text-lg text-gray-400 ml-3 mt-3 capitalize">{{ $result->nombre }} {{ $result->apellido }}</h3>
                                    @if ($result->courses->contains($course_id))
                                        <span class="text-red-400 m-4">Estudiante ya esta asignado al curso</span>
                                    @else
                                        <button wire:click.stop="assignCourse({{$result->id}})"
                                            class="text-center block text-white bg-blue-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-2 py-2.5 m-2 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                                            >Asignar al curso</button>
                                    @endif
                                </li>
                            @else
                                @if ($search!='')
                                    <p class="text-gray-200">Resultados:</p>
                                    <h3 class="text-gray-500">No se encontro ningun estudiante con ese email</h3>
                                @endif
                            @endif
                        </ul>
                    </div>
                       
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    {{-- <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Asignar</button> --}}
                    <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>

        Livewire.on('modalHide', postId => {
            console.log(postId.id)
            
            const targetEl = document.getElementById(''+postId.id+'');

            // options with default values
            const options = {
                placement: 'bottom-right',
                backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
            };
            const modal = new Modal(targetEl, options);
            // Tu código para cerrar el modal
            modal.hide();
            if($('#'+postId.id).hasClass("hidden")) {
                $('[modal-backdrop]').hide();
            }
            
        })


    </script>
@endpush