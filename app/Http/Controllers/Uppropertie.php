<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Uppropertie extends Controller
{
    public function index(){
        $file = Storage::get('public/json/station.json');
        $contentJson = json_decode($file, true);
        $stations = $contentJson[0];
        $room = $contentJson[1];
        $building_type = $contentJson[2];
        $construction = $contentJson[3];
       return view('admin.propertieup',compact('stations','room','building_type','construction'));
    }
    public function upload(Request $request){

       $validate_rule = [
            'name' => 'required',
            'trouble' => 'required',
            'price' => 'required|integer',
            'station' => 'required|integer',
            'construction_date' => 'required|date',
            'street_address' => 'required|String',
            'floor_plan' =>'required|integer',
            'building_type' => 'required|integer',
            'room_floor' =>'required|integer|digits_between:1,2',
            'management_fee' => 'required|integer',
            'station_walk' => 'required|integer',
            'physical_distance' => 'required|integer',
            'construction' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
        $this->validate($request,$validate_rule);




        // dd($request->file('file1'));
         $image = $request->file('image');
         $url = '';
      // バケットの`myprefix`フォルダへアップロード
      if($request->file('file1') != null){
        $path=Storage::disk('s3')->putFile('/hew', $request->file('file1'), 'public');
        $url = Storage::disk('s3')->url($path);
      }

        $param=[
            'name' => $request->name,
            'trouble' => $request->trouble,
            'price' => $request->price,
            'station_id' => $request->station,
            'construction_date' => $request->construction_date,
            'street_address' => $request->street_address,
            'floor_plan' => $request->floor_plan,
            'building_type' => $request->building_type,
            'room_floor' => $request->room_floor,
            'management_fee' => $request->management_fee,
            'station_walk' => $request->station_walk,
            'physical_distance' => $request->physical_distance,
            'construction' => $request->construction,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'remarks' => $request->remarks,
            'managers_id' => 1,
            'thumbnails' => $url

        ];
        $re=DB::table('properties')->insertGetId($param);
        // return view('admin/upload');
        if($request->file('file2') != null){
            $path2=Storage::disk('s3')->putFile('/hew', $request->file('file2'), 'public');
            $url = Storage::disk('s3')->url($path2);
            $param=[
                'properties_id' => $re,
                'file_path' => $url
            ];
            DB::table('images')->insert($param);
        }
        if($request->file('file3') != null){
            $path3=Storage::disk('s3')->putFile('/hew', $request->file('file3'), 'public');
            $url = Storage::disk('s3')->url($path3);
            $param=[
                'properties_id' => $re,
                'file_path' => $url
            ];
            DB::table('images')->insert($param);
        }
        if($request->file('file4') != null){
            $path4=Storage::disk('s3')->putFile('/hew', $request->file('file4'), 'public');
            $url = Storage::disk('s3')->url($path4);
            $param=[
                'properties_id' => $re,
                'file_path' => $url
            ];
            DB::table('images')->insert($param);
        }
        if($request->file('file5') != null){
            $path5=Storage::disk('s3')->putFile('/hew', $request->file('file5'), 'public');
            $url = Storage::disk('s3')->url($path5);
            $param=[
                'properties_id' => $re,
                'file_path' => $url
            ];
            DB::table('images')->insert($param);
        }
          return redirect('admin/upload');
    }
}
