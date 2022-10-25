<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Ong;
use App\Notifications\ResetPassword; 

class Usuario extends Authenticatable
{
    use HasFactory;
    use \Illuminate\Notifications\Notifiable;

    // Enviar email traduziado
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    protected $fillable = ['nome', 'sobrenome', 'user_image', 'email', 'cidade', 'estado', 'cep', 'datanasc', 'cpf', 'password'];

    public function categorias(){
        return $this->belongsToMany(Categoria::class);
    }
    public function ongs(){
        return $this->belongsToMany(Ong::class);
    }
}