<?php

namespace App\Http\Controllers;

use App\Models\Fournisseurs;
use App\Models\Factures;
use App\Models\Clients;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fournisseurs = Fournisseurs::paginate(7);
        return view('fournisseurs.index',
            [
                'fournisseurs' => $fournisseurs,
                'search' => $request->search,
            ]);
    }

    // Recherche de fournisseur et analyse globale
    public function getBy(Request $request){
        $fournisseurs = Fournisseurs::where('id',$request->search)
        ->orWhere('fournisseurs','LIKE','%'.$request->search.'%')
        ->paginate(7);
        return view('fournisseurs.index',
        [
            'fournisseurs' => $fournisseurs,
            'search' => $request->search,
        ]);
    }

    // Analyse Fournisseurs
    public function getFactures(Request $request, $id){

        $fournisseur = Fournisseurs::find($id);
        // dd($fournisseurs->id);
        $factures = Factures::where('fournisseur_id',$fournisseur->id)
        ->orderBy('Numero')
        ->get();
        // dd($request);
        $clients = Clients::all();

        return view('fournisseurs.analyses',
        [
            'factures' => $factures,
            'clients'  => $clients,
            'fournisseur'  => $fournisseur,
        ]);
    }
}
