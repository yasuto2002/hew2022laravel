<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FavoritesController extends Controller
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
        //
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
                        $Uid = DB::table('users')->select('id')->where('mail_address',$request->mail_address)->first();
            $properties = DB::table('properties')->join('goods', 'properties.id', '=', 'goods.id')->select('properties.*')->where('users_id',$Uid->id)->where('view_flg', null)->skip($request->skip)->take(4)->get();

            $count = DB::table('properties')->join('goods', 'properties.id', '=', 'goods.id')->select('properties.*')->where('users_id',$Uid->id)->where('view_flg', null)->count();
            $ret = ['state'=>true,'properties'=>$properties,'count'=>$count];
            DB::commit();
            return $ret;
        }catch(\Exception $e){
            DB::commit();
            $ret = ['state'=>false,'properties'=>$e->getMessage()];
            return $ret;
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
