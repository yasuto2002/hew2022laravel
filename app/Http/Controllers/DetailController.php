<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DetailController extends Controller
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
            $property = DB::table('properties')->where('id',$request->number)->first();
            $images = DB::table('images')->where('properties_id',$request->number)->get();
            $count = DB::table('goods')->where('id',$request->number)->count();
            $flg = false;
            if($request->umaile != "null"){
            $Uid = DB::table('users')->select('id')->where('mail_address',$request->umaile)->first();

            $flg = DB::table('goods')->where('id',$request->number)->where('users_id',$Uid->id)->exists();
            }
            DB::commit();
            return ['detail'=>$property,'images'=>$images,'count'=>$count,'state'=>true,'flg'=>$flg];
        }catch(\Exception $e){
            DB::commit();
            $flg = ['state'=>false];
            return $flg;
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
