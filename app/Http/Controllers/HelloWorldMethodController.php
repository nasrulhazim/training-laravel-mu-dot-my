<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldMethodController extends Controller
{
    public function show()
    {
        return 'hello world from method';
    }
}
