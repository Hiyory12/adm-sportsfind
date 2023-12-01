<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\clienteStoreRequest;
use App\Http\Requests\clienteUpdateRequest;
use App\Models\Documento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class clienteController extends Controller
{
    public function index(Request $request): View
    {
        $clientes = Cliente::all();

        return view('cliente.list')->with('clientes', $clientes);
    }

    public function create(Request $request): View
    {
        $documentos = Documento::orderBy('titular')->get();
        return view('cliente.form')->with('documentos',$documentos);
    }

    public function store(clienteStoreRequest $request): RedirectResponse
    {

        $request->validate([
            'nome'=> 'required|max:255',
            'email'=> 'required|email',
            'telefone'=> 'required|numeric',
        ],[
            'nome.required'=> 'O :attribute é obrigatório!',
            'nome.max'=> 'O :attribute deve ser menor que 255 caracteres!',
            'email.required'=> 'O :attribute é obrigatório!',
            'email.email'=> 'Selecione um :attribute válido!',
            'telefone.required'=> 'O :attribute é obrigatório!',
            'telefone.numeric'=> 'Selecione um telefone válido!',
        ]);

        $cliente = Cliente::create($request->validated());

        $request->session()->flash('cliente.id', $cliente->id);

        return redirect()->route('cliente.index');
    }

    public function show(Request $request, cliente $cliente): View
    {
        return redirect()->route('cliente.index');
    }

    public function edit(Request $request, cliente $cliente): View
    {
        $documentos = Documento::orderBy('titular')->get();
        return view('cliente.form', compact('cliente'))->with('documentos', $documentos);
    }

    public function update(clienteUpdateRequest $request, cliente $cliente): RedirectResponse
    {
        $request->validate([
            'nome'=> 'required|max:255',
            'email'=> 'required|email',
            'telefone'=> 'required|numeric',
            'documento_id'=> 'required|numeric',
        ],[
            'nome.required'=> 'O :attribute é obrigatório!',
            'nome.max'=> 'O :attribute deve ser menor que 255 caracteres!',
            'email.required'=> 'O :attribute é obrigatório!',
            'email.email'=> 'Selecione um :attribute válido!',
            'telefone.required'=> 'O :attribute é obrigatório!',
            'telefone.numeric'=> 'Selecione um telefone válido!',
            'documento_id.required'=> 'O :attribute é obrigatório!',
            'documento_id.numeric'=> 'Selecione um documento válido!',
        ]);
        $cliente->update($request->validated());

        $request->session()->flash('cliente.id', $cliente->id);

        return redirect()->route('cliente.index');
    }

    public function destroy(Request $request, cliente $cliente): RedirectResponse
    {
        $cliente->delete();

        return redirect()->route('cliente.index');
    }

    public function search(Request $request): RedirectResponse
    {
        if(!empty($request->valor)){
        $clientes = Cliente::where(
            $request->tipo,
             'like' ,
            "%". $request->valor."%"
            )->get();
        } else {
            $clientes = Cliente::all();
        }

    return view('cliente.list')->with(['clientes'=> $clientes]);
    }
}
