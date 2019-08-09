<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

class UserCode extends Model
{
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('user_codes.created_at', 'desc');
        });
    }

    public static function createItem($user_id, $code_id)
    {
        $user_code = UserCode::create([
            'user_id' => $user_id,
            'code_id' => $code_id
        ]);

        return $user_code;
    }

    public static function search($email, $code, $verification)
    {
        $user_codes = UserCode::join('users', 'users.id', '=', 'user_codes.user_id')
            ->join('codes', 'codes.id', '=', 'user_codes.code_id')
            ->where('email', $email)
            ->where('verification', $verification)
            ->first();

        if ($user_codes) {
            return $user_codes->toArray();
        }
        return [];
    }

    public static function searchByDate($from_date = '', $to_date = '')
    {
        $user_codes = UserCode::join('users', 'users.id', '=', 'user_codes.user_id')
            ->join('codes', 'codes.id', '=', 'user_codes.code_id');

        if ($from_date) {
            $user_codes = $user_codes->where('user_codes.created_at', '>', $from_date);
        }

        if ($to_date) {
            $user_codes = $user_codes->where('user_codes.created_at', '<', $to_date);
        }

        if ($user_codes) {
            return $user_codes->get(DB::raw('user_codes.*, users.email, users.firstname, users.lastname'))->toArray();
        }
        return [];
    }

    public function getCreatedAtAttribute($value)
    {
        return Jalalian::fromCarbon(Carbon::createFromTimeString($value))->toString();
    }
}
