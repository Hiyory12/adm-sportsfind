<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Cliente;
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

    public function cadastrar(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        return view('documento.form')->with([
            "cliente" => $cliente
        ]);
    }

    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $nome_arquivo = "";
        //verifica se existe foto no formulário
        if($foto){
            $nome_arquivo =
            date('YmdHis').'.'.$foto->getClientOriginalExtension();

            $diretorio = "images/documento/";
            //salva foto em uma pasta do sistema


            $foto->storeAs($diretorio,$nome_arquivo,'public');

        }

        $request->validate([
            'cliente_id'=>'required',
            'titular'=>'required',
            'numero'=>'required',
            'plano'=>'required',
            'foto'=>'required',
        ],[
            'cliente_id.required'=>"O :attribute é obrigatorio!",
            'titular.required'=>"O :attribute é obrigatorio!",
            'numero.required'=>"O :attribute é obrigatorio!",
            'plano.required'=>"O :attribute é obrigatorio!",
            'foto.required'=>"O :attribute é obrigatorio!",
        ]);


        $dados = [
            'cliente_id'=>$request->cliente_id,
            'titular'=> $request->titular,
            'numero'=> $request->numero,
            'foto'=>$nome_arquivo,
            'plano'=>$request->plano,
        ];

        Documento::updateOrCreate(
            ['id' => $request->id],
            $dados
        );


        return redirect()->route('cliente.detalhes', $request->cliente_id)->with('success', "Criado com sucesso!");
    }

    public function show(Request $request, documento $documento): View
    {
        return view('documento.list', compact('documento'));
    }

    public function edit(Request $request, $id)
    {
        $documento = Documento::find($id);

        return view('documento.form')->with([
            "documento" => $documento
        ]);
    }

    public function update(Request $request, documento $documento)
    {

        $foto = $request->file('foto');
        $nome_arquivo = "";
        //verifica se existe foto no formulário
        if($foto){
            $nome_arquivo =
            date('YmdHis').'.'.$foto->getClientOriginalExtension();

            $diretorio = "images/documento/";
            //salva foto em uma pasta do sistema


            $foto->storeAs($diretorio,$nome_arquivo,'public');

        }
        else {
            $nome_arquivo = $documento->foto;
        }

        $request->validate([
            'cliente_id'=>'required',
            'titular'=>'required',
            'numero'=>'required',
            'plano'=>'required',
        ],[
            'cliente_id.required'=>"O :attribute é obrigatorio!",
            'titular.required'=>"O :attribute é obrigatorio!",
            'numero.required'=>"O :attribute é obrigatorio!",
            'plano.required'=>"O :attribute é obrigatorio!",
        ]);


        $dados = [
            'cliente_id'=>$request->cliente_id,
            'titular'=> $request->titular,
            'numero'=> $request->numero,
            'foto'=>$nome_arquivo,
            'plano'=>$request->plano,
        ];  

        Documento::updateOrCreate(
            ['id' => $request->id],
            $dados
        );


        return redirect()->route('cliente.detalhes', $request->cliente_id)->with('success', "Atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);
        $clienteId = $documento->cliente_id;
        $documento->delete();

        $caminhoFoto = public_path().'/storage/images/documento/'.$documento->foto;


        if($documento->foto != 'sem_foto.jpg' && $documento->foto != '') {
            unlink($caminhoFoto);   //DELETA O ARQUIVO DE FOTO DA PASTA STORAGE
        }

        return redirect()->route('cliente.detalhes', $clienteId)->with('success', "Removido com sucesso!");
    }

    public function search(Request $request)
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
