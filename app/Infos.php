<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infos extends Model
{
    //数组转换字段
    protected $casts = [
        'infos' => 'array',
    ];
}
