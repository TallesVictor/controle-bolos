<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Emails extends Model
{
    use HasFactory;
    protected $table = "emails";
    protected $fillable = ['id', 'nome', 'email', 'bolo_id'];

 
}
