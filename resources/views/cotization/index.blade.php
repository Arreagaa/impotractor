@extends('layouts.app')

@section('content')
 <div class="content">
 	<div class="row">
        <br><br><br>
	  <div class="col-md-10 col-md-offset-1">
		  <div class="panel panel-primary">
		  	<div class="panel-heading">Cotizador</div>
		  	<div class="panel-body">
		  		<div class="row">
		  			<div class="col-md-5">
			  			<div class="form-group">
			  				<label for="reference">Referencia de la cotización</label>
			  				<input id="reference" type="text" class="form-control" name="reference">
			  			</div>
		  			</div>
		  			<div class="col-md-5">
			  			<div class="form-group">
			  				<label for="provider">Código del proveedor</label>
			  				<input id="provider" type="text" class="form-control" name="provider">
			  			</div>
		  			</div>
		  			<div class="col-md-2">
			  			<div class="form-group">
			  				<label for="rate">Tipo de Cambio</label>
			  				<input id="rate" type="number" class="form-control text-center" name="rate" value="7.75">
			  			</div>
		  			</div>
		  		</div>
		  		<div class="row">
		  			<div class="col-md-5 text-center">
							<label>Tipo de transporte</label>
					  	<div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
							  <div class="btn-group" role="group">
							    <button data="1" type="button" class="courier-type btn btn-warning active">Courier</button>
							  </div>
							  <div class="btn-group" role="group">
							    <button data="2" type="button" class="courier-type btn btn-warning">Aéreo Express</button>
							  </div>
							  <div class="btn-group" role="group">
							    <button data="3" type="button" class="courier-type btn btn-warning">Reservado</button>
							  </div>
							</div>
		  			</div>
		  			<div class="col-md-3 col-md-offset-1">
		  				<div class="from-group">
								<label for="extra-shipping">Flete Extra ($)</label>
			  				<input id="extra-shipping" type="text" class="form-control" name="extra-shipping">
		  				</div>
		  			</div>
		  			<div class="col-md-3">
		  				<div class="from-group">
								<label for="total-weight">Peso total (Lb)</label>
			  				<input id="total-weight" type="text" class="form-control" name="total-weight">
		  				</div>
		  			</div>
		  		</div>
		  		<br>
		  		<div class="row">
		  			<div class="col-md-2">
		  				<div class="from-group">
								<label for="part-number">Número de parte</label>
			  				<input type="text" class="new-part-input form-control" name="part-number">
		  				</div>
		  			</div>
		  			<div class="col-md-2">
		  				<div class="from-group">
								<label for="quantity">Cantidad</label>
			  				<input type="text" class="new-part-input form-control" name="quantity">
		  				</div>
		  			</div>
		  			<div class="col-md-4">
		  				<div class="from-group">
								<label for="description">Descripción</label>
			  				<input type="text" class="new-part-input form-control" name="description">
		  				</div>
		  			</div>
		  			<div class="col-md-2">
		  				<div class="from-group">
								<label for="weight">Peso (Lb)</label>
			  				<input type="text" class="new-part-input form-control" name="weight">
		  				</div>
		  			</div>
		  			<div class="col-md-2">
		  				<div class="from-group">
								<label for="price">Precio ($)</label>
			  				<input type="text" class="new-part-input form-control" name="price">
		  				</div>
		  			</div>
		  		</div>
		  		<br>

		  	</div>
		  </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Calculadora</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th># de parte</th>
								<th>Cantidad</th>
								<th>Descripción</th>
								<th>Peso neto(Lb)</th>
								<th>Precio($)</th>
								<th>Precio(Q)</th>
								<th>DAI</th>
								<th>IVA</th>
								<th>P. Unitario</th>
								<th>Total</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="cotizador-body">
						</tbody>
						<tfoot>
							<tr>
								<th class="text-right" colspan="9">Gran Total</th>
								<th id="grand-total"></th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">Resumen</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th colspan="3"></th>
								<th colspan="2" class="text-center">Precio A (35%)</th>
								<th colspan="2" class="text-center">Precio B (30%)</th>
								<th colspan="2" class="text-center">Precio C (25%)</th>
								<th colspan="3" class="text-center">Precio Final</th>
							</tr>
							<tr>
								<th># de parte</th>
								<th>Cantidad</th>
								<th>Descripción</th>
								<th>P. Unitario</th>
								<th>Total</th>
								<th>P. Unitario</th>
								<th>Total</th>
								<th>P. Unitario</th>
								<th>Total</th>
								<th>Porcentaje</th>
								<th>Unitario</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody id="summary-body">
						</tbody>
						<tfoot>
							<tr>
								<th class="text-right" colspan="11">Gran Total</th>
								<th id="second-grand-total"></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-right">
			<a href="/dashboard" class="btn btn-primary btn-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Volver
            </a>
			<button id="btnSave" class="btn btn-primary btn-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
                </svg>
                Guardar
            </button>
		</div>
	</div>
	<br>
 </div>
@endsection

@section('javascript')
	<script>
		$(document).ready(function() {
			var items = [];
			var totalWeight = 0;
			var totalPrice = 0;
			var finalTotalWeight = 0;
			var transportType = 1;
			var extraShipping = 0;

			var importPrice = 0;

			var ivaRate = 0.12;

			$("#btnSave").click(function() {
				var sendingItem = {
					reference: $("#reference").val(),
					rate: getRate(),
					total_weight: finalTotalWeight,
					option: transportType,
					items: JSON.stringify(items),
					extra_shipping: extraShipping,
					provider_code: $("#provider").val(),
					policy: 0,
					"_token": "{{csrf_token()}}"
				}
				$.post("/guardar", sendingItem, function(data) {
						if(data.success == 1) window.location = "/historial";
				})
			});

			var calculateTransport = function() {
				var rate = getRate();
				switch(transportType) {
					case 1:
						var pickUp = 25 * rate;
						var costoLb = 1.8;
						var costoFleteLb = costoLb * rate;
						var fleteEtc = finalTotalWeight * costoFleteLb;
						var seguro = 0.015 * (totalPrice + totalPrice * 0.022 + finalTotalWeight * costoLb) * rate;
						var iva = (pickUp + fleteEtc + seguro) * ivaRate;
						var total = iva + pickUp + fleteEtc + seguro + extraShipping;
						importPrice = total;
						break;
					case 2:
						var costoLb = 1.65;
						var corteGuia = 20 * rate;
						var almacenaje = 2 * rate;
						var pickUp = 25 * rate;
						var fleteEtc = finalTotalWeight * costoLb * rate;
						var seguro = 0.015 * (totalPrice + totalPrice * 0.022 + finalTotalWeight * costoLb) * rate;
						var iva = (pickUp + fleteEtc + seguro) * ivaRate;
						var total = iva + pickUp + fleteEtc + seguro + corteGuia + almacenaje + extraShipping;
						importPrice = total;
						break;
					default:
						var fleteRate = 0.87;
						var cifPercentaje = 0.0085;
						var combex = 0.006017;

						var tramitePoliza = 45 * rate;
						var almacenaje = (((totalPrice * 1.022 + finalTotalWeight * fleteRate) * rate ) * combex) + 150;
						var pickUp = 45 * rate;
						var fleteEtc = finalTotalWeight * rate * fleteRate;
						var corteGuia = 45 * rate;
						var cif = cifPercentaje * (totalPrice * 1.022 + finalTotalWeight * fleteRate) * rate;

						var sum = tramitePoliza + almacenaje + pickUp + fleteEtc + corteGuia + cif;

						var total = sum * 1.12;

						importPrice = total;

						break;
				}
			}

			var calculate = function () {
				var rate = getRate()
				items = items.map(function(item) {
					var newItem = {
						partNumber: item.partNumber,
						quantity: item.quantity,
						description: item.description,
						unitWeight: item.unitWeight,
						weight: item.unitWeight * item.quantity,
						unitPrice: item.unitPrice,
						qUnitPrice: item.unitPrice * rate,
						price: item.unitPrice * item.quantity,
						qPrice: item.unitPrice * rate * item.quantity,
						percentajePrice: (item.unitWeight * item.quantity)/totalWeight,
						selectedPercentaje: item.selectedPercentaje
					}
					return newItem;
				})

				calculateTransport();
			}

			var calculateFinalPrice = function (unitaryPrice) {
				var rate = getRate();
				var item = {
					"priceA": unitaryPrice,
					"priceB": unitaryPrice,
					"priceC": unitaryPrice
				}
				// switch(transportType) {
				// 	case 1:
				// 		item.priceC = (unitaryPrice/(0.75))*(1 + ivaRate)
				// 		item.priceB = (unitaryPrice/(0.7))*(1 + ivaRate)
				// 		item.priceA = (unitaryPrice/(0.65))*(1 + ivaRate)
				// 		break;
				// 	case 2:
						item.priceC = (unitaryPrice/(0.75))*(1 + ivaRate)
						item.priceB = (unitaryPrice/(0.7))*(1 + ivaRate)
						item.priceA = (unitaryPrice/(0.65))*(1 + ivaRate)
						// item.priceC = unitaryPrice * 1.05 * 1.2
						// item.priceB = unitaryPrice * 1.05 * 1.25
						// item.priceA = unitaryPrice * 1.05 * 1.3
					// 	break;
					// default:
					// 	break;
				// }

				return item;
			}

			var renderTable = function(changeWeight = false) {
				var tableBody = "";
				var summaryTableBody = "";
				var grandTotal = 0;
				var secondGrandTotal = 0;
				var tempTotalWeight = 0;
				var tempTotalPrice = 0;
				for(var i = 0; i < items.length; i++) {
					tempTotalWeight += items[i].unitWeight * items[i].quantity;
					tempTotalPrice += items[i].unitPrice * items[i].quantity;
				}
				totalWeight = tempTotalWeight;
				totalPrice = tempTotalPrice;
				if(!changeWeight) {
					finalTotalWeight = totalWeight;
					updateWeight();
				}

				calculate();

				for(var i = 0; i < items.length; i++) {
					var importCost = importPrice * items[i].percentajePrice;
					var dai = (items[i].qPrice*0.05);
					var helperIva = (items[i].qPrice + dai + importCost);
					var totalIva = helperIva * ivaRate;
					var costo = helperIva * (1 + ivaRate);
					var costoUnitario = costo / items[i].quantity;
					tableBody += "<tr>";
					tableBody += "<td>" + items[i].partNumber + "</td>";
					tableBody += "<td>" + items[i].quantity + "</td>";
					tableBody += "<td>" + items[i].description + "</td>";
					tableBody += "<td>" + items[i].weight.toFixed(2) + "</td>";
					tableBody += "<td>" + items[i].price.toFixed(2) + "</td>";
					tableBody += "<td>" + items[i].qPrice.toFixed(2) + "</td>";
					tableBody += "<td>" + formatNumberQ(dai) + "</td>";
					tableBody += "<td>" + formatNumberQ(totalIva) + "</td>";
					tableBody += "<td>" + formatNumberQ(costoUnitario) + "</td>";
					tableBody += "<td>" + formatNumberQ(costo) + "</td>";
					tableBody += "<td><i data='" + (i) + "' class='remove-item pointer text-danger glyphicon glyphicon-trash'></i></td>";
					tableBody += "</tr>";
					grandTotal += costo;

					var prices = calculateFinalPrice(costoUnitario);

					var calculatedPrice = (costoUnitario / items[i].selectedPercentaje )* (ivaRate + 1);
					var lastPrice = calculatedPrice * items[i].quantity;
					summaryTableBody += "<tr>"
					summaryTableBody += "<td>" + items[i].partNumber + "</td>";
					summaryTableBody += "<td>" + items[i].quantity + "</td>";
					summaryTableBody += "<td>" + items[i].description + "</td>";
					summaryTableBody += "<td>" + formatNumberQ(prices.priceA) + "</td>";
					summaryTableBody += "<td>" + formatNumberQ(prices.priceA * items[i].quantity) + "</td>";
					summaryTableBody += "<td>" + formatNumberQ(prices.priceB) + "</td>";
					summaryTableBody += "<td>" + formatNumberQ(prices.priceB * items[i].quantity) + "</td>";
					summaryTableBody += "<td>" + formatNumberQ(prices.priceC) + "</td>";
					summaryTableBody += "<td>" + formatNumberQ(prices.priceC * items[i].quantity) + "</td>";
					summaryTableBody += "<td><div class='input-group'><input data='" + i + "' type='number' class='form-control percentaje' value='" + ((1 - items[i].selectedPercentaje) * 100).toFixed(2) + "'>  <div class='input-group-addon'>%</div></div></td>";
					summaryTableBody += "<td>" + formatNumberQ(calculatedPrice) + "</td>";
					summaryTableBody += "<td>" + formatNumberQ(lastPrice) + "</td>";
					summaryTableBody += "</tr>"
					secondGrandTotal += lastPrice;
				}

				$("#grand-total").text(formatNumberQ(grandTotal));
				$("#second-grand-total").text(formatNumberQ(secondGrandTotal));
				$("#cotizador-body").html(tableBody);
				$("#summary-body").html(summaryTableBody);
			}

			var formatNumberQ = function(number) {
				return "Q. " + number.toLocaleString(undefined, {maximumFractionDigits:2})
			}

			var getRate = function() {
				var rate = parseFloat($("#rate").val());
				return (isNaN(rate) ? 0 : rate);
			}

			var updateWeight = function() {
				$("#total-weight").val(totalWeight.toFixed(2));
			}

			$("#total-weight").keyup(function() {
				var totalWeight = parseFloat($(this).val())
				finalTotalWeight = (isNaN(totalWeight) ? 0 : totalWeight);
				renderTable(true);
			})

			$("#extra-shipping").keyup(function() {
				var shipping = parseFloat($(this).val())
				extraShipping = (isNaN(shipping) ? 0 : shipping);
				renderTable(true);
			})

			$("#rate").keyup(function() {
				renderTable();
			})

			$("#summary-body").on("change", "tr .percentaje", function() {
				var item = parseInt($(this).attr('data'));
				var value = 1 - (parseFloat($(this).val())/100);
				items[item].selectedPercentaje = value;
				renderTable(true);
			})

			$("#cotizador-body").on("click", "tr .remove-item", function() {
				var item = parseInt($(this).attr('data'));
				items.splice(item, 1);
				renderTable();
			})

			$(".new-part-input").keydown(function(event) {
				if (event.which == 13) {
					var valid = true;
					var inputs = $(".new-part-input");
					for(var i = 0; i < inputs.length; i++) {
						if($(inputs[i]).val() == "") {
							valid = false;
						}
					}
					var quantity = parseFloat($(inputs[1]).val())
					var price = parseFloat($(inputs[4]).val())
					var weight = parseFloat($(inputs[3]).val())
					// console.log(isNaN(price))
					if(isNaN(price) || isNaN(weight) || isNaN(quantity)) {
						valid = false;
					}
					if(!valid) {
						alert("Debe llenar todos los campos correctamente.");
					}else {

						var item = {
							"partNumber": $(inputs[0]).val(),
							"quantity": quantity,
							"description": $(inputs[2]).val(),
							"unitWeight": weight,
							"unitPrice": price,
							selectedPercentaje: 0.75
						}
						items.push(item);
					}
					renderTable();
					for(var i = 0; i < inputs.length; i++) {
						$(inputs[i]).val("")
					}

					$(inputs[0]).focus();
				}
			})
			$(".courier-type").click(function() {
				$(".courier-type").removeClass("active");
				$(this).addClass('active');
				transportType = parseInt($(this).attr('data'))
				renderTable();
			});
			updateWeight();
		})
	</script>
@endsection
