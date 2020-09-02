<?php

namespace App\Http\Controllers;

use App\Services\ExpedicaoService;
use Illuminate\Http\Request;

class ExpedicaoController extends Controller
{
    public function getPedidosFilial(Request $request)
    {
        $result = ExpedicaoService::getPedidosFilial($request);
        return response()->json($result, $result['status'] ? 200: 500);
    }

    public function updatePedido(Request $request)
    {
        $result = ExpedicaoService::updatePedido($request);
        return response()->json($result, $result['status'] ? 200: 500);
    }
}
