@extends('base.app')

@section('titulo', 'Formulário de Espaço')

@section('content')
    @php
        // dd($espaco); // é igual ao var_dump()
        if (!empty($espaco->id)) {
            $route = route('espaco.update', $espaco->id);
        } else {
            $route = route('espaco.store');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de Espaco</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-neutral-600 shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($espaco->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($espaco->id)) {{ $espaco->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">


                    <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Nome</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full bg-neutral-700 text-gray-200" name="nome"
                        value="@if (!empty($espaco->nome)) {{ $espaco->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif">
                </div>


                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Esporte</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200" name="esporte"
                        value="@if (!empty($espaco->esporte)) {{ $espaco->esporte }}@elseif (!empty(old('esporte'))){{ old('esporte') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Endereço</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200" name="endereco"
                        value="@if (!empty($espaco->endereco)) {{ $espaco->endereco }}@elseif (!empty(old('endereco'))){{ old('endereco') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Descrição</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200" name="descricao"
                        value="@if (!empty($espaco->descricao)) {{ $espaco->descricao }}@elseif (!empty(old('descricao'))){{ old('descricao') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Valor Hora</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200" name="valorHora"
                        value="@if (!empty($espaco->valorHora)) {{ $espaco->valorHora }}@elseif (!empty(old('valorHora'))){{ old('valorHora') }}@else{{ '' }} @endif">
                </div>

                @php
                    $nome_foto = !empty($espaco->foto) ? $espaco->foto : 'sem_foto.jpg';
                @endphp
                <div>
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Foto</label>
                    <img class="h-40 w-40 object-cover" src="/storage/images/espaco/{{ $nome_foto }}" width="300px"
                        alt="foto">
                    <br>
                    <input
                        class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-green-50 file:text-green-700
                                hover:file:bg-green-100"
                        type="file" name="foto"><br>
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
                    
                    @if(!empty($espaco->id))
                        <a class="
                            bg-blue-500 hover:bg-blue-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-blue-300"
                        href="{{ route('espaco.detalhes', $espaco->id) }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar</a>

                    @else
                        <a class="
                            bg-blue-500 hover:bg-blue-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-blue-300"
                        href="{{ route('espaco.list') }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar</a>
                    @endif
                </div>

            </form>
        </div>
    </div>
@endsection
