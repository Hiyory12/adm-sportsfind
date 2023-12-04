@extends('base.app')

@section('titulo', 'Listagem de clientes')

@section('content')

<style>
    .containerDetalhes {
        margin: 25px 0 100px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        font-size: 32px;
    }
    .foto {
        width: 1000px;
        border: 5px solid #16a34a;
    }
    
    .titulo {
            color: #16a34a;
            font-size: 36px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
    }
</style>

    <h3 class="pt-4 text-4xl font-medium text-center mb-4">Detalhes do Espaço</h3>
    <div
        class="w-3/4 mr-auto ml-auto rounded-lg bg-white p-6 dark:bg-neutral-600 lg:px-8">

        <a class="
                            bg-blue-500 hover:bg-blue-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-blue-300"
                        href="{{ route('espaco.list') }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    
        <h4 class="titulo">{{ $espaco->nome }}</h4>
        <div class="containerDetalhes">
            <div class="p-2">
                <p class="pt-4 text-left"><b>Esporte:</b> {{ $espaco->esporte }}</p>
                <p class="pt-4 text-left"><b>Endereço:</b> {{ $espaco->endereco }}</p>
                <p class="pt-4 text-left"><b>Descrição:</b> {{ $espaco->descricao }}</p>
                <p class="pt-4 text-left"><b>Valor Hora:</b> {{ $espaco->valorHora }}</p>
            </div>
            <div class="containerFoto">
                <img src="/storage/images/espaco/{{ $espaco->foto }}" class="foto">
            </div>
        </div>

    
        <a href="{{ route('espaco.edit', $espaco->id) }}" class="bg-green-500 hover:bg-green-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-green-300"><i class="fa-solid fa-pen-to-square" style="color: white;"></i>  Editar Cadastro</a>

        <a href="{{ route('espaco.destroy', $espaco->id) }}" onclick="return confirm('Deseja Excluir?')" class="bg-red-500 hover:bg-red-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-red-300"><i class="fa-solid fa-trash"
            style="color: white"></i>  Excluir Cadastro</a>
    
        </div>
    </div>
 
@endsection
