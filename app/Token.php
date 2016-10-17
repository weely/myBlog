<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    protected $fillable = ['id', 'user_id', 'token', 'user_ip','created_at','last_access_at',];

    public $timestamps = false;
}
