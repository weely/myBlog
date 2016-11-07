<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infos;
use App\Http\Requests;

class InfosController extends Controller
{

    public function index()
    {
        $infos = new Infos();
        $infos->user_id = 1;
        $ins['fruits'] = "apple";
        $infos->infos = $ins;
        $infos->save();
        dd($infos);
    }
}
