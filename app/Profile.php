<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Profile extends Model
{
    protected $table = 'profile';
    protected $primarykey = 'id';
    public function insert($data){
       return DB::table($this->table)
           ->insert($data);
    }
    public function getallprofile(){
        return DB::table($this->table)
            ->get();
    }
}
