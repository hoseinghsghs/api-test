<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class api_controller extends Controller
{
    protected function successResponce($data ,$message , $code){
        return [
                'status' =>$code,
                'message' => $message,
                'date' =>$data,
        ];
    }
}