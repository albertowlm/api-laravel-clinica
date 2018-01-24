<?php

namespace Clin\Http\Controllers\Web;

use Illuminate\Http\Request;
use Clin\Http\Controllers\Controller;

class HealthCaresController extends Controller
{
    public function index()
    {
        return view('health-care.list');
    }
    public function store()
    {
        return view('health-care.store');
    }
    public function update()
    {
        return view('health-care.update');
    }
}
