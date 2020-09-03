<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpregadoHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:empregado');
    }
    public function index()
    {
        return view('welcome');
    }
}
