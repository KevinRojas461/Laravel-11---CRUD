<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // el modelo student tiene dos campos especificados
    // en el array/lista fillable
    // eso quiere decir que solo esos dos campos pueden ser asignados en masa

    // si intentamos asignar en masa otros campos que no esten el el array/lsita
    // Laravel generara una excepción para indicar que la asignacion maxiva
    // no esta permitida para esos campos

    // establecer valores de atributos que no deberían ser modificables,
    // como permisos de usuario o estados de cuenta.

    // ---Cuando creas un nuevo registro con asignación masiva, puedes 
    // pasar un array de datos al método "create" del modelo.
    // Si intentas incluir un campo que no 
    // está permitido (por ejemplo, un campo que no esté en $fillable o que
    // esté en $guarded), Laravel ignorará ese campo y no lo asignará al modelo.

    // Esto es crucial para evitar vulnerabilidades en tu aplicación que puedan ser
    // explotadas mediante la modificación de "datos sensibles".
    protected $fillable = ['name', 'age'];

    // el simbolo $ indica que fillable es una propiedad de la clase student
    // en php el $ idica variables o propiedades

    // protected significa que solo es  dentro de la clase student
    // y las clases que heredan de ella
}
