<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $user  = DB::table('users')->where('mail_address',$request->mail_address)->first();
            $Uid = DB::table('users')->select('id')->where('mail_address',$request->mail_address)->first();
            $first = DB::table('properties')->join('goods', 'properties.id', '=', 'goods.id')->select('properties.*')->where('users_id',$Uid->id)->first();
            $point = DB::table('game_histories')->where('users_id',$user->id)->sum('earned_points');
            $Buy = DB::table('properties')->join('purchase_histories', 'properties.id', '=', 'purchase_histories.properties_id')->select('properties.*')->where('mail_address',$request->mail_address)->first();
            return ['status'=>true,'user' => $user,'point'=>$point,'first'=>$first,'buy'=>$Buy];
        }catch(\Exception $e){
            return ['status'=>$e->getMessage(),'user' => null,'point'=>null,'first'=>null];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
