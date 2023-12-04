<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Documentos;
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

    public function store(Request $request)
    {
<<<<<<< HEAD
=======

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
>>>>>>> 173d9a457c8d8efb67b5573996a4a010fdfd87d9

        $request->validate([
            'nome'=>'required',
            'email'=>'required',
            'telefone'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'email.required'=>"O :attribute é obrigatorio!",
            'telefone.required'=>"O :attribute é obrigatorio!",
            ]);

        $dados = [
            'nome'=> $request->nome,
            'email'=> $request->email,
            'telefone'=> $request->telefone,
        ];

        Cliente::create($dados);
        return redirect()->route('cliente.list')->with('success', "Cadastrado com sucesso!");
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

    public function update(Request $request, cliente $cliente)
    {
        $request->validate([
            'nome'=>'required',
            'email'=>'required',
            'telefone'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'email.required'=>"O :attribute é obrigatorio!",
            'telefone.required'=>"O :attribute é obrigatorio!",
            ]);

        $dados = [
            'nome'=> $request->nome,
            'email'=> $request->email,
            'telefone'=> $request->telefone,
        ];

        Cliente::updateOrCreate(
            ['id' => $request->id],
            $dados
        );
        return redirect()->route('cliente.list')->with('success', "Alterado com sucesso!");
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return redirect()->route('cliente.list')->with('success', "Removido com sucesso!");
    }

    public function search(Request $request)
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

    public function detalhes($id) {
        $cliente = Cliente::findOrFail($id);

        if($cliente->documento) {
            $documentoId = $cliente->documento->id;
        }
        else {
            $documentoId = "";
        }
        
        $documento = Documento::find($documentoId);
        if($documento == null) {
            $documento = "";
        }

        return view('cliente.detalhes')->with(['cliente'=> $cliente, 'documento' => $documento]);
    }
}
