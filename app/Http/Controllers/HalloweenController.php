<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalloweenController extends Controller
{
    /**
     * Exibe a página da história do Halloween
     */
    public function history()
    {
        return view('halloween-history');
    }
}