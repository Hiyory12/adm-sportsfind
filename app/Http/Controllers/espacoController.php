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

    public function create(Request $request)
    {
        return view('espaco.form');
    }

    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $nome_arquivo = "";
        //verifica se existe foto no formulário
        if($foto){
            $nome_arquivo =
            date('YmdHis').'.'.$foto->getClientOriginalExtension();

            $diretorio = "images/espaco/";
            //salva foto em uma pasta do sistema


            $foto->storeAs($diretorio,$nome_arquivo,'public');

        }


        $request->validate([
            'nome'=>'required',
            'esporte'=>'required',
            'endereco'=>'required',
            'descricao'=>'required',
            'valorHora'=>'required|numeric',
            'foto'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'esporte.required'=>"O :attribute é obrigatorio!",
            'endereco.required'=>"O :attribute é obrigatorio!",
            'descricao.required'=>"O :attribute é obrigatorio!",
            'valorHora.required'=>"O :attribute é obrigatorio!",
            'valorHora.numeric'=>"O :attribute deve ser número!",
            'foto.required'=>"O :attribute é obrigatorio!",
            ]);

        $dados = [
            'nome'=> $request->nome,
            'esporte'=> $request->esporte,
            'endereco'=> $request->endereco,
            'descricao'=> $request->descricao,
            'valorHora'=> $request->valorHora,
            'foto'=>$nome_arquivo,
        ];

        Espaco::create($dados);
        return redirect()->route('espaco.list')->with('success', "Cadastrado com sucesso!");
    }

    public function show(Request $request, espaco $espaco): View
    {
        $espacos = Espaco::all();
        return view('espaco.list')->with('espacos',$espacos);
    }

    public function edit(Request $request, espaco $espaco)
    {
        return view('espaco.form', compact('espaco'));
    }

    public function update(Request $request, espaco $espaco)
    {
        $foto = $request->file('foto');
        $nome_arquivo = "";
        //verifica se existe foto no formulário
        if($foto){
            $nome_arquivo =
            date('YmdHis').'.'.$foto->getClientOriginalExtension();

            $diretorio = "images/espaco/";
            //salva foto em uma pasta do sistema


            $foto->storeAs($diretorio,$nome_arquivo,'public');

        }
        else {
            $nome_arquivo = $espaco->foto;
        }


        $request->validate([
            'nome'=>'required',
            'esporte'=>'required',
            'endereco'=>'required',
            'descricao'=>'required',
            'valorHora'=>'required|numeric',
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'esporte.required'=>"O :attribute é obrigatorio!",
            'endereco.required'=>"O :attribute é obrigatorio!",
            'descricao.required'=>"O :attribute é obrigatorio!",
            'valorHora.required'=>"O :attribute é obrigatorio!",
            'valorHora.numeric'=>"O :attribute deve ser número!",
            ]);

        $dados = [
            'nome'=> $request->nome,
            'esporte'=> $request->esporte,
            'endereco'=> $request->endereco,
            'descricao'=> $request->descricao,
            'valorHora'=> $request->valorHora,
            'foto'=>$nome_arquivo,
        ];

        Espaco::updateOrCreate(
            ['id' => $request->id],
            $dados
        );
        return redirect()->route('espaco.list')->with('success', "Atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $espaco = Espaco::findOrFail($id);

        $espaco->delete();

        return redirect()->route('espaco.list')->with('success', "Removido com sucesso!");
    }

    public function search(Request $request)
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

    public function detalhes($id) {
        $espaco = Espaco::findOrFail($id);

        return view('espaco.detalhes')->with(['espaco'=> $espaco]);
    }
}
