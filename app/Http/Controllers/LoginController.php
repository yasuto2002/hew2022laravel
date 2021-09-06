<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    function index(Request $request){
        return view('adminlog');
    }
    function post(Request $request){
        if($request->name != null && $request->pas != null){
        $data = ['id' => $request->name];
        $items = DB::select('select * from managers where id = :id',$data);
        if($items[0]->password == $request->pas){
            return view('welcome');
        }

        return view('adminlog',['items' => $items]);
        } else{
            return view('welcome');
        }
    }

}
