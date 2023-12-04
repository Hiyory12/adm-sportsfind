@extends('base.app')

@section('titulo', 'Formulário de Espaço')

@section('content')
    @php
        // dd($cliente); // é igual ao var_dump()
        if (!empty($cliente->id)) {
            $route = route('cliente.update', $cliente->id);
        } else {
            $route = route('cliente.store');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de cliente</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-neutral-600 shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($cliente->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($cliente->id)) {{ $cliente->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">


                    <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Nome</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full bg-neutral-700 text-gray-200" name="nome"
                        value="@if (!empty($cliente->nome)) {{ $cliente->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif">
                </div>


                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">E-mail</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200" name="email"
                        value="@if (!empty($cliente->email)) {{ $cliente->email }}@elseif (!empty(old('email'))){{ old('email') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Telefone</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200" name="telefone"
                        value="@if (!empty($cliente->telefone)) {{ $cliente->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif">
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


                    @if(!empty($cliente->id))
                        <a class="
                            bg-blue-500 hover:bg-blue-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-blue-300"
                        href="{{ route('cliente.detalhes', $cliente->id) }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar</a>

                    @else
                        <a class="
                            bg-blue-500 hover:bg-blue-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-blue-300"
                        href="{{ route('cliente.list') }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar</a>
                    @endif
                </div>

            </form>
        </div>
    </div>
@endsection
