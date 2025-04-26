<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data['settingData'] = getSettingsData();
        return view('frontend.home',$data);
    }
}
