@extends('base.app')

@section('titulo', 'Formulário de Documento')

@section('content')
    @php
        // dd($documento); // é igual ao var_dump()
        if (!empty($documento->id)) {
            $route = route('documento.update', $documento->id);
        } else {
            $route = route('documento.store');
            $documento = "";
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de Documento</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-neutral-600 shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($documento->id))
                    @method('PUT')
                @endif

                <input class="px-4 py-2
                         border border-green-600 rounded-md w-full bg-neutral-700 text-gray-200" readonly type="hidden" name="id"
                    value="@if (!empty($documento->id)) {{ $documento->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">

                    <input class="px-4 py-2
                         border border-green-600 rounded-md w-full bg-neutral-700 text-gray-200"  readonly type="hidden" name="cliente_id"
                    value="@if(!empty($cliente)){{ $cliente->id }} @elseif($documento){{ $documento->cliente_id }}@endif">

                    <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Titular</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full bg-neutral-700 text-gray-200" name="titular"
                        value="@if(!empty($cliente)){{ $cliente->nome }} @elseif($documento){{ $documento->titular }}@endif" readonly >
                </div>


                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Número</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200" name="numero"
                        value="@if (!empty($documento->numero)) {{ $documento->numero }}@elseif (!empty(old('numero'))){{ old('numero') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4">
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Plano de Benefícios</label>
                    <select name="plano" class="px-4 py-2
                         border border-green-600 rounded-md w-full  bg-neutral-700 text-gray-200">
                        <option value="" @if(empty($documento->plano)) {{'selected'}}@endif disabled>Selecione uma opção</option>
                        <option value="Plano Starter" @if(!empty($documento->numero) && $documento->plano == "Plano Starter") {{'selected'}}@endif>Plano Starter</option>
                        <option value="Plano Pro" @if(!empty($documento->numero) && $documento->plano == "Plano Pro") {{'selected'}}@endif>Plano Pro</option>
                        <option value="Plano Lenda" @if(!empty($documento->numero) && $documento->plano == "Plano Lenda") {{'selected'}}@endif>Plano Lenda</option>
                    </select>
                </div>

                @php
                    $nome_foto = !empty($documento->foto) ? $documento->foto : 'sem_foto.jpg';
                @endphp
                <div>
                    <label
                        class="block text-gray-200
                                font-bold mb-2
                    ">Foto</label>
                    <img class="h-40 w-40 object-cover" src="/storage/images/documento/{{ $nome_foto }}" width="300px"
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
                    <a class="
                            bg-blue-500 hover:bg-blue-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-blue-300"
                        href="{{ route('documento.list') }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar</a>
                </div>

            </form>
        </div>
    </div>
@endsection
