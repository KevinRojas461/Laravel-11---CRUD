<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <!-- <x-welcome /> hace referincia a la pagina -->
                <!-- welcome.blade.php que tiene la documentacion -->


                <!-- aunque dentro de este archivo no se haga referencia a students -->
                <!-- la razon del pq sabe de student es por el web.php -->
                <!-- Route::resource('students', StudentController::class); -->
                <!-- "students", StudentController::class  -->

                <!-- cada vez que se llame (peticion) "students."   -->
                <!-- esta llamando al Route::resource y este lo manda al -->
                <!-- controlador para que de la respuesta  (POST) -->
                <!-- en este caso es la ruta students.store con metodo POST -->

                <!-- Route se esta haciendo referencia a la ruta /students -->
                <!-- y .store el metodo del controlador -->
                <form method="POST" action="{{ route('students.store') }}" class="max-w-sm mx-auto">
                    <!-- directiva de blade (csrf) -->
                    <!-- previene ataques de falcificacion de solicitudes -->
                    <!-- entre sitios Token CSRF -->
                    <!-- permite modificar el estado del servidor haciéndose -->
                    <!-- pasar por un usuarioo determinado -->

                    <!-- Como el sitio web confía en el usuario, realiza una operación -->
                    <!-- solicitada y la procesa como si se tratase del usuario real. -->
                    @csrf
                    <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    

                    <div class="mb-5">
                    <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                    <input type="number" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    
                    
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    <a href="{{ route('students.index') }}" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
