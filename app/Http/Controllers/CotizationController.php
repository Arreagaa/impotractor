<?php

namespace App\Http\Controllers;

use App\Models\Cotization;
use App\Models\CotizationItem;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\Json;

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
    public function cotization()
    {
        $cotizationId = request()->get('id', 0);
        $cotization = null;
        $cotization = Cotization::with('items')
            ->withSum('items', 'weightUnit')
            ->withSum('items', 'quantity')
            ->find($cotizationId);

        if($cotizationId != 0){
            if($cotization == null){
                return abort(404);
            }
        }

        return Inertia::render(
            'Cotization/ICotization',
            ['cotization' => $cotization]
        );
    }

    public function updateItems(){
        $items = request()->items;
        
        foreach ($items as $value) {
            $cotization_item = CotizationItem::find($value['id']);
            $cotization_item->percentage = $value['percentage'];
            $cotization_item->total_unit = $value['total_unit'];
            $cotization_item->total = $value['total'];
            $cotization_item->update();
        }

        return response()->json(['msg' => 'ta bien']);
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
            'reference' => 'required',
            'is_ordered' => 'required',
            'provider_code' => 'required',
            'rate' => 'required',
            'transport' => 'required',
            'extra_shipping' => 'required',
            'total_weight' => 'required',
            /**/
            'partNumber' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'weightUnit' => 'required',
            'price' => 'required',
        ]);


        if (request()->cotizationId == 0) {
            $cotization = new Cotization();
            $cotization->reference = $request->reference;
            $cotization->is_ordered = $request->is_ordered;
            $cotization->provider_code = $request->provider_code;
            $cotization->rate = $request->rate;
            $cotization->transport = $request->transport;
            $cotization->extra_shipping = $request->extra_shipping;
            $cotization->total_weight = $request->total_weight;
            $cotization->user_id = auth()->user()->id;
            $cotization->save();

            $cotization->items = collect();
        } else {
            $cotization = Cotization::with('items')
                ->withSum('items', 'weightUnit')
                ->find(request()->cotizationId);
        }
        
        $cotization_item = new CotizationItem();
        $cotization_item->partNumber = $request->partNumber;
        $cotization_item->quantity = $request->quantity;
        $cotization_item->description = $request->description;
        $cotization_item->weightUnit = $request->weightUnit;
        $cotization_item->price = $request->price;
        $cotization_item->cotization_id = $cotization->id;
        $cotization_item->save();

        $cotization->items->push($cotization_item);

        $cotization->total_weight = $cotization->items_weight_unit_sum + $cotization_item->weightUnit;
        $cotization->save();
        
        return Redirect::route('cotization', ['id' => $cotization->id]);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotization  $cotization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotization $cotization)
    {
        // estges es un ejemplo de response json
        return response()->json(['cotization' => $cotization, 'items' => $cotization->items]);
        return Redirect::route('cotization', ['id' => $cotization->id]);
    }
}
