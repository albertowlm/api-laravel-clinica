<?php

namespace Clin\Http\Controllers\Web;

use Illuminate\Http\Request;
use Clin\Http\Controllers\Controller;

class ClinicsController extends Controller
{
    public function index()
    {
        return view('clinic.list');
    }
    public function store()
    {
        return view('clinic.store');
    }
    public function update()
    {
        return view('clinic.update');
    }
}
