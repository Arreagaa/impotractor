<?php

namespace App\Http\Controllers;

use App\Models\Cotization;
use App\Models\CotizationItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\Json;
use PDF;

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

    public function printPDF($cotization_id) {
        $cotization = Cotization::with(['items', 'order'])->find($cotization_id);

        $order = Order::with('cotization')->find($cotization_id);
        $cotization_item = CotizationItem::where('cotization_id', $cotization_id)->get();
        
		$data = ['items' => $cotization_item, 'order' => $order];

        $pdf = PDF::loadView('pdf.cotization', $data); 
		//return $pdf->download('Cotizacion.pdf');

        return $pdf->stream('Cotizacion.pdf', array('Attachment'=>1) );
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
        $cotization = Cotization::with(['items', 'order'])->find($cotizationId);

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
        $cotization_item->total = $cotization_item->quantity * $cotization_item->price;
        $cotization_item->save();

        $cotization->items->push($cotization_item);

        $cotization->save();

        $cotization->items = collect();

        return Redirect::route('cotization', ['id' => $cotization->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotization  $cotization
     * @return \Illuminate\Http\Response
     */

    public function updateItem($cotization_id, $id)
    {
        $cotization_item = CotizationItem::with('cotization')->find($id);
        $cotization_item->percentage = request()->percentage;
        $cotization_item->total = request()->total;

        $cotization_item->update();

        return Redirect::route('cotization', ['id' => $cotization_id]);
    }

    public function destroy(Cotization $cotization)
    {
        $cotization->delete();

        return Redirect::route('cotization');
    }

    public function deleteItem($cotization_id, $id)
    {

        $cotization_item = CotizationItem::find($id);
        $cotization_item->delete();

        return Redirect::route('cotization', ['id' => $cotization_id]);
    }

    public function cotizationOrder(Request $request, $id)
    {
        $cotization = Cotization::with('items')->find($id);
        $cotization->is_ordered = true;
        $cotization->update();

        $request->validate([
            'nit' => 'required',
            'client' => 'required',
            'contact' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
            'paymentMethod' => 'required',
            'type' => 'required',
            'discount' => 'required',
        ]);

        $order = new Order();
        $order->nit = $request->nit;
        $order->client = $request->client;
        $order->contact = $request->contact;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->city = $request->city;
        $order->paymentMethod = $request->paymentMethod;
        $order->type = $request->type;
        $order->discount = $request->discount;
        $order->cotization_id = $cotization->id;
        $order->user_id = auth()->user()->id;
        $order->save();
        
        return Redirect::route('cotizations.index');
    }
}