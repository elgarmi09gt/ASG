<?php

namespace App\Http\Controllers;

use App\Models\Macons;
use App\Models\Constructions;
use App\Models\Factures;
use App\Models\Clients;
use Illuminate\Http\Request;
use DB;

class MaconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $macons = DB::table('macons')
        ->join('constructions','macons.id','=' ,'constructions.macon_id')
        ->join('clients','constructions.client_id','=' ,'clients.id')
        ->join('parcelles','clients.id','=' ,'parcelles.client_id')
        ->whereNotIn ('Niveau_reel',['BATIMENT', 'CLOTURE', 'FONDATION', 'ELEVATION',''])
        ->where ('macons.Prenom', '!=' ,'PAS DE NOM DE MACON')
        ->get(['macons.id','macons.Prenom','macons.Nom','macons.Telephone']);

        return view('macons.index',
        [
            'macons' => $macons,
            'search' => '',
        ]);
    }

    public function analyses($id){
        // Les clients avec terrains nue et comme maçon celui si
        // s$clients = DB::table('clients')->join()
        $macon = Macons::find($id);
        // $clients = Clients::all();
        $constructions = DB::table('macons')
        ->join('constructions','macons.id','=' ,'constructions.macon_id')
        ->join('clients','constructions.client_id','=' ,'clients.id')
        ->join('parcelles','clients.id','=' ,'parcelles.client_id')
        ->whereNotIn ('Niveau_reel',['BATIMENT', 'CLOTURE', 'FONDATION', 'ELEVATION',''])
        // ->where ('macons.Prenom', '!=' ,'PAS DE NOM DE MACON')
        ->where ('macons.id', $macon->id)
        ->get(['clients.id',
                'clients.Prenom',
                'clients.Nom',
                'niveau_reel']);
        return view('macons.analyse',
        [
            'macon'             => $macon,
            // 'clients'             => $clients,
            'constructions'    =>$constructions,
        ]);
    }
}
