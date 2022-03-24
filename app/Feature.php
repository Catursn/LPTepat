<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $primaryKey = 'id_features';
    protected $table = "features";
    protected $fillable = 
    ['id_features', 'feature'];
}
