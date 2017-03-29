<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class CaptchaController extends Controller
{

    public function captcha($tmp)
    {
        $builder = new CaptchaBuilder;
        $builder->build($width = 100, $height = 40, $font = null);
        $phrase = $builder->getPhrase();

        Session::put('milkcaptcha', $phrase);
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
}
