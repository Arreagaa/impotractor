<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link href="css/pdf.css" rel="stylesheet">
	<title>Cotización Impotractor S.A</title>
</head>
<body>

<!-- HEADER start -->
<div class="section">
	<div class="header">
		<img class="logo-display" src="images/impotractor/impotractor-logo-x2.png"/>
	</div>
</div>
<!-- HEADER end -->

<!-- COTIZACION start -->
<div class="section">
	<div class="container">
		<h2>Cotización</h2>
		<div class="line"></div>

		<table class="table-header light-font">
			<thead>
			@if($order)
				<tr class="table-title">
					<th>NIT</th>
					<th>Cliente</th>
					<th>Contacto</th>
					<th>Ciudad</th>
				</tr>
				<tr class="table-content">
                    <td>{{ $order->nit }}</td>
                    <td>{{ $order->client }}</td>
                    <td>{{ $order->contact }}</td>
                    <td>{{ $order->city }}</td>
					
				</tr>
				<tr class="table-title">
					<th>Teléfono</th>
					<th>Correo</th>
					<th>Tipo</th>
					<th>Forma de pago</th>
				</tr>
				<tr class="table-content">
					<td>{{ $order->phone }}</td>
					<td>{{ $order->email }}</td>
					<td>{{ $order->type }}</td>
					<td>{{ $order->paymentMethod }}</td>
                    
				</tr>
			@endif
			</thead>
		</table>
        <br>
		<table class="table-content" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th class="table-header-group">Descripción</th>
                    <th class="table-header-group">Cantidad</th>
					<th class="table-header-group">Precio</th>
					<th class="table-header-group">Descuento</th>
					<th class="table-header-group">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $Grandtotal = 0; ?>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->description }}</td>
						<td>{{ $item->quantity }}</td>


						<td>Q.{{ number_format((float) $item->price, 2, '.', ',') }}</td>
						<td>{{ $item->percentage }}%</td>
						<td>Q.{{ number_format((float) $item->total, 2, '.', ',') }}</td>
					</tr>
					<?php $Grandtotal = $Grandtotal + $item->total; ?>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th colspan="3" rowspan="5" class="table-no-border-bottom">
					</th>
					<th>Descuento Aplicado</th>
					<th>{{ $order->discount }}%</th>
				</tr>
                <tr class="table-total ">
					<th>Gran Total</th>
					<th>Q.{{ number_format((float) $Grandtotal, 2, '.', ',') }}</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<!-- COTIZACION end -->

<!-- OBSERVACIONES start -->
<div class="section">
	<div class="container">

		<h2>Observaciones</h2>
		<div class="line"></div>

		<table>
			<thead>
				<tr>
					<th>
						<p class="ob-text">Esta cotización tiene validez de 15 días.</p>
						<p class="ob-text">Banrural Cuenta #3282074390</p>
						<p class="ob-text">Banco Industrial Cuenta #027-002583-6</p>
					</th>
				</tr>
			</thead>
		</table>

	</div>
</div>
<!-- OBSERVACIONES end -->

<!-- FOOTER start -->
<div class="footer">
	<div class="row">
		<div class="col">
			<p class="footer-text">
				Calzada Raúl Aguilar Bratres 7-18 Zona 11<br/>
				cotizaciones@impotractor.com<br/>
				2316-3878 / 2316-3879
			</p>
		</div>
		<div class="col">
			<!--<a class="link-a">www.impotractor.com</a>-->
			<img class="footer-logo" src="images/impotractor/impotractor-light-logo-x2.png"/>
		</div>
	</div>
</div>
<!-- FOOTER end -->


</body>
</html>