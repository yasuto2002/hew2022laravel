<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\LogRequest;
use Illuminate\Support\Facades\Storage;

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
            $data = ['maile' => $request->maile];
            $counter = DB::table('managers')->where('maile',$data)->count();
            if($counter != 0){
                $items = DB::select('select * from managers where maile = :maile',$data);
                if($items[0]->password == $request->pas){
                    $request->session()->put('managers_id',$request->maile);
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
