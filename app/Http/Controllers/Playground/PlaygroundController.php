<?php

namespace App\Http\Controllers\Playground;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PlaygroundController extends Controller
{
    public function show()
    {
        return Inertia::render('Home');
    }
}
