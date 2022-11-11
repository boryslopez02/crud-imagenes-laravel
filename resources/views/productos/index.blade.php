<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a type="button" href="{{ route('productos.create') }}" class="bg-indigo-500 text-white hover:bg-indigo-700 font-semibold px-6 py-2 rounded-lg transition duration-150 ease-in-out m-5">Crear</a>

                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td class="px-14 py-1">
                                <img src="/imagen/{{ $producto->imagen }}" width="100%" class="rounded-lg">
                            </td>
                            <td class="px-4 py-2">
                                <div class="flex justify-center rounded-lg text-lg">
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="bg-blue-500 text-white hover:bg-blue-700 font-semibold p-2 rounded-lg transition duration-150 ease-in-out"><i class="feather" data-feather="edit-3"></i></a>

                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="formEliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white hover:bg-red-700 font-semibold p-2 rounded-lg transition duration-150 ease-in-out"><i class="feather text-xs" data-feather="trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-5">
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.formEliminar')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: 'Realmente deseas eliminar el producto seleccionado?',
                    icon: 'warning',
                    showCancelButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('¡Eliminado!', '', 'success');
                        this.submit();
                    }
                });

            }, false)
        })
    })()
</script>
