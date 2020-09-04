<?php

namespace App;

use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Crypt;

class Empregado extends Authenticatable
{
    protected $guarded = [] ;
    protected $primaryKey = 'MATRICULA';
    protected $table = 'PCEMPR';
    protected $guard = 'empregado';

    public function getAuthIdentifier()
    {
        return $this->matricula;
    }

    public function getAuthPassword()
    {
        return $this->senhabd;
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
