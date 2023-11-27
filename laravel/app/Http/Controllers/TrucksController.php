<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrucksController extends Controller
{
    public function index()
    {
        return view('trucks.index');
    }

    public function create()
    {
        return view('trucks.add');
    }

    public function edit()
    {
        return view('trucks.edit');
    }
}
