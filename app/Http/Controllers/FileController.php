<?php

namespace App\Http\Controllers;

use App\Models\Fichiers;
use App\Models\Fournisseurs;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function factures(){
        $factures = Fournisseurs::all();
        return view('files.factures',
        [
            'factures'  => $factures
        ]);
    }

    public function arrets(){
        $arrets = Fichiers::where('categorie_id',1)->get();
        return view('files.arret',
        [
            'arrets'  => $arrets
        ]);
    }

    public function decrets(){
        $decrets = Fichiers::where('categorie_id',5)->get();
        return view('files.decret',
        [
            'decrets'  => $decrets
        ]);
    }
    
    public function pvs(){
        $pvs = Fichiers::where('categorie_id',6)->get();
        return view('files.pv',
        [
            'pvs'  => $pvs
        ]);
    }
    public function jugements(){
        $jugements = Fichiers::where('categorie_id',2)->get();
        return view('files.jugement',
        [
            'jugements'  => $jugements
        ]);
    }
    public function edrs(){
        $edrs = Fichiers::where('categorie_id',4)->get();
        return view('files.edr',
        [
            'edrs'  => $edrs
        ]);
    }
    public function lois(){
        $lois = Fichiers::where('categorie_id',3)->get();
        return view('files.lois',
        [
            'lois'  => $lois
        ]);
    }
    public function autres(){
        $autres = Fichiers::where('categorie_id',7)->get();
        return view('files.autre',
        [
            'autres'  => $autres
        ]);
    }
}
