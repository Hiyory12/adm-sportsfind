<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\clienteStoreRequest;
use App\Http\Requests\clienteUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class clienteController extends Controller
{
    public function index(Request $request): View
    {
        $clientes = Cliente::all();

        return view('cliente.index', compact('clientes'));
    }

    public function create(Request $request): View
    {
        return view('cliente.create');
    }

    public function store(clienteStoreRequest $request): RedirectResponse
    {
        $cliente = Cliente::create($request->validated());

        $request->session()->flash('cliente.id', $cliente->id);

        return redirect()->route('cliente.index');
    }

    public function show(Request $request, cliente $cliente): View
    {
        return view('cliente.show', compact('cliente'));
    }

    public function edit(Request $request, cliente $cliente): View
    {
        return view('cliente.edit', compact('cliente'));
    }

    public function update(clienteUpdateRequest $request, cliente $cliente): RedirectResponse
    {
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
