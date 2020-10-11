<?php

namespace App\Http\Controllers;

use App\Support\View;
use App\Support\RequestInput;

class WelcomeController
{
    
    public function index(View $view)
    {
        $app_name = env('App_Name');
        $name     = 'Welcome';
        $slogan   = env('App_Slogan');

        return $view('landing', compact('app_name', 'name', 'slogan'));
    }

}
