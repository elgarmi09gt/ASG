<?php

namespace App\Helpers;

use DB;

class AnalyseClientHelpers{
  public static function getFacturesFictives($client_id){
    // return all factures where niveau reel 'Inexistant' ou 'TERRAIN NU'
    // nieau : Parcelles
    $facturesfictives = DB::table('factures')
        ->join('clients','factures.client_id','clients.id')
        ->join('parcelles','parcelles.client_id','clients.id')
        ->where('factures.client_id',$client_id)
        ->whereIn('parcelles.Niveau',['TERRAIN NUE','Inexistant'])
        ->orderBy('factures.Numero')
        ->get();

    return $facturesfictives;
  }

   public static function AnalyseFacturesIncoherantes($client_id){
    
  }
}