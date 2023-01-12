<?php

namespace App\Http\Controllers;

use App\Models\Cotization;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class CotizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizations = Cotization::all();
        return Inertia::render('Historial/IHistorial', ['cotizations'=>$cotizations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Cotization/ICotization');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'referencia'=>'required',
            'status'=>'required',
            'codigoProveedor'=>'required',
            'cambio'=>'required',
            'transporte'=>'required',
            'fleteExtra'=>'required',
            'pesoTotal'=>'required',
            'numeroParte'=>'required',
            'cantidad'=>'required',
            'descripcion'=>'required',
            'pesoUnidad'=>'required',
            'precio'=>'required',
        ]);

        Cotization::create($request->all());
        return Redirect::route('cotizations.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotization  $cotization
     * @return \Illuminate\Http\Response
     */
    public function show(Cotization $cotization)
    {
        return Inertia::render('Cotization/IShowCotization',['cotizations'=> $cotization]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotization  $cotization
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotization $cotization)
    {
        return Inertia::render('Cotization/IEditCotization',['cotizations'=> $cotization]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cotization  $cotization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotization $cotization)
    {
        $cotization->update($request->all());
        return Redirect::route('cotizations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotization  $cotization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotization $cotization)
    {
        $cotization->delete();
        return Redirect::route('cotizations.create');
    }
}
