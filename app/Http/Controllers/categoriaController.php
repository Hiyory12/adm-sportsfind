<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\categoriaStoreRequest;
use App\Http\Requests\categoriaUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class categoriaController extends Controller
{
    public function index(Request $request): View
    {
        $categoria = Categoria::all();

        return view('categoria.list', compact('categoria'));
    }

    public function create(Request $request): View
    {
        return view('categoria.form');
    }

    public function store(categoriaStoreRequest $request): RedirectResponse
    {
        $categoria = Categoria::create($request->validated());

        $request->session()->flash('categoria.id', $categoria->id);

        return redirect()->route('categoria.index');
    }

    public function show(Request $request, Categoria $categoria): View
    {
        return view('categoria.show', compact('categoria'));
    }

    public function edit(Request $request, Categoria $categoria): View
    {
        return view('categoria.edit', compact('categoria'));
    }

    public function update(categoriaUpdateRequest $request, categoria $categoria): RedirectResponse
    {
        $categoria->update($request->validated());

        $request->session()->flash('categoria.id', $categoria->id);

        return redirect()->route('categoria.index');
    }

    public function destroy(Request $request, categoria $categoria): RedirectResponse
    {
        $categoria->delete();

        return redirect()->route('categoria.index');
    }

    public function search(Request $request): RedirectResponse
    { 
        if(!empty($request->valor)){
        $categorias = Categoria::where(
            $request->tipo,
             'like' ,
            "%". $request->valor."%"
            )->get();
    } else {
        $categorias = Categoria::all();
    }

    return view('categoria.list')->with(['categorias'=> $categorias]);
    }
}
