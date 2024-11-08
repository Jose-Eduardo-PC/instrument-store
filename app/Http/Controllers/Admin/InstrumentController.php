<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instrument;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class InstrumentController extends Controller
{
    public function datatables()
    {
        return DataTables::eloquent(Instrument::query()
            ->leftJoin('categories', 'instruments.category_id', '=', 'categories.id')
            ->select(['instruments.*', 'categories.name as category_name'])
        )
        ->addColumn('btn', 'admin.instruments.partials.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }
    
    public function index()
    {
        $instruments = Instrument::all();
        return view('admin.instruments.index', compact('instruments'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.instruments.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048'
        ]);

        $instrument = new Instrument($request->all());
        if ($request->hasFile('image')) {
            $instrument->addMedia($request->file('image'))->toMediaCollection('instruments');
        }
        $instrument->save();

        return redirect()->route('instruments.index')->with('success', 'Instrumento creado correctamente.');
    }

    public function show($id)
    {
        $instrument = Instrument::findOrFail($id);
        return view('admin.instruments.show', compact('instrument'));
    }

    public function edit($id)
    {
        $instrument = Instrument::findOrFail($id);
        $categories = Category::all();
        return view('admin.instruments.edit', compact('instrument', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048'
        ]);

        $instrument = Instrument::findOrFail($id);
        $instrument->update($request->all());
        if ($request->hasFile('image')) {
            $instrument->addMedia($request->file('image'))->toMediaCollection('instruments');
        }

        return redirect()->route('admin.instruments.index')->with('success', 'Instrumento actualizado correctamente.');
    }

    public function destroy($id)
    {
        $instrument = Instrument::findOrFail($id);
        $instrument->delete();

        return redirect()->route('instruments.index')->with('success', 'Instrumento eliminado correctamente.');
    }
}
