@extends('layout')

@section('body')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-home"></i> Inicio - Bem Vindo</div>
    <div class="card-body">
        <h3 align="center">Agenda Pessoal</h3>
        <h3 align="center">Olá {!! Auth::user()->name !!}</h3>
    </div>
    <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
</div>
@endsection