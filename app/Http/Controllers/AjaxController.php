<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ajax($num){
        switch($num){
            case '1':
                return '1';
                break;
            default:
                dd('Default');
                break;
        }
    }
}
