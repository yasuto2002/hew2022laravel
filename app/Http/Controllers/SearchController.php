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
    public function search(){
        return view('test.search');
    }
}
