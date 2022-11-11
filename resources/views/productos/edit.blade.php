<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex items-center justify-center p-12">
                    <div class="mx-auto w-full max-w-[550px]">
                        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                                <div class="grid grid-cols-1">
                                    <label
                                        for="nombre"
                                        class="mb-3 block text-base font-medium text-[#07074D] uppercase"
                                    >
                                        Nombre
                                    </label>
                                    <input
                                        type="text"
                                        name="nombre"
                                        id="nombre"
                                        value="{{ $producto->nombre }}"
                                        placeholder=""
                                        class="w-full rounded-md border bg-white py-3 px-6 text-base font-medium outline-none focus:shadow-md"
                                    />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label
                                        for="descripcion"
                                        class="mb-3 block text-base font-medium text-[#07074D] uppercase"
                                    >
                                        Descripción
                                    </label>
                                    <input
                                        type="text"
                                        name="descripcion"
                                        id="descripcion"
                                        value="{{ $producto->descripcion }}"
                                        placeholder=""
                                        class="w-full rounded-md border bg-white py-3 px-6 text-base font-medium outline-none focus:shadow-md"
                                    />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 mx-7 my-5">
                                <label
                                    for="imagen"
                                    class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group transition duration-150 ease-in-out text-center"
                                >
                                    <div class="flex flex-col items-center justify-center pt-7"></div>
                                    <div class="h-10 w-10 mx-auto text-purple-400 group-hover:text-purple-600">
                                        <i class="feather" data-feather="image"></i>
                                    </div>
                                    <p class="text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider uppercase">Seleccione la imagen</p>
                                </label>
                                <input
                                    type="file"
                                    name="imagen"
                                    id="imagen"
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 hidden"
                                />
                            </div>
                            <div class="grid grid-cols-1 mx-7 my-5">
                                <img src="/imagen/{{ $producto->imagen }}" id="imagenSeleccionada" class="rounded-xl" style="max-height: 300px; object-fit: contain;">
                            </div>
                            <div class="mx-2">
                                <button
                                    class="bg-indigo-500 text-white hover:bg-indigo-700 font-semibold px-6 py-2 rounded-lg transition duration-150 ease-in-out m-5 uppercase"
                                >
                                    Actualizar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(()=>{
        $('#imagen').change(function() {
            let reader = new FileReader();
            reader.onload = function(event){
                $('#imagenSeleccionada').attr('src', event.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
