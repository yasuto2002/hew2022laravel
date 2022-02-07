<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthenController extends Controller
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
            $user = DB::table('tentative_users')->select('password', 'name','security_code','sex','birthday','kname')->where('mail_address',$request->maile)->where('security_code',$request->security_code)->get();
            if($user[0]->security_code == $request->security_code){
                $param=[
                    'name' => $user[0]->name,
                    'mail_address' => $request->maile,
                    'password' => $user[0]->password,
                    'sex' => $user[0]->sex,
                    'kname' => $user[0]->kname,
                    'birthday' => $user[0]->birthday,
                ];
                DB::table('users')->insert($param);
            }
            DB::commit();
            $ret = ['state'=>true];
            return $ret;
        }catch(\Exception $e){
            DB::commit();
            $ret = ['state'=>false];
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
