<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Categoria;
use App\Models\Usuario;

class Ong extends Authenticatable
{
    
    use HasFactory;
    
    public $table = 'ongs';
    protected $fillable = ['cnpj', 'ong_name', 'ong_image', 'ong_photo', 'owner', 'description', 'ong_city', 'ong_state', 'ong_cep', 'password'];

    public function categorias(){
        return $this->belongsToMany(Categoria::class);
    }

    public function usuarios(){
        return $this->belongsToMany(Usuario::class);
    }
}

