<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExpedicaoService
{

    public static function getPedidosFilial($request)
    {
        try {
            return [
                'status' => true,
                'data' => DB::select(" select
                numped,
                data,
                codfilial,
                posicao,
                obsfretenf3,
                materialdeconstrucao
                from pcpedc
                where
                POSICAO != 'F' AND
                materialdeconstrucao = 'N' AND
                CONDVENDA = 8 AND
                CODFILIAL = ".$request->filial." AND
                NUMPED = ".(int) $request->pedido."
                "),
                'msg' => 'Sucesso!'
            ];
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return [
                'status' => false,
                'data' => [],
                'msg' => 'Erro ao buscar pedido'
            ];
        }
    }

    public static function updatePedido($request)
    {
        try {
            return [
                'status' => true,
                'data' => DB::table('pcpedc')
                ->where('POSICAO','<>', 'F')
                ->where('materialdeconstrucao', 'N')
                ->where('CONDVENDA', 8)
                ->where('CODFILIAL', $request->filial)
                ->where('NUMPED', $request->pedido)->update([
                    'materialdeconstrucao' => 'S'
                ]),
                'msg' => 'Sucesso!'
            ];
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return [
                'status' => false,
                'data' => [],
                'msg' => 'Erro ao buscar pedido'
            ];
        }
    }
}
