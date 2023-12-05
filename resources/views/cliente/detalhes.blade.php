@extends('base.app')

@section('titulo', 'Listagem de clientes')

@section('content')

    @php
        if($documento != "") {
            $temCarteirinha = "Sim";
        }
        else {
            $temCarteirinha = "Não";
        }

        $reservas = $cliente->reservas;
    @endphp

    <style>
        .carteirinha {
            margin-top: 75px;
        }
        .carteirinhaContainer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: black;
            font-size: 32px;
        }
        .foto {
            width: 250px;
            border: 5px solid #16a34a;
        }
        .titulo {
            color: #16a34a;
            font-size: 36px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        hr {
            margin: 1rem 0;
            height: 10px;
            color: #16a34a;
        }
    </style>

    <h3 class="pt-4 text-4xl font-medium text-center mb-4">Detalhes do Cliente</h3>
    <div
        class="w-3/4 mr-auto ml-auto rounded-lg bg-white p-6 dark:bg-neutral-600 lg:px-8 pt-12 pb-12">

        <a class="
                            bg-blue-500 hover:bg-blue-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-blue-300"
                        href="{{ route('cliente.list') }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    
        <div style="margin: 25px 0 50px 0;">
            <p class="pt-4 text-4xl text-left">Nome: {{ $cliente->nome }}</p>
            <p class="pt-4 text-4xl text-left">E-mail: {{ $cliente->email }}</p>
            <p class="pt-4 text-4xl text-left">Telefone: {{ $cliente->telefone }}</p>
            <p class="pt-4 text-4xl text-left">Possui cartieirinha? {{ $temCarteirinha }}</p>
        </div>

        

            @if ($documento != null)
            <div>
            <a href="{{ route('cliente.edit', $cliente->id) }}" class="bg-green-500 hover:bg-green-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-green-300"><i class="fa-solid fa-pen-to-square" style="color: white;"></i>  Editar Cadastro</a>

        <a href="{{ route('cliente.destroy', $cliente->id) }}" onclick="return confirm('Deseja Excluir?')" class="bg-red-500 hover:bg-red-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-red-300"><i class="fa-solid fa-trash"
            style="color: white"></i>  Excluir Cadastro</a>
            <hr />
            </div>

            <div>

            <div class="w-3/4 mr-auto ml-auto rounded-lg bg-white p-6 dark:bg-neutral-50 lg:px-8 carteirinha">
                <h4 class="titulo">Carteirinha de Planos</h4>
                <div class="carteirinhaContainer">
                <div>
                    <p class="pt-4 text-left"><b>Titular:</b> {{ $documento->titular }}</p>
                    <p class="pt-4 text-left"><b>ID Titular:</b> {{ $documento->cliente_id }}</p>
                    <p class="pt-4 text-left"><b>Número:</b> {{ $documento->numero }}</p>
                    <p class="pt-4 text-left"><b>Plano:</b> {{ $documento->plano }}</p>
                </div>

                <div class="containerFoto">
                <img src="/storage/images/documento/{{ $documento->foto }}" class="foto">
                </div>
                </div>
            </div>
            <div style="margin: 25px 0 50px 0;">
            <a href="{{ route('documento.edit', $documento->id) }}" class="bg-green-500 hover:bg-green-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-green-300"><i class="fa-solid fa-pen-to-square" style="color: white;"></i>  Atualizar Carteirinha</a>

        <a href="{{ route('documento.destroy', $documento->id) }}" onclick="return confirm('Deseja Excluir?')" class="bg-red-500 hover:bg-red-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-red-300"><i class="fa-solid fa-trash"
            style="color: white"></i>  Desfazer carteirinha</a>
            <hr />
            </div>
            @else
            <a href="{{ route('cliente.edit', $cliente->id) }}" class="bg-green-500 hover:bg-green-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-green-300"><i class="fa-solid fa-pen-to-square" style="color: white;"></i>  Editar Cadastro</a>

        <a href="{{ route('cliente.destroy', $cliente->id) }}" onclick="return confirm('Deseja Excluir?')" class="bg-red-500 hover:bg-red-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-red-300"><i class="fa-solid fa-trash"
            style="color: white"></i>  Excluir Cadastro</a><br><br>

            <a class="bg-blue-500 hover:bg-blue-600 text-white
                                font-semibold py-2 px-4 rounded focus:outline
                                focus:ring focus:border-blue-300"
                        href="{{ route('documento.cadastrar', $cliente->id) }}">
                        <i class="fa-solid fa-plus"></i>
                        Criar Carteirinha</a>

            @endif



            <h4 class="titulo">Reservas do Cliente</h4>


    <div class="flex flex-col w-full mr-auto ml-auto mb-6">


        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Espaço</th>
                                <th scope="col" class="px-6 py-4">Valor</th>
                                <th scope="col" class="px-6 py-4">Início</th>
                                <th scope="col" class="px-6 py-4">Fim</th>
                                <th scope="col" class="px-6 py-4"></th>
                                <th scope="col" class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservas as $item)
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-700">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->espaco->nome ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->valor ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->inicio ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->fim ?? '' }}</td>
                                            <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('reserva.edit', $item->id) }}" class="bg-green-500 hover:bg-green-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-green-300"><i
                                                class="fa-solid fa-pen-to-square" style="color: white;"></i>  Atualizar</a></td>
                                                <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('reserva.destroy', $item->id) }}" onclick="return confirm('Deseja Excluir?')"  class="bg-red-500 hover:bg-red-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-red-300"><i
                                                class="fa-solid fa-pen-to-square" style="color: white;"></i>  Deletar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        </div>

        <a class="bg-blue-500 hover:bg-blue-600 text-white
                                font-semibold py-2 px-4 rounded focus:outline
                                focus:ring focus:border-blue-300"
                        href="{{ route('reserva.cadastrar', $cliente->id) }}">
                        <i class="fa-solid fa-plus"></i>
                        Criar Reserva</a>
    </div>
 
@endsection
