{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Maçons')

@section('content_header')
<h1>Liste des Maçons</h1>
@stop

@section('content')
  @include('_assets.contentMacon')
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  console.log('Hi!'); 
</script>
@stop