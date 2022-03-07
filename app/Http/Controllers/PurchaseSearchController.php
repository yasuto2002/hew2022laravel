<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PurchaseSearchController extends Controller
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
            $first = DB::table('properties')->join('purchase_histories', 'properties.id', '=', 'purchase_histories.properties_id')->select('properties.*')->where('purchase_histories.mail_address',$request->mail_address)->where('purchase_histories.search_password',$request->number)->first();
            if($first != null){
            $buy = DB::table('purchase_histories')->where('purchase_histories.mail_address',$request->mail_address)->where('purchase_histories.search_password',$request->number)->first();
            return ['status'=>true,'first'=>$first,'buy'=>$buy];
            }else{
                return ['status'=>false,'first'=>null];
            }
        }catch(\Exception $e){
            return ['status'=>false,'first'=>null];
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
