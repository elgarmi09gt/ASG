<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Factures;
use App\Models\Parcelles;
use App\Models\Fournisseurs;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $clients = Clients::paginate(7);
        return view('clients.index',
        [
            'clients' => $clients,
            'search' => '',
        ]);
    }
    // Rechercher un client
    public function getBy(Request $request){
        $search = explode(' ',$request->search);
        if(count($search) === 1){
            $clients = Clients::where('Nom','LIKE','%'.$request->search.'%')
            ->orWhere('Prenom','LIKE','%'.$request->search.'%')->paginate(7);
        }
        elseif (count($search) === 2) {
            $clients = Clients::where('Prenom','LIKE','%'.strtoupper($search[0]).'%')
            ->where('Nom','LIKE','%'.strtoupper($search[1]).'%')
            ->paginate(7);
        }
        elseif (count($search) === 3) {
             $clients = Clients::where('Prenom','LIKE','%'.strtoupper($search[0]).'% '.strtoupper($search[1]).'%')
            ->where('Nom','LIKE','%'.strtoupper($search[2]).'%')
            ->paginate(7);
        }
        else {
            $clients = Clients::paginate(7);
        }
        return view('clients.index',
        [
            'clients' => $clients,
            'search' => $request->search,
        ]);
    }

    // Clients avec facture et pas de construction
    public function getDetails(Request $request, $id){

        $client = Clients::find($id);
        $fournisseurs = Fournisseurs::all();
        $factures = Factures::where('client_id', $client->id)
        ->orderBy('fournisseur_id')
        ->orderBy('Numero','asc')
        ->get();
        return view('clients.factures',
        [
            'client' => $client,
            'search' => $request->search,
            'factures' => $factures,
            'fournisseurs' => $fournisseurs,
        ]);
    }

    // Clients avec des factures non chronologiques
    public function getFactureIncoherantes(Request $request, $id){
        $client = Clients::find($id);
        $factures = Factures::where('client_id', $client->id)
        ->orderBy('fournisseur_id', 'asc')->all();
        $fournisseurs = Fournisseurs::all();

        return view('clients.analyse',
        [
            'client' => $client,
            'search' => $request->search,
            'factures' => $factures,
            'fournisseurs' => $fournisseurs,
        ]);
    }
}