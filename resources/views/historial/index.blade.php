@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
    <br><br><br>
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
	        						<a href="/cotizar/{{Crypt::encrypt($cotizacion->id)}}" class="btn btn-primary btn-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                                    </svg>
                                    </a>
		        				@else
		        					<a href="/cotizar/{{Crypt::encrypt($cotizacion->id)}}" class="btn btn-primary btn-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    </a>
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
					<a href="/dashboard" class="btn btn-primary btn-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                        Volver
                    </a>
				</div>
			</div>
	  </div>
	</div>
</div>
@endsection
