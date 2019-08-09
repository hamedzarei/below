<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use Common;

    private $_create_attributes = [
        'email', 'password', 'firstname', 'lastname', 'mobile', 'postalcode'
    ];

    public function createItem(Request $request)
    {
        $data = Common::getRequestItems($request, $this->_create_attributes);
        $data = array_merge($data, [
            'user_agent' => $request->header('user-agent'),
            'lat' => $request->input('lat'),
            'lon' => $request->input('lon'),
            'accuracy' => $request->input('accuracy')
        ]);

        User::createItem($data);

        return new JsonResponse([
            'message' => trans('messages.custom.'.Response::HTTP_CREATED)
        ]);
    }
}
