<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    public function datatables()
    {
        return DataTables::eloquent(Content::query())
            ->addColumn('btn', 'admin.contents.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function index()
    {
        $contents = Content::all();
        return view('admin.contents.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.contents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'type' => 'required|string',
            'audio' => 'nullable|mimes:mp3,wav,ogg|max:20480',
            'video' => 'nullable|mimes:mp4,avi,mov|max:51200', // Validación para videos
            'images.*' => 'nullable|image|max:2048',
        ]);

        $content = new Content($request->all());
        $content->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $content->addMedia($image)->toMediaCollection('content_images');
            }
        }

        if ($request->hasFile('audio')) {
            $content->addMedia($request->file('audio'))->toMediaCollection('content_audio');
        }

        if ($request->hasFile('video')) {
            $content->addMedia($request->file('video'))->toMediaCollection('content_video');
        }

        return redirect()->route('contents.index')->with('success', 'Contenido creado correctamente.');
    }

    public function show($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.contents.show', compact('content'));
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.contents.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'type' => 'required|string',
            'audio' => 'nullable|mimes:mp3,wav,ogg|max:20480',
            'video' => 'nullable|mimes:mp4,avi,mov|max:51200', // Validación para videos
            'images.*' => 'nullable|image|max:2048',
        ]);

        $content = Content::findOrFail($id);
        $content->update($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $content->addMedia($image)->toMediaCollection('content_images');
            }
        }

        if ($request->hasFile('audio')) {
            $content->addMedia($request->file('audio'))->toMediaCollection('content_audio');
        }

        if ($request->hasFile('video')) {
            $content->addMedia($request->file('video'))->toMediaCollection('content_video');
        }

        return redirect()->route('admin.contents.index')->with('success', 'Contenido actualizado correctamente.');
    }

    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('contents.index')->with('success', 'Contenido eliminado correctamente.');
    }
}



