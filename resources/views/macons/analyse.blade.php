@extends('adminlte::page')

@section('title', 'Fournisseurs')

@section('content_header')
<h1 style="text-align:center">Analyses faites sur le maçon : <strong>
    {{ "$macon->Prenom $macon->Nom " }}</strong></h1>
@stop

@section('content')
   <ul>
     @foreach ($constructions as $construction)
     <div class="col-sm-10 col-md-8 offset-md-2 offset-sm-1">
        <li>
        <h3>
          {!! "Le Maçon $macon->Prenom $macon->Nom déclare avoir construit pour le client 
          <strong>$construction->Prenom $construction->Nom</strong> alors que ce dernier a un <strong>$construction->niveau_reel</strong>"!!}
        </h3>
        </li>
      </div><br>
      @endforeach  
    </ul>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  console.log('Hi!'); 
</script>
@stop