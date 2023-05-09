<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\Json;
use App\Models\Settlement;  
use App\Imports\SettlementImport;  
use Excel;

class SettlementController extends Controller
{
    public function index(Request $request)
    {
        $search = request()->q;
        $settlements = Settlement::where('partNumber', 'like', '%' . $search . '%')->paginate(10);

        return Inertia::render('Settlement/ISettlement', ['settlements' => $settlements, 'search' => $search]);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new SettlementImport, $file);

        return Redirect::route('settlements.index');
    }

    public function destroy(Settlement $settlement)
    {
        $settlement->delete();
        return Redirect::route('settlements.index');
    }
}
