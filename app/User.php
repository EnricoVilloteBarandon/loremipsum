<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Illuminate\Support\Facades\Redirect;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table = 'users';
    public function insert($data){
        $insert = new User();
        $insert->firstname = $data['firstname'];
        $insert->lastname = $data['lastname'];
        $insert->user_type = $data['user_type'];
        $insert->email = $data['email'];
        $insert->password = bcrypt($data['password']);
        $insert->save();
    }
    public static function checkusertype($id){
        $checkuser = User::where('id',$id)->first();
        if($checkuser->user_type == 1){
            return '/first/dashboard';
        }elseif($checkuser->user_type == 2){
            return '/second/dashboard';
        }elseif($checkuser->user_type == 3){
            return '/third/dashboard';
        }
    }
    public function searchkeyword($keyword){
        return DB::table($this->table)
            ->where('id','!=',NULL)
            ->where('firstname','like','%'.$keyword.'%')
            ->orWhere('lastname','like','%'.$keyword.'%')
            ->get();
    }
}
