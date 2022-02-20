<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GpsSerchController extends Controller
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
            $jump = ($request->page -1) * 4;
            $param=[
                'LATITUDE' => $request->latitude,
                'LONGITUDE' => $request->longitude,
                'LATITUDE2' => $request->latitude,
                'JUMP'=>$jump
            ];
            $properties=DB::select('SELECT * FROM `properties` b where name in (SELECT name from properties a WHERE 1 > 6371 * ACOS(
            COS(RADIANS(:LATITUDE)) * COS(RADIANS(a.LATITUDE)) * COS(RADIANS(a.LONGITUDE) - RADIANS(:LONGITUDE))
            + SIN(RADIANS(:LATITUDE2)) * SIN(RADIANS(a.LATITUDE))
            )) LIMIT 4 OFFSET :JUMP',$param);
            $count=DB::select('SELECT count(*)as count FROM `properties` b where name in (SELECT name from properties a WHERE 1 > 6371 * ACOS(
            COS(RADIANS(:LATITUDE)) * COS(RADIANS(a.LATITUDE)) * COS(RADIANS(a.LONGITUDE) - RADIANS(:LONGITUDE))
            + SIN(RADIANS(:LATITUDE2)) * SIN(RADIANS(a.LATITUDE))
            )) LIMIT 4 OFFSET :JUMP',$param);
    //             $properties=DB::select('SELECT * FROM `properties` b where name in (SELECT name from properties a WHERE 1 > 6371 * ACOS(
    //   COS(RADIANS(35.663729)) * COS(RADIANS(a.LATITUDE)) * COS(RADIANS(a.LONGITUDE) - RADIANS(139.744047))
    //    + SIN(RADIANS(35.663729)) * SIN(RADIANS(a.LATITUDE))
    // ))');
            DB::commit();
            $ret = ['properties'=>$properties,'state'=>true,'count'=>$count];
            return $ret;
        }catch(\Exception $e){
            DB::commit();
            $ret = ['properties'=>null,'state'=>false,'count'=>null];
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
