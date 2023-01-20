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
            ->find($cotizationId);

        if ($cotizationId != 0) {
            if ($cotization == null) {
                return abort(404);
            }
        }

        return Inertia::render(
            'Cotization/ICotization',
            ['cotization' => $cotization]
        );
    }

    public function updateItems()
    {
        $items = request()->items;

        foreach ($items as $value) {
            $cotization_item = CotizationItem::find($value['id']);
            $cotization_item->percentage = $value['percentage'];
            $cotization_item->total_unit = $value['total_unit'];
            $cotization_item->total = $value['total'];
            $cotization_item->update();
        }

        return response()->json(['msg' => 'updateItems']);
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
            /**/
            'partNumber' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);


        if (request()->cotizationId == 0) {
            $cotization = new Cotization();
            $cotization->reference = $request->reference;
            $cotization->is_ordered = $request->is_ordered;
            $cotization->provider_code = $request->provider_code;
            $cotization->rate = $request->rate;
            $cotization->transport = $request->transport;
            $cotization->user_id = auth()->user()->id;
            $cotization->save();
        } else {
            $cotization = Cotization::with('items')
                ->find(request()->cotizationId);
        }

        $cotization_item = new CotizationItem();
        $cotization_item->partNumber = $request->partNumber;
        $cotization_item->quantity = $request->quantity;
        $cotization_item->description = $request->description;
        $cotization_item->price = $request->price;
        $cotization_item->cotization_id = $cotization->id;
        $cotization_item->save();

        $cotization->items->push($cotization_item);

        $cotization->save();

        $cotization->items = collect();

        return Redirect::route('cotization', ['id' => $cotization->id]);
    }

    public function calculateCotization($cotization)
    {
        $total  = 0;
        foreach ($cotization->items as $item) {
            $item->total = $item->quantity * $item->price;
        }

        $cotization->total = $total;
        $cotization->save();

        return response()->json(['cotization' => $cotization, 'items' => $cotization->items]);
        //return $cotization;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotization  $cotization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotization $cotization, CotizationItem $cotization_item)
    {
        //$cotization = CotizationItem::find('id');
        //$cotization->items()->find('id')->delete();
        //return response()->json(['cotization' => $cotization, 'items' => $cotization->items]);

        $cotization = CotizationItem::find('id');
        
        $cotization->delete();

        //CotizationItem::where('id', 1 )->delete();

        /*$cotization_item = CotizationItem::find($cotization_item->id);
        $cotization_item->delete();*/
        
        return Redirect::route('cotization', ['id' => $cotization->id]);
    }
}
