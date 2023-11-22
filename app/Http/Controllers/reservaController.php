<?php

namespace App\Http\Controllers;

use App\Http\Requests\reservaStoreRequest;
use App\Http\Requests\reservaUpdateRequest;
use App\Models\Reserva;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class reservaController extends Controller
{
    public function index(Request $request): View
    {
        $reservas = Reserva::all();

        return view('reserva.index', compact('reservas'));
    }

    public function create(Request $request): View
    {
        return view('reserva.create');
    }

    public function store(reservaStoreRequest $request): RedirectResponse
    {
        $reserva = Reserva::create($request->validated());

        $request->session()->flash('reserva.id', $reserva->id);

        return redirect()->route('reserva.index');
    }

    public function show(Request $request, reserva $reserva): View
    {
        return view('reserva.show', compact('reserva'));
    }

    public function edit(Request $request, reserva $reserva): View
    {
        return view('reserva.edit', compact('reserva'));
    }

    public function update(reservaUpdateRequest $request, reserva $reserva): RedirectResponse
    {
        $reserva->update($request->validated());

        $request->session()->flash('reserva.id', $reserva->id);

        return redirect()->route('reserva.index');
    }

    public function destroy(Request $request, reserva $reserva): RedirectResponse
    {
        $reserva->delete();

        return redirect()->route('reserva.index');
    }

    public function search(Request $request): RedirectResponse
    {        
        if(!empty($request->valor)){
        $reservas = Reserva::where(
            $request->tipo,
             'like' ,
            "%". $request->valor."%"
            )->get();
        } else {
            $reservas = Reserva::all();
        }

        return view('reserva.list')->with(['reservas'=> $reservas]);
    }
}
