<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bolos extends Model
{
    use HasFactory;

    protected  $table = "bolos";
    protected  $fillable = ["id", "nome", "peso", "valor", "quantidade", "created_at", "updated_at"];

    public function index()
    {
        return Bolos::all();
    }
    public function emailsBolos()
    {

        return DB::select('SELECT b.quantidade, b.id AS bolo_id, e.id AS email_id FROM emails e JOIN bolos b ON e.bolo_id = b.id WHERE b.quantidade > 0');
    }
}
