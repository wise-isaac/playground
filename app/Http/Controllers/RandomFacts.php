<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class RandomFactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Http::get('https://api.chucknorris.io/jokes/random');
    }
}
