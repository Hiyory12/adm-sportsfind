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
        return view('reserva.form')->with('clientes', $clientes)->with('espacos', $espacos);
    }

    public function cadastrar(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $espacos = Espaco::all();

        return view('reserva.form')->with([
            "cliente" => $cliente,
            "espacos" => $espacos,
        ]);
    }

    public function store(Request $request)
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
        $dados = [
            'cliente_id'=>$request->cliente_id,
            'espaco_id'=> $request->espaco_id,
            'valor'=> $request->valor,
            'inicio'=> $request->inicio,
            'fim'=>$request->fim,
        ];  
    
        Reserva::create($dados);
    
    
        return redirect()->route('cliente.detalhes', $request->cliente_id)->with('success', "Cadastrado  com sucesso!");
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

        $cliente = Cliente::find($reserva->cliente_id);
        return view('reserva.form')->with('clientes', $clientes)->with('espacos',$espacos)->with('reserva', $reserva)->with('cliente', $cliente);
    }

    public function update(Request $request, reserva $reserva)
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
        'valor.numeric'=>'O :attribute deve ser um número!',
        'cliente_id.required'=>'O :attribute é obrigatório!',
        'espaco_id.required'=>'O :attribute é obrigatório!',
    ]);
        
    $dados = [
        'cliente_id'=>$request->cliente_id,
        'espaco_id'=> $request->espaco_id,
        'valor'=> $request->valor,
        'inicio'=> $request->inicio,
        'fim'=>$request->fim,
    ];  

    Reserva::updateOrCreate(
        ['id' => $request->id],
        $dados
    );


    return redirect()->route('cliente.detalhes', $request->cliente_id)->with('success', "Atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $clienteId = $reserva->cliente_id;
        $reserva->delete();

        return redirect()->route('cliente.detalhes', $clienteId)->with('success', "Removido com sucesso!");
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
