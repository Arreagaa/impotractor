<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotization;
use App\Order;
use Crypt;
use PDF;
use Excel;
use PHPExcel_Worksheet_Drawing;

class CotizationController extends Controller {
	public function index() {
		return view('cotization.index');
	}

	public function printPDF($id) {
		$cotizationId = Crypt::decrypt($id);
		$cotization = json_decode(Cotization::find($cotizationId)->items);

		$order = Order::where('cotization_id', $cotizationId)->first();
		$data = ['items' => $cotization, 'order' => $order];

		$pdf = PDF::loadView('pdf.cotizacion', $data);
		return $pdf->download('cotizacion.pdf');
	}

	public function excel($id) {
        $cotizationId = Crypt::decrypt($id);
        $cotization = json_decode(Cotization::find($cotizationId)->items);

        $order = Order::where('cotization_id', $cotizationId)->first();

        $excelArray = [];
        $excelArray[] = [' '];
        $excelArray[] = ['Cotizacion'];
        $excelArray[] = ['Nit:', 'Cliente:', 'Contacto:', 'Ciudad:'];
        $excelArray[] = [$order->nit, $order->client, $order->contact_name, $order->city];
        $excelArray[] = ['Telefono:', 'E-Mail:', 'Tipo:', 'Forma de Pago:'];
        $excelArray[] = [$order->contact_phone, $order->contact_email, $order->type, $order->payment_method];
        $excelArray[] = [''];
        $excelArray[] = ['Parte', 'Cantidad', 'Descripcion', 'Precio (Q.)', 'Total (Q.)'];

        $total = 0;
        $rowCount = 8;

        foreach ($cotization as $cot) {
            $total += $cot->finalPrice;
            $rowCount++;
            $excelArray[] = [$cot->partNumber, $cot->quantity, $cot->description,
                             'Q. '.number_format((float)$cot->finalUnitPrice, 2, '.', ','),
                             'Q. '.number_format((float)$cot->finalPrice, 2, '.', ',')];
        }

        $excelArray[] = ['', '', '', 'Gran Total', 'Q. '.number_format((float)$total, 2, '.', ',')];
        $excelArray[] = ['', '', '', 'Descuento', 'Q. '.number_format((float)$order->discount, 2, '.', ',')];
        $excelArray[] = ['', '', '', 'SubTotal', 'Q. '.number_format((float)$total/1.12, 2, '.', ',')];
        $excelArray[] = ['', '', '', 'IVA', 'Q. '.number_format((float)$total-($total/1.12), 2, '.', ',')];
        $excelArray[] = ['', '', '', 'Valor Total', 'Q. '.number_format((float)$total, 2, '.', ',')];

        $excelOut = Excel::create('cotizacion', function($excel) use ($excelArray, $rowCount){
            $excel->setTitle('Cotizacion');
            $excel->setCreator('Cotizador Impotractor, S.A')->setCompany('Impotractor, S.A.');
            $excel->setDescription('Cotizacion');

            $excel->sheet('Cotizacion', function($sheet) use ($excelArray, $rowCount){
                $rowCountSpecial = $rowCount + 5;
								$sheet->setShowGridlines(false);
                $sheet->setStyle(array(
                    'font' => array(
                        'name' => 'Times New Roman',
                        'size' => 12
                    ),
                ));
                $sheet->cells('A1:E'.($rowCountSpecial), function ($cells) {
                   $cells->setBackground('#ffffff');
                   $cells->setAlignment('left');
                });
                for ($i=0; $i < $rowCountSpecial; $i++) {
                    $sheet->setHeight($i, 22);
                }
								// Add top logo
                $sheet->mergeCells('A1:E1');
                $sheet->mergeCells('A2:E2');
								$topIcon = new PHPExcel_Worksheet_Drawing;
		            $topIcon->setPath(public_path('images/impotractor/impotractor-logo.png')); //your image path
		            $topIcon->setCoordinates('B1');
		            $topIcon->setWorksheet($sheet);

                $sheet->cell('A1', function($cell) {
                    $cell->setFontSize(18);
                    $cell->setFontWeight('bold');
										$cell->setValignment('center');
										$cell->setBackground('#FDD40A');
                });
								// Set height for a single row
								$sheet->setHeight(1, 90);
                $sheet->cell('A2', function($cell) {
                    $cell->setFontSize(14);
                    $cell->setFontWeight('bold');
										$cell->setBorder('none', 'none', 'thick', 'none');
                });
                $sheet->fromArray($excelArray, null, 'A1', false, false);
                $sheet->cells('A3:D3', function($cells) {
                    $cells->setFontWeight('bold');
                });
								$sheet->cells('A4:D4', function($cells) {
										$cells->setBorder('none', 'none', 'thin', 'none');
								});
                $sheet->cells('A5:D5', function($cells) {
                    $cells->setFontWeight('bold');
                });
								$sheet->cells('A6:D6', function($cells) {
										$cells->setBorder('none', 'none', 'thin', 'none');
								});
                $sheet->cells('A8:E8', function($cells) {
                    $cells->setFontWeight('bold');
										$cells->setBorder('none', 'none', 'thick', 'none');
                });
								// This for adds bottom margins to all products cells.
								for ($i=9; $i <= $rowCount; $i++) {
									$sheet->cells('A'.$i.':E'.$i, function($cells) {
										$cells->setBorder('none', 'none', 'thin', 'none');
									});
								}
								// This for adds bottom margin to calculated values.
								for ($i = $rowCount + 1; $i <= $rowCountSpecial; $i++) {
									$sheet->cells('D'.$i.':E'.$i, function($cells) use ($i, $rowCountSpecial) {
										$cells->setFontWeight('bold');
										$cells->setBorder('none', 'none', 'thin', 'none');
										// Last element has a diferent style.
										if ($i == $rowCountSpecial) {
											$cells->setBackground('#161616');
											$cells->setFontColor('#ffffff');
										}
									});
								}
								// Now Observaciones section.
								$rowCount += 6;

								$sheet->mergeCells('A'.($rowCount + 1).':E'.($rowCount + 1));
								$sheet->cell('A'.($rowCount + 1), function($cell) {
									$cell->setFontSize(14);
									$cell->setFontWeight('bold');
									$cell->setBorder('none', 'none', 'thick', 'none');
									$cell->setValue('Observaciones');
								});

								for ($i = 2; $i <= 4; $i++) {
									$sheet->mergeCells('A'.($rowCount + $i).':C'.($rowCount + $i));

								}

                $sheet->cell('A'.($rowCount+2), function ($cell) {
                    $cell->setValue('Esta cotización tiene validez de 15 días.');
                });
                $sheet->cell('A'.($rowCount+3), function ($cell) {
                    $cell->setValue('BANRURAL CUENTA #3282074390');
                });
                $sheet->cell('A'.($rowCount+4), function ($cell) {
                    $cell->setValue('BANCO INDUSTRIAL CUENTA#027-002583-6');
                });

								// Footer part.
								$rowCount += 8;
								$info = array('6 ave 2-68 z.2 de Mixco, 01053, Guatemala',
												'cotizaciones@impotractor.com',
												'2250-7580 / 2250-5934');

								// Add black background-color.
								for ($i = 1; $i <= 5; $i++) {
									$sheet->cells('A'.($rowCount + $i).':E'.($rowCount + $i), function($cells) {
										$cells->setBackground('#161616');
										$cells->setFontColor('#ffffff');
										$cells->setFontSize(10);
									});
									// Merge some cells to let text fit.
									if ($i >= 2 && $i <=4) {
										$sheet->mergeCells('A'.($rowCount + $i).':B'.($rowCount + $i));
										$sheet->cell('A'.($rowCount + $i), function($cell) use ($i, $info) {
											$cell->setValue($info[$i - 2]);
										});
									}
								}

								// add bottom web page.
								$sheet->cell('D'.($rowCount + 2), function($cell) {
									$cell->setValue('www.impotractor.com');
								});
								// add bottom icon.
								$footIcon = new PHPExcel_Worksheet_Drawing;
		            $footIcon->setPath(public_path('images/impotractor/impotractor-light-logo.png')); //your image path
		            $footIcon->setCoordinates('D'.($rowCount + 3));
		            $footIcon->setWorksheet($sheet);

            });
        });

        return $excelOut->download('xlsx');
    }

	public function edit($id) {
		$cotizationId = Crypt::decrypt($id);
		$cotization = Cotization::find($cotizationId);

		$order = Order::where('cotization_id', $cotizationId)->first();

		return view('cotization.edit')->with('cotization', $cotization)->with('order', $order);
	}

	public function order($id) {
		$cotizationId = Crypt::decrypt($id);
		$newOrder = request()->all();
		$cotization = Cotization::find($cotizationId);
		$cotization->is_ordered = 1;

		$newOrder["cotization_id"] = $cotizationId;
		$order = new Order;
		$order->fill($newOrder);
		$order->save();
		$cotization->save();

		return response()->json(["success" => 1]);
	}

	public function update($id) {
		$cotizationId = Crypt::decrypt($id);
		$cotization = Cotization::find($cotizationId);
		$cotization->update(request()->all());

		return response()->json(["success" => 1]);
	}

	public function store() {
		$cotization = new Cotization();
		$cotization->reference = request()->reference;
		$cotization->rate = request()->rate;
		$cotization->total_weight = request()->total_weight;
		$cotization->option = request()->option;
		$cotization->items = request()->items;
		$cotization->extra_shipping = request()->extra_shipping;
		$cotization->provider_code = request()->provider_code;
		$cotization->policy = request()->policy;
		$cotization->is_ordered = 0;
		$cotization->save();

		return response()->json(["success" => 1]);
	}
}
