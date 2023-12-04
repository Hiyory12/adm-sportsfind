@extends('base.app')

@section('titulo', 'Listagem de documentos')

@section('content')

<h2>{{ $cliente->id }}</h2>
@php
    dd($cliente);
@endphp

@endsection