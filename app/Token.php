<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    protected $appends = ['is_right'];
    protected $fillable = ['id', 'user_id', 'token', 'user_ip', 'created_at', 'last_access_at',];

    public $timestamps = false;

    //定义访问器
    public function getUserIpAttribute($value)
    {
        return implode(explode(',', $value), '.');
    }

    public function getIsRightAttribute()
    {
        return $this->attributes['user_id'] == 1;
    }

    //定义修改器
    public function setUserIpAttribute($value)
    {
        $this->attributes['user_ip'] = implode(explode('.', $value), ',');
    }
}
