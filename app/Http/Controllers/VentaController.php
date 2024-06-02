<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Models\Comercio;


class VentaController extends Controller
{
    //


    public function ventaCreate(Comercio $comercio)
    {

        return view('users.transacciones.create', ['comercio' => $comercio, 'transaccion' => new Transaccion()]);
    }

    public function ventaStore(Request $request, Transaccion $transaccion, Comercio $comercio)
    {
        $validated = $request->validate([
            'monedero_id' => 'required|integer',
            'fecha_transaccion' => 'required|date',
            'cantidad' => 'required|numeric',
            'concepto' => 'required|string',
            'tipo_transaccion' => 'required|string', // 'Compra', 'Recarga', 'Premio'
            'estado' => 'required|string', // 'Pendiente', 'Aprobado', 'Rechazado
        ]);
        $validated['comercio_id'] = $comercio->id;
        $transaccion->create($validated);

        return to_route('comercio-usuario', $comercio)
            ->with('success-update', 'Transaccion realizda correctamente');
    }

    public function ventaShow(Transaccion $transaccion)
    {
        return view('users.transacciones.create', ['transaccion' => $transaccion]);
    }

    public function ventaUpdate(Request $request, Transaccion $transaccion, Comercio $comercio)
    {
        $validated = $request->validate([
            'monedero_id' => 'required|integer',
            'fecha_transaccion' => 'required|date',
            'cantidad' => 'required|numeric',
            'concepto' => 'required|string',
            'tipo_transaccion' => 'required|string', // 'Compra', 'Recarga', 'Premio'
            'estado' => 'required|string', // 'Pendiente', 'Aprobado', 'Rechazado
        ]);
        $validated['comercio_id'] = $comercio->id;
        $transaccion->update($validated);

        return to_route('comercio-usuario', $comercio)
            ->with('success-update', 'Transaccion actualizada correctamente');
    }

    public function ventaDestroy(Transaccion $transaccion, Comercio $comercio)
    {
        $transaccion->delete();
        return to_route('comercio-usuario', $comercio)
            ->with('success-update', 'Transaccion borrada correctamente');
    }
}
