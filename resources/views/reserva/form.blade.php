@extends('base.app')

@section('titulo', 'Formulário de reserva')

@section('content')
    @php
        // dd($reserva); // é igual ao var_dump()
        if (!empty($reserva->id)) {
            $route = route('reserva.update', $reserva->id);
        } else {
            $route = route('reserva.store');
            $reserva = "";
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de reserva</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-neutral-600 shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($reserva->id))
                    @method('PUT')
                @endif

                <input class="px-4 py-2
                         border border-green-600 rounded-md w-full bg-neutral-700 text-gray-200" readonly type="hidden" name="id"
                    value="@if (!empty($reserva->id)) {{ $reserva->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">


                    <input class="px-4 py-2
                         border border-green-600 rounded-md w-full bg-neutral-700 text-gray-200"  readonly type="hidden" name="cliente_id"
                    value="@if(!empty($cliente)){{ $cliente->id }} @elseif($reserva){{ $reserva->cliente_id }}@endif">

                    <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Cliente</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full bg-neutral-700 text-gray-200" name="titular"
                        value="@if (!empty($reserva->id)) {{ $reserva->cliente->nome }}@elseif(!empty($cliente)){{ $cliente->nome }} @endif" readonly >
                </div>

                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Local da Reserva</label>
                    <select name="espaco_id" class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200">
                        <option value="" @if(empty($reserva->espaco)) {{'selected'}}@endif disabled>Selecione uma opção</option>
                         @foreach($espacos as $item)
                        <option value="{{$item->id}}" @if(!empty($reserva->espaco) && $reserva->espaco == $item->nome) {{'selected'}}@endif>{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Valor</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200" name="valor"
                        value="@if (!empty($reserva->valor)) {{ $reserva->valor }}@elseif (!empty(old('valor'))){{ old('valor') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Início</label>
                    <input type="datetime-local"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200" name="inicio"
                        value="@if(!empty($reserva->inicio)){{$reserva->inicio}}@elseif(!empty(old('inicio'))){{old('inicio')}}@else{{''}}@endif">
                </div>

                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Fim</label>
                    <input type="datetime-local"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200" name="fim"
                        value="@if(!empty($reserva->fim)){{$reserva->fim}}@elseif(!empty(old('fim'))){{old('fim')}}@else{{''}}@endif">
                </div>


                <div class="py-4 px-2 flex center">
                    <button
                        class="
                            bg-green-500 hover:bg-green-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-green-300
                        "
                        type="submit"> <i class="fa-regular fa-floppy-disk"></i> Salvar</button>
                    <div class="px-2"></div>
                    <a class="
                            bg-blue-500 hover:bg-blue-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-blue-300"
                        href="{{ route('cliente.detalhes', $cliente->id) }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar</a>
                </div>

            </form>
        </div>
    </div>
@endsection
