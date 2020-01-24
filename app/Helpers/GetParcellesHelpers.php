<?php

namespace App\Helpers;

use App\Models\Parcelles;

class GetParcellesHelpers
{
  public static function GetParcelles($client_id){
    return Parcelles::where('client_id',$client_id)->get();
    
  }
  
}