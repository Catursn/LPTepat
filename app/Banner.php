<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $primaryKey = 'id_banners';
    protected $table = "banners";
    protected $fillable = 
    ['id_banners', 'foto','caption'];
}
