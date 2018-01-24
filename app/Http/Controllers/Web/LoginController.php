<?php

namespace Clin\Http\Controllers\Web;

use Illuminate\Http\Request;
use Clin\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {

        return view('user.login');
    }

    public function store()
    {

        return view('user.store');
    }

}
