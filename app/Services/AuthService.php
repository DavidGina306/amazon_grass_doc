<?php

namespace App\Services;

use Illuminate\Http\Request;

class AuthService
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getPedidosFilial(Request $request)
    {

    }

    public function updatePedido(Request $request)
    {

    }
}
