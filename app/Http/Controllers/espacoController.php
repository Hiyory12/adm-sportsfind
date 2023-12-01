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
        $request->validate([
            'nome'=> 'required|max:255',
            'endereco'=> 'required',
            'fotos'=> 'required',
            'valorHora'=> 'required|numeric',
            'categoria_id'=> 'required',
            'descricao'=> 'required',
        ],[
            'nome.required'=> 'O :attribute é obrigatório',
            'nome.max'=> 'O :attribute deve conter no máximo 255 caracteres!',
            'endereco.required'=> 'O :attribute é obrigatório',
            'fotos.required'=> 'O :attribute é obrigatório',
            'valorHora.required'=> 'O :attribute é obrigatório',
            'valorHora.numeric'=> 'O :attribute deve ser numérico!',
            'categoria_id.required'=> 'O :attribute é obrigatório',
            'descricao.required'=>'O :attribute é obrigatório!',
        ]);

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
        $request->validate([
            'nome'=> 'required|max:255',
            'endereco'=> 'required',
            'fotos'=> 'required',
            'valorHora'=> 'required|numeric',
            'categoria_id'=> 'required',
            'descricao'=> 'required',
        ],[
            'nome.required'=> 'O :attribute é obrigatório',
            'nome.max'=> 'O :attribute deve conter no máximo 255 caracteres!',
            'endereco.required'=> 'O :attribute é obrigatório',
            'fotos.required'=> 'O :attribute é obrigatório',
            'valorHora.required'=> 'O :attribute é obrigatório',
            'valorHora.numeric'=> 'O :attribute deve ser numérico!',
            'categoria_id.required'=> 'O :attribute é obrigatório',
            'descricao.required'=>'O :attribute é obrigatório!',
        ]);
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
