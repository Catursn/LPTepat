<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'id_clients';
    protected $table = "clients";
    protected $fillable = 
    ['id_clients', 'foto','link'];
}
