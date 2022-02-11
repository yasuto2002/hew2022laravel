<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public static function scopeLowerSerch($query,$num){
        return $query->where('price','>=',$num);
    }
    public static function scopeUpperSerch($query,$num){
        return $query->where('price','<=',$num);
    }
    public static function scopePlanSerch($query,$num){
        return $query->where('floor_plan',$num);
    }
    public static function scopeBuilding_typeSerch($query,$num){
        return $query->where('building_type',$num);
    }
    public static function scopeRoomSerch($query,$num){
        return $query->where('room_floor',$num);
    }
    public static function scopeUpRoomSerch($query,$num){
        return $query->where('room_floor','>=',$num);
    }
    public static function scopeConstructionSerch($query,$num){
        return $query->where('construction',$num);
    }
    public static function scopeConstruction_DateSerch($query,$num){
        return $query->whereYear('construction_date','<=',$num);
    }
    public static function scopestation_walkSerch($query,$num){
        return $query->where('station_walk','<=',$num);
    }
    public static function scopeUpstation_walkSerch($query){
        return $query->where('station_walk','>=',15);
    }
    // public static function scopeStstionSerch($query,$num){
    //     return $query->where('station_id',$num);
    // }
    // public static function scopePriceSerch($query,$num){
    //     return $query->where('price','>',$num);
    // }
    // public static function scopeManagementSerch($query,$num){
    //     return $query->where('management_fee','>',$num);
    // }
}
