<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Models\Comercio;
use App\Notifications\NotificacionCompra;
use App\Models\Monedero;

class VentaController extends Controller
{
    //


    public function create(Comercio $comercio)
    {
        // recuperamos la fecha actual
        $fecha = new \Carbon\Carbon();
        return view('users.ventas.create', ['comercio' => $comercio, 'transaccion' => new Transaccion(), 'fecha' => $fecha]);
    }

    public function store(Request $request, Transaccion $transaccion, Comercio $comercio)
    {

        $validated = $request->validate([
            'comercio_id' => 'required|integer',
            'monedero_id' => 'required|integer',
            'fecha_transaccion' => 'required|date',
            'cantidad' => 'required|numeric',
            'concepto' => 'required|string',
            'tipo_transaccion' => 'required|string', // 'Compra', 'Recarga', 'Premio'
            'estado' => 'required|string', // 'Pendiente', 'Aprobado', 'Rechazado
        ]);

        $transaccion->create($validated);

        // $monedero = Monedero::get('monedero_id', $validated['monedero_id']);
        // $user = $monedero->user;

        // $user->notify(new NotificacionCompra($user));

        return to_route('comercio.usuario', $comercio)
            ->with('success-update', 'Transacción realizada correctamente');
    }

    public function edit(Transaccion $transaccion)
    {
        return view('users.ventas.edit', ['transaccion' => $transaccion]);
    }

    public function index()
    {
        return view('users.ventas.index');
    }

    public function show(Transaccion $transaccion)
    {
        return view('users.transacciones.show', ['transacción' => $transaccion]);
    }

    public function update(Request $request, Transaccion $transaccion, Comercio $comercio)
    {
        $validated = $request->validate([
            'comercio_id' => 'required|integer', // 'Compra', 'Recarga', 'Premio
            'monedero_id' => 'required|integer',
            'fecha_transaccion' => 'required|date',
            'cantidad' => 'required|numeric',
            'concepto' => 'required|string',
            'tipo_transaccion' => 'required|string', // 'Compra', 'Recarga', 'Premio'
            'estado' => 'required|string', // 'Pendiente', 'Aprobado', 'Rechazado
        ]);
        $validated['comercio_id'] = $comercio->id;
        $transaccion->update($validated);

        return to_route('comercio.usuario', $comercio)
            ->with('success-update', 'Transacción actualizada correctamente');
    }

    public function destroy(Transaccion $transaccion, Comercio $comercio)
    {
        $transaccion->delete();
        return to_route('comercio-usuario', $comercio)
            ->with('success-update', 'Transacción borrada correctamente');
    }
}
