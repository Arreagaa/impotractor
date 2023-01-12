<link href="css/pdf.css" rel="stylesheet">

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
				<tr>
					<th>NIT</th>
					<th>Cliente</th>
					<th>Contacto</th>
					<th>Ciudad</th>
				</tr>
				<tr>
					<td>{{ $order->nit }}</td>
					<td>{{ $order->client }}</td>
					<td>{{ $order->contact_name }}</td>
					<td>{{ $order->city }}</td>
				</tr>
				<tr>
					<th>Teléfono</th>
					<th>E-mail</th>
					<th>Tipo</th>
					<th>Forma de pago</th>
				</tr>
				<tr>
					<td>{{ $order->contact_phone }}</td>
					<td>{{ $order->contact_email }}</td>
					<td>{{ $order->type }}</td>
					<td>{{ $order->payment_method }}</td>
				</tr>
@endif
			</thead>
		</table>
		<table class="table-content" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th class="table-header-group">Parte</th>
					<th class="table-header-group">Cantidad</th>
					<th class="table-header-group">Descripción</th>
					<th class="table-header-group">Precio</th>
					<th class="table-header-group">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $total = 0; ?>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->partNumber }}</td>
						<td>{{ $item->quantity }}</td>
						<td>{{ $item->description }}</td>

@if($order)
						<td>Q. {{ number_format((float)$item->finalUnitPrice, 2, '.', ',') }}</td>
						<td>Q. {{ number_format((float)$item->finalPrice, 2, '.', ',') }}</td>
@else
						<td>Q. {{ number_format((float) 1.12 * ($item->qUnitPrice / $item->selectedPercentaje), 2, '.', ',') }}</td>
                                                <td>Q. {{ number_format((float) 1.12 * ($item->qUnitPrice / $item->selectedPercentaje) * $item->quantity, 2, '.', ',') }}</td>
@endif
					</tr>
					<?php $total += 1.12 * ($item->qUnitPrice / $item->selectedPercentaje) * $item->quantity; ?>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th colspan="3" rowspan="5" class="table-no-border-bottom">
					</th>
					<th>Gran Total</th>
					<th>Q. {{ number_format((float)$total, 2, '.', ',') }}</th>
				</tr>
				<tr>
					<th>Descuento</th>
					@if($order)
					<th>Q. {{ number_format((float)$order->discount, 2, '.', ',') }}</th>
@else
<th></th>
@endif
				</tr>
				<tr>
					<th>SubTotal</th>
					<th>Q. {{ number_format((float)($total/1.12), 2, '.', ',') }}</th>
				</tr>
				<tr>
					<th>IVA</th>
					<th>Q. {{ number_format((float)($total-($total/1.12)), 2, '.', ',') }}</th>
				</tr>
				<tr class="table-total">
					<th>Valor Total</th>
					<th>Q. {{ number_format((float) $total, 2, '.', ',') }}</th>
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
						<p>Esta cotización tiene validez de 15 días.</p>
						<p>BANRURAL CUENTA #3282074390</p>
						<p>BANCO INDUSTRIAL CUENTA#027-002583-6</p>
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
			<p>
				6 ave 2-68 z.2 de Mixco, 01053, Guatemala<br/>
				cotizaciones@impotractor.com<br/>
				2250-7580 / 2250-5934
			</p>
		</div>
		<div class="col">
			<p>www.impotractor.com</p>
			<img class="footer-logo" src="images/impotractor/impotractor-light-logo-x2.png"/>
		</div>
	</div>
</div>
<!-- FOOTER end -->
