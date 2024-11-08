<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruments = Instrument::all();
        return view('web.instruments.index', compact('instruments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instrument = Instrument::findOrFail($id);
        $relatedProducts = [];
        return view('web.instruments.show', compact('instrument', 'relatedProducts'));
    }

}
