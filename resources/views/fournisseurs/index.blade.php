{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Fournisseurs')

@section('content_header')
<h1 style="text-align:center; font-weight:bolder">Liste des Fournisseurs</h1>
@stop

@section('content')
  <div class="col-md-8 offset-2 ">
    @include('_assets.formSearchFourniss')
  </div>
  <div>
    @include('_assets.contentFournisseur')
  </div>
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

  @section('js')
  <script>
    console.log('Hi!'); 
  </script>
  @stop