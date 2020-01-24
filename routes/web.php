<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Liste des clients
Route::get('/clients', 'ClientController@index');

// Rechercher un client
Route::post('/clients', 'ClientController@getBy')->name('clients.getby');

Route::post('/fournisseurs', 'FournisseurController@getBy')->name('fournisseurs.getby');

// Pour les client présentant des factures et ayant des terrains nu ou meme pas
Route::get('/{id}/clients', 'ClientController@getDetails')->name('clients.analyses');

Route::get('/{id}/fournisseurs', 'FournisseurController@getFactures')->name('fournisseurs.getfactures');

// Pour les clients avec des factures incohérentes
Route::get('/clients/{id}', 'ClientController@getFactureIncoherantes')->name('clients.getfactureincoherentes');

// Liste des fournisseurs
Route::get('fournisseurs', 'FournisseurController@index')->name('fournisseurs.index');

Route::get('macons', 'MaconController@index')->name('macons.index');

Route::get('/macons/{id}', 'MaconController@analyses')->name('macons.analyses');

// Routes pour les fichiers
Route::get('arrets','FileController@arrets')->name('file.arrets');
Route::get('decrets','FileController@decrets')->name('file.decrets');
Route::get('lois','FileController@lois')->name('file.lois');
Route::get('jugements','FileController@jugements')->name('file.jugements');
Route::get('pvs','FileController@pvs')->name('file.pvs');
Route::get('autres','FileController@autres')->name('file.autres');
Route::get('edrs','FileController@edrs')->name('file.edrs');
Route::get('factures','FileController@factures')->name('file.factures');