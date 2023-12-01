<?php

namespace App\Http\Controllers;

use App\Http\Requests\reservaStoreRequest;
use App\Http\Requests\reservaUpdateRequest;
use App\Models\Cliente;
use App\Models\Espaco;
use App\Models\Reserva;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class reservaController extends Controller
{
    public function index(Request $request): View
    {
        $reservas = Reserva::all();

        return view('reserva.list', compact('reservas'));
    }

    public function create(Request $request): View
    {
        $espacos = Espaco::orderBy('nome')->get();
        $clientes = Cliente::orderBy('nome')->get();
        return view('reserva.form')->with('clientes', $clientes)->with('espacos', $espacos);
    }

    public function store(reservaStoreRequest $request): RedirectResponse
    {
        $request->validate([
            'inicio'=>'required',
            'fim'=>'required',
            'valor'=>'required|numeric',
            'cliente_id'=>'required',
            'espaco_id'=>'required',
        ],[
            'inicio.required'=>'O :attribute é obrigatório!',
            'fim.required'=>'O :attribute é obrigatório!',
            'valor.required'=>'O :attribute é obrigatório!',
            'valor.numeric'=>'O :attribute deve ser numérico!',
            'cliente_id.required'=>'O :attribute é obrigatório!',
            'espaco_id.required'=>'O :attribute é obrigatório!',
        ]);
        $reserva = Reserva::create($request->validated());

        $request->session()->flash('reserva.id', $reserva->id);

        return redirect()->route('reserva.index');
    }

    public function show(Request $request, reserva $reserva): View
    {
        $reserva = Reserva::all();
        return view('reserva.list', compact('reserva'));
    }

    public function edit(Request $request, reserva $reserva): View
    {
        $espacos = Espaco::orderBy('nome')->get();
        $clientes = Cliente::orderBy('nome')->get();
        return view('reserva.form')->with('clientes', $clientes)->with('espacos',$espacos)->with('reserva', $reserva);
    }

    public function update(reservaUpdateRequest $request, reserva $reserva): RedirectResponse
    {$request->validate([
        'inicio'=>'required',
        'fim'=>'required',
        'valor'=>'required|numeric',
        'cliente_id'=>'required',
        'espaco_id'=>'required',
    ],[
        'inicio.required'=>'O :attribute é obrigatório!',
        'fim.required'=>'O :attribute é obrigatório!',
        'valor.required'=>'O :attribute é obrigatório!',
        'valor.numeric'=>'O :attribute deve ser numérico!',
        'cliente_id.required'=>'O :attribute é obrigatório!',
        'espaco_id.required'=>'O :attribute é obrigatório!',
    ]);
        $reserva->update($request->validated());

        $request->session()->flash('reserva.id', $reserva->id);

        return redirect()->route('reserva.index');
    }

    public function destroy(Request $request, reserva $reserva): RedirectResponse
    {
        $reserva->delete();

        return redirect()->route('reserva.index');
    }

    public function search(Request $request): RedirectResponse
    {        
        if(!empty($request->valor)){
        $reservas = Reserva::where(
            $request->tipo,
             'like' ,
            "%". $request->valor."%"
            )->get();
        } else {
            $reservas = Reserva::all();
        }

        return view('reserva.list')->with(['reservas'=> $reservas]);
    }
}
