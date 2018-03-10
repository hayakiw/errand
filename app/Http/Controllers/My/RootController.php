<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RootController extends Controller
{
    public function index()
    {
        return view('root.index');
    }
}
