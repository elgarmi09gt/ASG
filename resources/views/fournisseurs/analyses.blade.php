@extends('adminlte::page')

@section('title', 'Fournisseurs')

@section('content_header')
<script src="{{ asset('js/jquery.3.2.1.min.js') }}"></script>
<div class="form-inline">
  <div class="col col-sm-6 md-6">
    <h1 style="text-align:center"><strong>{{ $fournisseur->fournisseurs }}</strong></h1>
  </div><div class="col col-sm-6 col-md-6">Voir L'Ensemble Des Factures
    <a href="#" class="show-modal btn btn-info btn-md"
      style="box-shadow: 20px 10px 80px #95A5A6; background: #1DC7EA; color: #fff; align-content:center; text-align:center"
      data-fichier="{{$fournisseur->fournisseurs}}">
      <i class="fa fa-eye"></i>
    </a>
  </div>
</div>
@stop

@section('content')
<table class="table table-condensed">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Clients</th>
      <th scope="col">Numéro</th>
      <th scope="col">Ecart N° Facture</th>
      <th scope="col">Date Facture</th>
      <th scope="col">Ecate Date</th>
      <th scope="col" style="text-align:center">Analyse</th>
      <th scope="col" style="text-align:center">Voir la facture</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($factures as $facture)
        @foreach ($clients as $client)
          @continue($client->id != $facture->client_id)
          @if ($loop->parent->first)
            @php
              $dp0 = $facture->Date;
              $dp = Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $facture->Date.' 0:00:00');
              $np = $facture->Numero;
            @endphp
          @endif
          <tr>
            <th scope="row">{{ $facture->id}}</th>
            <td>{{ $client->Prenom.' '.$client->Nom }}</td>
            <td>{{ $n = $facture->Numero }}</td>
            <td>
              {{ $ecart_facture = $n - $np }}
            </td>
            @php
            $d0 = $facture->Date;
            $d = Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $facture->Date.' 0:00:00');
            @endphp
            <td>{{ $facture->Date}}</td>
            <td> {{ $ecart_date = ($d < $dp ? (-1)*$d->diffInDays($dp) : $d->diffInDays($dp) )}} </td>
            <td style="text-align:center"> {!! ( $ecart_facture  && ($ecart_date > 2.5*$ecart_facture)) ? 
            "Le fournisseur <strong>$fournisseur->fournisseurs</strong>  atteste n'avoir réalisé 
            <strong>$ecart_facture</strong> facture(s) pendant <strong>$ecart_date jours</strong>" :
            ($ecart_date < 0 ? "La facture <strong>N° $np</strong> antérieur à la facture <strong>N° 
              $n</strong><br> A une date postérieur de <strong>".(-1*$ecart_date) ." jours</strong>" 
              : "--------------------------------------------") !!}
            </td>
            <td>
              <a href="#" class="show-modal btn btn-info btn-md"
                style="box-shadow: 20px 10px 80px #95A5A6; background: #1DC7EA; color: #fff; align-content:center; text-align:center"
                    data-fichier="{{$fournisseur->id.'_'.$client->id.'_'.$facture->Numero}}">
                    <i class="fa fa-eye"></i>
              </a>
            </td> 
          </tr>
          @php($np = $n)
          @php($dp = $d)
          @php($dp0 = $d0)
          @break
        @endforeach
      @endforeach
  </tbody>
  </table>


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
