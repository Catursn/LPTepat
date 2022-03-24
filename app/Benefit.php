<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $primaryKey = 'id_benefits';
    protected $table = "benefits";
    protected $fillable = 
    ['id_benefits', 'foto','caption'];
}
