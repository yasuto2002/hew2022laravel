<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\LogRequest;

class LoginController extends Controller
{
    //
    function index(Request $request){
        if ($request->session()->exists('managers_id')) {
            $request->session()->forget('managers_id');
            return view('admin.home');
        }
        return view('admin.adminlog');
    }

    function post(LogRequest $request){
            $data = ['id' => $request->id];
            $counter = DB::table('managers')->where('id',$data)->count();
            if($counter != 0){
                $items = DB::select('select * from managers where id = :id',$data);
                if($items[0]->password == $request->pas){
                    $request->session()->put('managers_id',$request->id);
                    return view('admin.home');
                }

                return view('admin.adminlog',['items' => 'ログインできませんでした' ]);
             }else{
            return view('admin.adminlog',['items' => 'ログインできませんでした']);
            }
    }
    function home(Request $request){
        if ($request->session()->exists('managers_id')){
            return view('admin.home');
        }
         return view('admin.adminlog');
    }

}
