<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        header("Access-Control-Allow-Origin: *");  //CORS
        header('Access-Control-Allow-Methods', '*');
        header('Access-Control-Allow-Headers', 'Content-Type,Authorization, X-Requested-With,X-CSRF-Token,X-XSRF-TOKEN');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With");
        $item = ['data'=>$request->id];
        return $item;
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
        // header("Access-Control-Allow-Origin: *");  //CORS
        // header('Access-Control-Allow-Methods', '*');
        // header('Access-Control-Allow-Headers', 'Authorization, X-Requested-With,X-CSRF-Token,X-XSRF-TOKEN');
        // header("Access-Control-Allow-Headers: Origin, X-Requested-With");
        // header('Access-Control-Allow-Headers', 'Origin, Accept, Content-Type, X-Requested-With');
        // header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        // header('Access-Control-Allow-Headers', 'Content-Type');
        // header('Content-type: application/json; charset=UTF-8');
        $item = ['data'=>$request->id];
        return $item;
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
