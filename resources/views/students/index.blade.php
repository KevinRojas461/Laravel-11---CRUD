<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <!-- <x-welcome /> hace referincia a la pagina -->
                <!-- welcome.blade.php que tiene la documentacion -->
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">


                <div class="mb-4">
                    <!-- boton que nos lleve al formulario de crear -->
                    <a href="{{ route('students.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Create Student</a>
                </div>

                <!-- tabla -->
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">NAME</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">AGE</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <TBody>
                        @foreach ($students as $student)
                        <tr>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->id}}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->name}}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->age}}</td>

                            <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center">
                                        <!-- editar -->
                                        <a href="{{ route('students.edit', $student->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                        <!-- delete -->

                                        <!-- onclick="confirmDelete('{{ $student->id }}') -->
                                        <!-- le pasamos el id del registro seleccionado al metodo confirmDelete -->
                                        <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $student->id }}')">Delete</button>

                                    </div>
                            </td>
                        </tr>
                        @endforeach
                    </TBody>
                </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    // formulario dinamico
    function confirmDelete(id){
        alertify.confirm("This is a confirm dialog.", function (e){
            // Si el usuario confirma, el código dentro del bloque if se ejecuta.
            if(e){
                // crea un nuevo elemento de formulario.
                let form = document.createElement('form')
                // post porque le tenemos que enviar el id

                // establece el método del formulario como POST. Aunque estamos realizando
                // una solicitud de eliminación, en HTML solo se permiten los métodos GET
                // y POST, por lo que se usa POST junto con un campo _method oculto para
                // simular una solicitud DELETE.

                // el campo oculto _method es lo que se genera con @method("DELETE").
                // Esto es parte de la funcionalidad de Laravel para manejar los
                // métodos HTTP que no son nativos de los formularios HTML.

                // Para enviar solicitudes PUT, PATCH, o DELETE, Laravel utiliza un campo
                // oculto llamado _method que especifica el método HTTP real que se
                // debe usar.

                // @method("DELETE") genera este campo oculto con el valor DELETE,
                // permitiendo que el formulario simule una solicitud de eliminación.
                form.method = 'POST'
                // DELETE          students/{student} .................. students.destroy
                // /students/${id} mas @csrf @method("DELETE")
                // manda al metodo destroy del controlador

                // establece la acción del formulario. Este es el endpoint al que se
                // enviará la solicitud, utilizando el id del estudiante para apuntar
                // al recurso correcto.

                // onclick="confirmDelete('{{ $student->id }}')
                // el id se lo pasa el boton de eliminar $student->id
                form.action = `/students/${id}`
                // añade los campos CSRF y DELETE necesarios para la solicitud. 
                // @csrf genera un token CSRF para proteger contra ataques CSRF, 
                // y @method("DELETE") se utiliza para simular una solicitud DELETE.
                form.innerHTML = '@csrf @method("DELETE")'
                // añade el formulario al cuerpo del documento.
                document.body.appendChild(form)
                // envía el formulario al servidor, donde se procesará la solicitud 
                // de eliminación.

                // Este formulario solo contiene los campos necesarios para que Laravel
                // pueda procesar la solicitud de eliminación

                // El formulario dinámico contiene solo dos campos
                // CSRF Token (@csrf) y Método HTTP (_method) (@method("DELETE"))
                // se envian esos campos en el body de la URL /students/${id}
                // se envían en el cuerpo de la solicitud HTTP cuando se envía
                // el formulario. 
                form.submit()

                // La combinación de los campos CSRF y el método DELETE ayuda a asegurar
                // la solicitud y simular una solicitud DELETE usando POST, que es
                // una limitación de los formularios HTML estándar.

                // Al enviarse el formulario, se realiza una solicitud HTTP al servidor
                // para eliminar el estudiante con el ID especificado. Laravel procesa
                // esta solicitud basándose en los datos recibidos (el token CSRF y el 
                // método DELETE) y elimina el registro correspondiente de la base de datos.
            }else{
                return false
            }
        })
    }
</script>