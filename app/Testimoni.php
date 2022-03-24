<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $primaryKey = 'id_testimonis';
    protected $table = "testimonis";
    protected $fillable = 
    ['id_testimonis', 'testi','nama','perusahaan'];
}
