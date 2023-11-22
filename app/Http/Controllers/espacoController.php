<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Espaco;
use App\Http\Requests\espacoStoreRequest;
use App\Http\Requests\espacoUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class espacoController extends Controller
{
    public function index(Request $request): View
    {
        $espacos = Espaco::all();

        return view('espaco.list', compact('espacos'));
    }

    public function create(Request $request): View
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('espaco.form')->with('categorias', $categorias);
    }

    public function store(espacoStoreRequest $request): RedirectResponse
    {
        $espaco = Espaco::create($request->validated());

        $request->session()->flash('espaco.id', $espaco->id);

        return redirect()->route('espaco.index');
    }

    public function show(Request $request, espaco $espaco): View
    {
        $espacos = Espaco::all();
        return view('espaco.list')->with('espacos',$espacos);
    }

    public function edit(Request $request, espaco $espaco): View
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('espaco.form')->with('espaco', $espaco)->with('categorias', $categorias);
    }

    public function update(espacoUpdateRequest $request, espaco $espaco): RedirectResponse
    {
        $espaco->update($request->validated());

        $request->session()->flash('espaco.id', $espaco->id);

        return redirect()->route('espaco.index');
    }

    public function destroy(Request $request, espaco $espaco): RedirectResponse
    {
        $espaco->delete();

        return redirect()->route('espaco.index');
    }

    public function search(Request $request): RedirectResponse
    {   
        if(!empty($request->valor)){
        $espacos = Espaco::where(
            $request->tipo,
             'like' ,
            "%". $request->valor."%"
            )->get();
        } else {
            $espacos = Espaco::all();
        }

        return view('espaco.list')->with(['espacos'=> $espacos]);
    }
}
