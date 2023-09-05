<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\Json;
use App\Models\Item;
use App\Models\OrderItem;
use App\Models\Settlement;
use App\Imports\ItemImport;
use App\Imports\StockImport;
use App\Imports\MinimumImport;
use Excel;
use App\Exports\ItemExport;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function index()
    {
        $orders = OrderItem::paginate(10);

        return Inertia::render('Orders/IShow', ['orders' => $orders]);
    }

    public function exportExcel($id)
    {
        $order = OrderItem::find($id);
        if ($order == null) {
            return Inertia::render('IDashboard/utils/IError');
        }

        $year = Carbon::parse($order->created_at)->format('Y');
        $fileName = 'Analisis-' . $order->name . '-' . $year . '.xlsx';

        $settlements = Settlement::all();

        return Excel::download(new ItemExport($year, $settlements), $fileName);
    }

    public function onlyOrder()
    {
        $orderId = request()->get('id', 0);
        $order = null;
        $order = OrderItem::with(['items'])->find($orderId);

        if ($orderId != 0) {
            if ($order == null) {
                return Inertia::render('IDashboard/utils/IError');
            }
        }

        return Inertia::render(
            'Orders/IData',
            ['order' => $order]
        );
    }

    public function order($id)
    {

        $order = OrderItem::query()->find($id);

        if ($order == null) {
            return Inertia::render('IDashboard/utils/IError');
        }

        $settlements = Settlement::all();

        $search = request()->q;
        $items = Item::query()
            ->where('order_item_id', $order->id)
            ->where('partNumber', 'like', '%' . $search . '%')
            ->orderByRaw('stock - quarterlyForecast DESC')
            ->paginate(10, ['*'], 'page')
            ->withQueryString();

        return Inertia::render(
            'Orders/IData',
            ['order' => $order, 'orderItems' => $items, 'search' => $search, 'settlements' => $settlements]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        set_time_limit(200);

        if (request()->orderId == 0) {
            $order = new OrderItem();
            $order->name = $request->name;
            $order->save();
        } else {
            $order = OrderItem::with('items')
                ->find(request()->orderId);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            Excel::import(new ItemImport($order->id), $file);
        }

        if ($request->hasFile('stockFile')) {
            $stockFile = $request->file('stockFile');
            Excel::import(new StockImport($order->id), $stockFile);
        }

        if ($request->hasFile('amountFile')) {
            $amountFile = $request->file('amountFile');
            Excel::import(new MinimumImport($order->id), $amountFile);
        }

        return Redirect::route('order', ['id' => $order->id]);
    }

    public function updateItem($order_item_id, $id)
    {
        $item = Item::with('orderItem')->find($id);
        $item->ene = request()->ene;
        $item->feb = request()->feb;
        $item->mar = request()->mar;
        $item->abr = request()->abr;
        $item->may = request()->may;
        $item->jun = request()->jun;
        $item->jul = request()->jul;
        $item->ago = request()->ago;
        $item->sep = request()->sep;
        $item->oct = request()->oct;
        $item->nov = request()->nov;
        $item->dic = request()->dic;
        $item->stock = request()->stock;
        $item->rotation = request()->rotation;
        $item->settlement = request()->settlement;

        $item->monthlyForecast = request()->monthlyForecast;
        $item->quarterlyForecast = request()->quarterlyForecast;

        $item->missingMonthly = request()->missingMonthly;
        $item->quarterlyShortfall = request()->quarterlyShortfall;

        $item->suggestion = request()->suggestion;
        $item->suggestionSeller = request()->suggestionSeller;
        $item->suggestionSeller3 = request()->suggestionSeller3;

        $item->update();

        return Redirect::route('order', ['id' => $order_item_id]);
    }

    public function deleteItem($order_item_id, $id)
    {
        $item = Item::find($id);
        $item->delete();

        return Redirect::route('order', ['id' => $order_item_id]);
    }

    public function destroy(OrderItem $order)
    {
        $order->items()->delete();
        $order->delete();
        return Redirect::route('orders.index');
    }

    public function updateItems(Request $request, $order_id)
    {
        $items = $request->items;
        $page = $request->page ?? 1;

        foreach ($items as $item) {
            $item = Item::find($item['id'])
                ->update([
                    'ene' => $item['ene'],
                    'feb' => $item['feb'],
                    'mar' => $item['mar'],
                    'abr' => $item['abr'],
                    'may' => $item['may'],
                    'jun' => $item['jun'],
                    'jul' => $item['jul'],
                    'ago' => $item['ago'],
                    'sep' => $item['sep'],
                    'oct' => $item['oct'],
                    'nov' => $item['nov'],
                    'dic' => $item['dic'],
                    'stock' => $item['stock'],
                    'rotation' => $item['rotation'],
                    'settlement' => $item['settlement'],
                    'monthlyForecast' => $item['monthlyForecast'],
                    'quarterlyForecast' => $item['quarterlyForecast'],
                    'missingMonthly' => $item['missingMonthly'],
                    'quarterlyShortfall' => $item['quarterlyShortfall'],
                    'suggestion' => $item['suggestion'],
                    'suggestionSeller' => $item['suggestionSeller'],
                    'suggestionSeller3' => $item['suggestionSeller3'],
                ]);
        }

        return Redirect::route('order', ['id' => $order_id, 'page' => $page]);
    }
}
