@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="/cotizar">Cotizar</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="/historial">Historial de Cotizaciones</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10 col-md text-left">
      <a href="/" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-arrow-left"></i> Volver</a>
    </div>
  </div>
</div>
@endsection
