@extends('adminlte::page')

@section('title', 'Gestionar Almacenes')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    @livewire('gestionar-almacen')
@stop

@section('css')
    <link href="{{ asset('css/css_bootstrap.min.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@stop
