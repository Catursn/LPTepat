<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $primaryKey = 'id_forms';
    protected $table = "forms";
    protected $fillable = 
    ['id_forms', 'nama', 'wa', 'email', 'perusahaan', 'pesan'];
}
