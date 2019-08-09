<?php

namespace App\Http\Controllers;

use App\Code;
use App\User;
use App\UserCode;
use App\Helper\CharConvertor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Morilog\Jalali\Jalalian;

class VerificationController extends Controller
{
    public function verify(Request $request, $email)
    {
        $user = User::findByEmail($email);

        $code = $request->input('code');
        $verification = $request->input('verification');

        $code = Code::findByCode($code);

        $user_codes = UserCode::search($email, $code, $verification);

        if ($user_codes) {
            return new JsonResponse([
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => trans('messages.custom.error.used_code', [
                    'time' => $user_codes['created_at']
                ])
            ]);
        }

        UserCode::createItem($user['id'], $code['id']);

        return new JsonResponse([
            'message' => trans('messages.custom.success.ok_validation')
        ]);
    }

    public static function getItems(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        if ($from_date) {
            $from_date = urldecode($from_date);
            $from_date = CharConvertor::convertNumber($from_date);
            $from_date = Jalalian::fromFormat('Y/m/d  H:i:s', $from_date);
            $from_date = $from_date->toCarbon()->format('Y-m-d H:i:s');
        }

        if ($to_date) {
            $to_date = urldecode($to_date);
            $to_date = CharConvertor::convertNumber($to_date);
            $to_date = Jalalian::fromFormat('Y/m/d  H:i:s', $to_date);
            $to_date = $to_date->toCarbon()->format('Y-m-d H:i:s');
        }

        return new JsonResponse([
            'data' => UserCode::searchByDate($from_date, $to_date)
        ]);
    }
}
