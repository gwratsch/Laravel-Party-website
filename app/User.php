<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function ParticipantUser(Request $request){
        $email = (isset($request->email) ) ? $request->email : '';
        $userinfo['email'] = $email;
        $userinfo['name'] = (isset($request->name) ) ? $request->name : substr($email, 0, strpos($email, '@'));
        $userinfo['password'] = (isset($request->password) ) ? $request->password : hash('sha256', 'password');
        $user = User::firstOrCreate($userinfo);
        return $user;
    }
}
