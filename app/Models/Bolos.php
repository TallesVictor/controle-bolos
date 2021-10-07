<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolos extends Model
{
    use HasFactory;

    protected  $table = "bolos";
    protected  $fillable = ["id", "nome", "peso", "valor", "quantidade", "created_at", "updated_at"];

    public function index(){
        Bolos::all();
    }

}
