<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $guarded = [];

    public static function createItem($data)
    {
        $code = Code::create($data);

        return $code;
    }

    public static function findByCode($code)
    {
        $code = Code::where('code', $code)->firstOrFail();

        return $code->toArray();
    }
}
