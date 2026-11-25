<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;

#[Fillable(['num_documento', 'telefono', 'nombre', 'apellidos', 'correo', 'fecha_nacimiento', 'edad', 'num_ficha', 'id_apoyo', 'id_acudiente', 'password'])]
#[Hidden(['password', 'remember_token'])]
class Aprendiz extends Authenticatable
{
    use Notifiable;

    // Le decimos a Laravel el nombre exacto de la tabla en phpMyAdmin
    protected $table = 'aprendiz';

    // Le decimos que la llave primaria es num_documento y NO es autoincremental
    protected $primaryKey = 'num_documento';
    public $incrementing = false;
    protected $keyType = 'int';

    // Encriptación automática de contraseña (Laravel 12)
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}