<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class User extends Model
{

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public static function createItem($data)
    {
        $user = User::create($data);

        return $user;
    }

    public static function findByEmail($email)
    {
        $user = User::where('email', $email)->firstOrFail();

        return $user->toArray();
    }

    public static function getItemByEmail($email, $password)
    {
        $user = User::where('email', $email)->where('password', bcrypt($password))->firstOrFail();

        return $user;
    }

    public static function getItemByUsername($username, $password)
    {
        $user = User::where('username', $username)->firstOrFail();
//        var_dump($user->password);
        if (Hash::check($password, $user->password)) {
            return $user;
        }

        throw new ModelNotFoundException();
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['username'] = $value;
        $this->attributes['email'] = $value;
    }

    public function setRoleAttribute($value)
    {
        if ($value != User::ROLE_ADMIN && $value != User::ROLE_USER) {
            throw new BadRequestHttpException();
        }
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
