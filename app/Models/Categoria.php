<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    use HasFactory;
    
    public $table = 'categorias';
    protected $fillable = ['categoria_name'];

    public function ongs(){
        return $this->belongsToMany(Ong::class);
    }
}