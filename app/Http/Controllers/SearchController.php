<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        header("Access-Control-Allow-Origin: *");  //CORS
        header("Access-Control-Allow-Headers: Origin, X-Requested-With");
        $item = ['data'=>true];
        //  $data = response()->json($item);
        return $item;
    }
    public function poat(){
        //  header("Access-Control-Allow-Origin: *");  //CORS
        // header('Access-Control-Allow-Methods', '*');
        // header('Access-Control-Allow-Headers', 'Authorization, X-Requested-With,X-CSRF-Token,X-XSRF-TOKEN');
        // header("Access-Control-Allow-Headers: Origin, X-Requested-With");
        // header('Access-Control-Allow-Headers', 'Origin, Accept, Content-Type, X-Requested-With');
        // header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        // header('Access-Control-Allow-Headers', 'Content-Type');
        // header('Content-type: application/json; charset=UTF-8');
        // header('content-Type', "");
        header('Cache-Control: no-cache');
        header('Content-Type:" "');
        header('Content-Length: '.strlen($json));
        $item = ['data'=>true];
        return $item;
        exit();
    }
}
