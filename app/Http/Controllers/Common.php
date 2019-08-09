<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 8/1/19
 * Time: 6:17 PM
 */

namespace App\Http\Controllers;


use App\Exceptions\NoItemInRequestException;
use Illuminate\Http\Request;

trait Common
{

    public static function getRequestItems(Request $request, $keys)
    {
        $keys = array_intersect($request->keys(), $keys);
        if ($keys) {
            $data = $request->all($keys);
        } else {
            $data = [];
            throw new NoItemInRequestException();
        }

        return $data;
    }

}