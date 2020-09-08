<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class EmpregadoController extends DefaultLoginController
{
    protected $redirectTo = 'home';
    public function __construct()
    {
        $this->middleware('guest:empregado')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function username()
    {
        return 'nome_guerra';
    }
    protected function guard()
    {
        return Auth::guard('empregado');
    }
}
