<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Http\Requests\documentoStoreRequest;
use App\Http\Requests\documentoUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class documentoController extends Controller
{
    public function index(Request $request): View
    {
        $documentos = Documento::all();

        return view('documento.list', compact('documentos'));
    }

    public function create(Request $request): View
    {
        return view('documento.form');
    }

    public function store(documentoStoreRequest $request): RedirectResponse
    {
        $documento = Documento::create($request->validated());

        $request->session()->flash('documento.id', $documento->id);

        return redirect()->route('documento.index');
    }

    public function show(Request $request, documento $documento): View
    {
        return view('documento.list', compact('documento'));
    }

    public function edit(Request $request, documento $documento): View
    {
        return view('documento.form', compact('documento'));
    }

    public function update(documentoUpdateRequest $request, documento $documento): RedirectResponse
    {
        $documento->update($request->validated());

        $request->session()->flash('documento.id', $documento->id);

        return redirect()->route('documento.index');
    }

    public function destroy(Request $request, documento $documento): RedirectResponse
    {
        $documento->delete();

        return redirect()->route('documento.index');
    }

    public function search(Request $request): RedirectResponse
    {        
        if(!empty($request->valor)){
        $documentos = Documento::where(
            $request->tipo,
             'like' ,
            "%". $request->valor."%"
            )->get();
        } else {
            $documentos = Documento::all();
        }

    return view('documento.list')->with(['documentos'=> $documentos]);
    }
}
