<?php

namespace App\Http\Controllers;

use App\Models\Cotization;
use App\Models\CotizationItem;
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
        $cotizations = Cotization::get()
            ->map(function ($cotization) {

                return $cotization;
            });

        return Inertia::render('Historial/IHistorial', ['cotizations' => $cotizations]);
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
        $cotizations = auth()->user->cotizations;
        

        $request->validate([
            'referencia' => 'required',
            'status' => 'required',
            'codigoProveedor' => 'required',
            'cambio' => 'required',
            'transporte' => 'required',
            'fleteExtra' => 'required',
            'pesoTotal' => 'required',



            'numeroParte' => 'required',
            'cantidad' => 'required',
            'descripcion' => 'required',
            'pesoUnidad' => 'required',
            'precio' => 'required',
        ]);

        if (request()->cotizationId == 0) {
            $cotization = new Cotization();
            $cotization->items = collect();
        } else {
            $cotization = Cotization::with('items')->find(request()->cotizationId);
        }

        $cotization_item = new CotizationItem();
        $cotization_item->cotization_id = $cotization->id;
        $cotization_item->user_id = auth()->user()->id;
        $cotization_item->save();

        $cotization = $this->calculateCotization($cotization);

        return response()->json(['cotization' => $cotization, 'items' => $cotization->items]);
    }

    public function calculateCotization($cotization)
    {
        $total  = 0;
        foreach ($cotization->items as $item) {
            $item->total = $item->cantidad * $item->precio;
        }

        $cotization->total = $total;
        $cotization->save();

        return $cotization;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotization  $cotization
     * @return \Illuminate\Http\Response
     */
    public function show(Cotization $cotization)
    {
        return Inertia::render('Cotization/IShowCotization', ['cotizations' => $cotization]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotization  $cotization
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotization $cotization)
    {
        return Inertia::render('Cotization/IEditCotization', ['cotizations' => $cotization]);
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

        $items = $request->items;
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


        $cotization = $this->calculateCotization($cotization);
        return response()->json(['cotization' => $cotization, 'items' => $cotization->items]);
    }
}
