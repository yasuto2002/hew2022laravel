<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public static function scopeStstionSerch($query,$num){
        return $query->where('station_id',$num);
    }
    public static function scopePriceSerch($query,$num){
        return $query->where('price','>',$num);
    }
    public static function scopeManagementSerch($query,$num){
        return $query->where('management_fee','>',$num);
    }
}
