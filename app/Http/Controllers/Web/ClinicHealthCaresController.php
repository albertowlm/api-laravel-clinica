<?php

namespace Clin\Http\Controllers\Web;

use Illuminate\Http\Request;
use Clin\Http\Controllers\Controller;

class ClinicHealthCaresController extends Controller
{
    public function index()
    {
        return view('clinic-health-care.list');
    }
    public function store()
    {
        return view('clinic-health-care.store');
    }

}
