@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	  <div class="col-md-10 col-md-offset-1">
		  <div class="panel panel-default">
        <div class="panel-heading">
          Historial de Cotizaciones
        </div>
        <div class="panel-body">
        	<table class="table">
        		<thead>
        			<tr>
	        			<th># de Cotización</th>
	        			<th>Referencia</th>
	        			<th>Fecha</th>
	        			<th class="text-center">Status</th>
	        			<th class="text-center">Acciones</th>
        			</tr>
        		</thead>
        		<tbody>
	        		@foreach($cotizaciones as $cotizacion)
	        			<tr>
	        				<td>{{ $cotizacion->id }}</td>
	        				<td>{{ $cotizacion->reference }}</td>
	        				<td>{{ Carbon\Carbon::parse($cotizacion->created_at)->format('d/m/Y') }}</td>
	        				<td class='text-center'>
		        				@if($cotizacion->is_ordered)
		        					<span class="label label-success">Ordenada</span>
		        				@else
		        					<span class="label label-danger">No ordenada</span>
		        				@endif
	        				</td>
	        				<td class="text-center">
	        					@if($cotizacion->is_ordered)
	        						<a href="/cotizar/{{Crypt::encrypt($cotizacion->id)}}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-export"></i></a>
		        				@else
		        					<a href="/cotizar/{{Crypt::encrypt($cotizacion->id)}}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
		        				@endif
	        				</td>
	        			</tr>
	        		@endforeach
        		</tbody>
        	</table>
        </div>
      </div>
			<div class="row">
				<div class="col-md-10 col-md text-left">
					<a href="/home" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-arrow-left"></i> Volver</a>
				</div>
			</div>
	  </div>
	</div>
</div>
@endsection
