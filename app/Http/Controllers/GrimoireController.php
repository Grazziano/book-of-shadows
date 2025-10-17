<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrimoireController extends Controller
{
    public function spells()
    {
        return view('grimoire.spells');
    }

    public function rituals()
    {
        return view('grimoire.rituals');
    }

    public function herbology()
    {
        return view('grimoire.herbology');
    }

    public function create()
    {
        return view('grimoire.create');
    }
}
