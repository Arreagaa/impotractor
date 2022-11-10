<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotization;

class HistorialController extends Controller {
  public function index() {
  	$cotizaciones = Cotization::orderBy('created_at', 'desc')->get();
  	return view('historial.index')->with('cotizaciones', $cotizaciones);
  }
}
