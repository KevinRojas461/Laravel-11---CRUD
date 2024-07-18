<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // para mostrar todos los registros "GET"
    public function index()
    {
        // hacer uso del modelo Student y vamos a usar el metodo all
        // para traer todos los registros
        // y todo se lo vamos a signar a la variable students
        $students = Student::all();

        // vevolver el resultado en una vista
        // -------al poner view ya sabe tiene que buscar en "resources > views"
        // entonces solo nos queda especificar el nombre de la carpeta de modelo
        // y el archivo (students.index)

        // compact('students') => mandar a index la variable $students
        // con todos los registros
        // compact pasar variables (la var es una lista) a vistas

        return view('students.index', compact('students'));

        // alternativa a compact
        // se manda 'students' y a 'students' se le asigna $students
        // return view('students.index')->with('students', $students);

        // alternativa a compact
        // se manda 'students' y a 'students' se le asigna $students
        // return view('students.index', ['students'=>$students]);
    }

    // crear pero en general nos lleva a una vista donde
    // va a estar el formulario para crear registros

    // se utiliza para mostrar un formulario donde los usuarios pueden ingresar
    // los datos necesarios para crear un nuevo recurso. Este método no realiza
    // ninguna operación de almacenamiento en la base de datos; simplemente
    // muestra la vista del formulario
    public function create()
    {
        // es a donde vamos a referenciar a la vista que va tener el formulario

        // por lo tanto solo va a devolver una vista

        // -------- Con view se hace referencia a la carpeta
        // resources > views > students y al erchivo
        // en este caso creare.blade.php
        return view('students.create');
    }

    // Guardar

    // se encarga de manejar la solicitud "POST" que envía el formulario
    // de creación. Este método valida los datos de entrada y luego crea un nuevo
    // registro en la base de datos con esos datos.
    public function store(Request $request)
    {
        // validar los campos con $request
        $request->validate([
            // required que sea obligatorio, que sea de tipo string,
            // min:5 que minimo tenga 5 caracteres
            // y max: 100 que no se pase de 100 caracteres 
            'name' => 'required|string|min:5|max:100',
            // una edad con min:1 cualquier número entero mayor o igual a 1
            'age' => 'required|integer|min:5'
        ]);

        // modelo Student y metodo create
        // request->all() trae todo los valores/campos que envia el formulario
        // y se le adina el objeto a Student (Student::) para que se guarde
        // con el metodo "create" (que es diferente al del controlador)
        // o diferente a function create()
        Student::create($request->all());

        // redireccionar hacia la tabla
        return redirect()->route('students.index');
    }

    // para mostrar un recurso específico, como un registro de base de datos.
    public function show($id)
    {
        //
    }

    // El método edit se utiliza para mostrar un formulario donde los usuarios 
    // pueden editar los datos de un recurso existente. Este método obtiene el 
    // recurso que se va a editar y pasa los datos a una vista que contiene
    // el formulario de edición.
    public function edit($id)
    {
        // se busca el registro que se quiere actualizar
        // y cuando lo encintre se guarda el registro en la variable student
        // para que luego el usurio pueda ver los datos y actualizar
        // el/los dato o dato
        $student = Student::findOrFail($id);

        // -------- Con view se hace referencia a la carpeta
        // resources > views > students y al erchivo
        // en este caso edit.blade.php
        
        // necesitamso pasarle todos los datos de registro seleccionado
        // para que el usu vea los datos del registro que quiera actualizar
        // en el formulario/vista de actualizar/edit.blade.php
        return view('students.edit', compact('student'));
    }

    // El método update se encarga de manejar
    // (generalmente un método HTTP PUT o PATCH) 
    // que envía el formulario de edición. Este método valida 
    // los datos de entrada y luego actualiza el recurso existente en 
    // la base de datos con esos datos.
    public function update(Request $request, $id)
    {
        // validar los campos con $request
        $request->validate([
            // required que sea obligatorio, que sea de tipo string,
            // min:5 que minimo tenga 5 caracteres
            // y max: 100 que no se pase de 100 caracteres 
            'name' => 'required|string|min:5|max:100',
            // una edad con min:1 cualquier número entero mayor o igual a 1
            'age' => 'required|integer|min:5'
        ]);

        // modelo Student y metodo update
        // request->all() trae todo los valores/campos que envia el formulario
        // y se le adina el objeto a Student (Student::) para que se actualice
        // con el metodo "update" (que es diferente al del controlador)
        // o diferente a function edit()
        // validar los campos con $request
        $request->validate([
            // required que sea obligatorio, que sea de tipo string,
            // min:5 que minimo tenga 5 caracteres
            // y max: 100 que no se pase de 100 caracteres 
            'name' => 'required|string|min:5|max:100',
            // una edad con min:1 cualquier número entero mayor o igual a 1
            'age' => 'required|integer|min:5'
        ]);

        // primero vamos a buscar el registro que se quiere actualizar
        $student = Student::findOrFail($id);

        // modelo Student y metodo update
        // request->all() trae todo los valores/"campos" que envia el formulario
        // name y age que puso y envio el usu
        // y se le adina el objeto a Student (Student::) para que se actualicé
        // con el metodo "update" (que es diferente al del controlador)
        // o diferente a function edit()

        // student los datos antiguos
        // $request->all() los datos nuevos
        // se esta sobreescribiendo/actualizando el registro 
        $student->update($request->all());

        // redireccionar hacia la tabla
        return redirect()->route('students.index');

        // redireccionar hacia la tabla
        return redirect()->route('students.index');
    }

    // eliminar registros
    public function destroy($id)
    {
        // se busca el registro que se quiere eliminar
        // y cuando lo encintre se guarda el registro en la variable student
        $student = Student::findOrFail($id);

        // se elimina el registro que se quiere eliminar usando el metodo delete
        $student->delete();

        // se refresca/actualiza la pagina/tabla luego de eliminar
        return redirect()->route('students.index');
    }
}
