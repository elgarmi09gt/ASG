<?php

namespace App\Helpers;

use App\Models\Parcelles;

class GetNombreParcelleHelpers
{
  public static function GetNombreParcelle($client_id){
    return Parcelles::where('client_id',$client_id)->get();
  }
}


