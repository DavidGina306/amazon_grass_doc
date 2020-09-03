<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empregado extends Model
{
    protected $table = 'PCEMPR';
    public function getAuthPassword()
    {
        $senha =  DB::select("SELECT decrypt (senhabd, usuariobd) AS SENHABD2 FROM PCEMPR  WHERE NOME_GUERRA = '".$this->nome_guerra."'")[0];
        return $senha->senhabd2;
    }
    /**
   * Overrides the method to ignore the remember token.
   */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }
}
