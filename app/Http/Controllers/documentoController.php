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

    public function create()
    {
        return view('documento.form');
    }

    public function store(documentoStoreRequest $request): RedirectResponse
    {
        $documento = Documento::create($request->validated());

        $request->session()->flash('documento.id', $documento->id);

        return redirect()->route('documento.index');
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

    public function update(documentoUpdateRequest $request, documento $documento): RedirectResponse
    {
        $documento->update($request->validated());

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
