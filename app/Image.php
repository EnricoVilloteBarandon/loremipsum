<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Image extends Model
{
    protected $table = 'image';
    public function saveimage($dataarray){
        return DB::table($this->table)
            ->insertGetId($dataarray);
    }
    public function getalldata(){
        return DB::table($this->table)
            ->get();
    }
}
