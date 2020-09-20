<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class LevelAccount implements CastsAttributes
{
    const  ADMIN = 0;
    const  SEKRETARIAT = 1;
    const  MAHASISWA = 2;
    /**
     * Cast the given value.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        return $value;
    }

    public static function lang($level)
    {
        if ($level == LevelAccount::ADMIN){
            return "Admninistrator";
        }elseif ($level == LevelAccount::SEKRETARIAT){
            return "Sekretariat";
        }elseif ($level == LevelAccount::MAHASISWA){
            return "Mahasiswa";
        }else{
            return  FALSE;
        }
    }

    public static function redirect()
    {
        return route("dashboard");
    }

}
