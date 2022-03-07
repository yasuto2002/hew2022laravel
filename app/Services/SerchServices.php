<?php

namespace App\Services;
use App\Property;
use Illuminate\Support\Facades\DB;
class SerchServices
{
  public static function serch($data){
    try{
      $items = Property::all()->where('view_flg', null)->pluck('id');
      $count = count($items);
      if($data->lower != "null"){
        $items= Property::LowerSerch($data->lower)->whereIn('id',$items)->pluck('id');
        $count = count($items);
      }
      if($data->upper != "null"){
        $items= Property::UpperSerch($data->upper)->whereIn('id',$items)->pluck('id');
        $count = count($items);
      }
      if($data->floor_plan != "null"){
        $items= Property::PlanSerch($data->floor_plan)->whereIn('id',$items)->pluck('id');
        $count = count($items);
      }
      if($data->building_type != "null"){
        $items= Property::Building_typeSerch($data->building_type)->whereIn('id',$items)->pluck('id');
        $count = count($items);
      }
      if($data->room_floor != "null"){
        if($data->room_floor != 4){
          $items= Property::RoomSerch($data->room_floor)->whereIn('id',$items)->pluck('id');
          $count = count($items);
        }else{
          $items= Property::UpRoomSerch($data->room_floor)->whereIn('id',$items)->pluck('id');
          $count = count($items);
        }
      }
      if($data->construction != "null"){
        $items= Property::ConstructionSerch($data->construction)->whereIn('id',$items)->pluck('id');
        $count = count($items);
      }
      if($data->construction_date != "null"){
        $time = $data->construction_date." year";
        $times = date("Y-m-d",strtotime($time));
        $items= Property::Construction_DateSerch($times)->whereIn('id',$items)->pluck('id');
        $count = count($items);
      }
      if($data->station_walk != "null"){
        if($data->station_walk != 20){
          $items= Property::station_walkSerch($data->station_walk)->whereIn('id',$items)->pluck('id');
          $count = count($items);
        }else{
          $items= Property::Upstation_walkSerch()->whereIn('id',$items)->pluck('id');
          $count = count($items);
        }
      }
      if($data->root != "null"){
        $items = DB::table('properties')->join('station_routes', 'properties.station_id', '=', 'station_routes.station_id')->select('properties.*')->where('station_routes.id',$data->root)->whereIn('properties.id',$items)->pluck('id');
        $count = count($items);
      }
      $items = Property::whereIn('id',$items)->skip($data->skip)->take(4)->get();
    // $items = Property::ManagementSerch(3)->whereIn('id',$items)->pluck('id');
    // $items = Property::PriceSerch(14)->whereIn('id',$items)->get();
      return ["property"=>$items,"count"=>$count];
      exit();
    }
    catch(\Exception $e){
      return "エラー";
    }
  }
}
