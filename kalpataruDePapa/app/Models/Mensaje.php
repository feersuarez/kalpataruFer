<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{

    use HasFactory;

    protected $fillable =['mensajes'];
    public $timestamps = false;

    public function mensajes(){
        return $this->hasMany(Mensaje::class,'id');
    }
}
