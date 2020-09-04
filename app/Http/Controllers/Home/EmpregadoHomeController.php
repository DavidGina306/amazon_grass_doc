<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
class EmpregadoHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('welcome')->with(
            [
                'user' => [
                    'nome' =>  ucfirst(Str::lower($user->nome_guerra)),
                    'matricula' => $user->matricula
                ]
            ]
        );
    }
}
