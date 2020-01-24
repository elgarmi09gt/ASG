{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Clients')

@section('content_header')

@if (count($factures))
@php($prcls = $GetParcelles($client->id))
@php($text = "Avec <strong>". count($prcls) ."</strong> parcelle(s) de niveau(x) reel(s): ")
@foreach ($prcls as $item)
    @php($text .=' <strong>'. $item->Niveau_reel.'<strong>')
    @if (count($prcls) > 1 && $loop->first)
        @php($text .= ' et ')
    @endif
@endforeach

@php($text .= " <strong>" .$client->Prenom.' '. $client->Nom."</strong> déclare avoir les factures ci-dessous ")
<div class="form-group">
  <div class="row col-sm-10 col-md-10 offset-1">
    <h2>{!! "Analyse Détaillée sur le Client  <strong>$client->Prenom $client->Nom </strong>" !!} </h2>
  </div><hr>
  <div class="row">
    <div class="col col-md-3"style="text-align:center">
      NOMBRE(S) DE PARCELLE(S) : {!!"<strong>". count($prcls) ."</strong>" !!}
    </div>
    <div class="col col-md-3"> {!!" N° PARCELLE(S) :" !!} 
      @foreach ($prcls as $item)
      @if (!$loop->first)
          {!! ", <strong>$item->Numero</strong>" !!}
      @else
        {!! "<strong>$item->Numero</strong>" !!}
      @endif
        
    @endforeach
    </div>
    <div class="col col-md-6">NIVEAU(X) PARCELLE(S) : 
      @foreach ($prcls as $item)
      @if (!$loop->first)
      {!! ", <strong>$item->Niveau_reel</strong>" !!}
      @else
      {!! "<strong>$item->Niveau_reel</strong>" !!}
      @endif
      
      @endforeach  
    </div>
  </div><hr>
</div>
  {{-- <h1>Factures fictives de <strong>{{ $client->Prenom .' '. $client->Nom}}</strong></h1> --}}
  @stop
  @section('content')
  <br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" style='text-align:center'>Numero</th>
        <th scope="col" style='text-align:center'>Fournisseurs</th>
        <th scope="col" style='text-align:center'>Date</th>
        <th scope="col" style='text-align:center'>Ecart Date</th>
        <th scope="col" style='text-align:center'>Analyse</th>
        <th scope="col" style="text-align:center">Voir la facture</th>
      </tr>
    </thead>
    <tbody>
      @php($i=0)
      @foreach ($factures as $facture)
      @foreach ($fournisseurs as $fournisseur)
      @continue($fournisseur->id != $facture->fournisseur_id)
      @if ($loop->parent->first)
        @php($dp = Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $facture->Date.' 0:00:00'))
        @php($np = $facture->Numero )
        @php($idfp = $facture->fournisseur_id )
      @endif
      @php($i++)
      <tr>
        <th scope="row">{{ $facture->id }}</th>
        <th style='text-align:center'>{{ $n = $facture->Numero }}</th>
        @php($idf = $facture->fournisseur_id)
        <td style='text-align:center'>{{ $fournisseur->fournisseurs }}</td>
        @php($d = Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $facture->Date.' 0:00:00'))
        <td style='text-align:center'>{{ $facture->Date }}</td>
        <td style='text-align:center'> {{ $ecart_date = ( $idf === $idfp ? ($d < $dp ? (-1)*$d->diffInDays($dp) : $d->diffInDays($dp)) : '---' )}} </td>
        <td style='text-align:center'>{!! $ecart_date >= 0 ? '-----------------------------' : 
               " La facture N° <strong>$n</strong> posterieur à la facture N° <strong>$np </strong><br>a une date antérieurs de 
               <strong>$ecart_date jours</strong>" !!}</td>
        <td>
          <a href="#" class="show-modal btn btn-info btn-md"
            style="box-shadow: 20px 10px 80px #95A5A6; background: #1DC7EA; color: #fff; align-content:center; text-align:center"
            data-fichier="{{$fournisseur->id.'_'.$client->id.'_'.$facture->Numero}}">
            <i class="fa fa-eye"></i>
          </a>
        </td>
              </tr>
              @php($dp = $d)
              @php($np = $n)
              @php($idfp = $idf)
              @break
              @endforeach
              @endforeach
            </tbody>
          </table>
  </div>
  @else
    <div>
    <p>{{ 'No Analyse' }}</p>
  </div>
  @endif 
  @foreach ($prcls as $terrain)
  @if ($terrain->Numero == 0)
        <div class="col col-sm-8 col-md-8 offset-2">
          <h1 style="color:red">Le terrain n'existe pas</h1>
        </div>
        @break
  @endif
  <div class="row col-sm-10 md-8 offset-md-2 offset-sm-1"><h2 style="text-align:center">{!! "Etat de la parcelle N° $terrain->Numero de <strong>Mars 2012 à Décembre 2013</strong>" !!}</h2></div>
    <div class="row">
      
      <div class="col">
        <h5 style="text-align:center">{{"Etat de la parcelle en Decembre 2012"}}</h5>
        <img src="{{ "\\images\\$terrain->Numero-01-min.png" }}" alt="{{ "Parcelle $terrain->Numero"}}" width="100%" height="100%"
          title=" {{"Cliquer pour télécharger"}} ">
      </div>
      
      <div class="col">
        <h5 style="text-align:center">{{"Mars 2013"}}</h5>
        <img src="{{ "\\images\\$terrain->Numero-02-min.png" }}" alt="{{ "Parcelle $terrain->Numero"}}" width="100%" height="100%"
          title="{{ "$client->Prenom $client->Nom" }}">
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col">
        <h5 style="text-align:center">{{"Octobre 2013"}}</h5>
        <img src="{{ "\\images\\$terrain->Numero-03-min.png" }}" alt="{{ "Parcelle $terrain->Numero"}}" width="100%"
        height="100%" title="{{ "$client->Prenom $client->Nom" }}">
      </div>
      <div class="col">
        <h5 style="text-align:center">{{"Decembre 2013"}}</h5>
        <img src="{{ "\\images\\$terrain->Numero-04-min.png" }}" alt="{{ "Parcelle $terrain->Numero"}}" width="100%"
        height="100%" title="{{ "$client->Prenom $client->Nom" }}">
      </div>
    </div>
    @endforeach
    <div id="showmodalF" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="width: 170%;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" style="color: #fff; font-size: 30px;">&times;</button>
          </div>
          <div class="modal-body" style=" height: 80vh;">
    
          </div>
        </div>
      </div>
    </div>
    </section>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/pdfobject.min.js') }}"> </script>
    
    <script>
      // Show function Fournisseur
          $(document).on('click', '.show-modal', function() {
              $('#showmodalF').modal('show');
      
              var fichier = '{{ asset('files/factures/')}} ' + '/' + $(this).data('fichier') + '.pdf';
              PDFObject.embed(fichier, '.modal-body');
              $('.modal-header').css('background', '#1DC7EA');
          }); 
    </script>
    @stop
    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
@section('js')
  <script>
    console.log('Hi!'); 
  </script>
@stop