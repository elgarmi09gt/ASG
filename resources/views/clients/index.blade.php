{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Clients')

@section('content_header')
<h1 style="text-align:center; font-weight:bolder">Liste des Clients</h1>
@stop

@section('content')
  @include('_assets.contentClient')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  console.log('Hi!');
</script>
@stop