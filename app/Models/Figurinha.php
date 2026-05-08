<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Figurinha extends Model
{
    protected $fillable = ['nome', 'pais', 'numero', 'time', 'imagem'];
}
