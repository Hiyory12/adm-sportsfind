@extends('base.app')

@section('titulo', 'Listagem de reservas')

@section('content')

    <h3 class="pt-4 text-4xl font-medium text-center mb-4">Listagem de reservas</h3>


    <div class="flex flex-col w-3/4 mr-auto ml-auto">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Cliente</th>
                                <th scope="col" class="px-6 py-4">Espaço</th>
                                <th scope="col" class="px-6 py-4">Valor</th>
                                <th scope="col" class="px-6 py-4">Início</th>
                                <th scope="col" class="px-6 py-4">Fim</th>
                                <th scope="col" class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservas as $item)
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-700">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->cliente->nome ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->espaco->nome ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->valor ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->inicio ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->fim ?? '' }}</td>
                                            <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('cliente.detalhes', $item->cliente_id) }}" class="bg-green-500 hover:bg-green-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-green-300"><i
                                                class="fa-solid fa-magnifying-glass" style="color: white;"></i>  Ver Detalhes</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
