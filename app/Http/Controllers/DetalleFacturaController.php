<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Factura;
use Illuminate\Http\Request;

class DetalleFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Detalle_Factura::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detalle = new Detalle_Factura;
        $detalle->factura_id = $request->factura_id;
        $detalle->producto_id = $request->producto_id;
        $detalle->cantidad = $request->cantidad;
        $detalle->subtotal = $request->subtotal;
        $detalle->total = $request->total;

        $detalle->save();

        $data = [
            'message' => 'Detalle Creado Exitosamente',
            'response' => $detalle
        ];
        return response($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Detalle_Factura $detalle_Factura)
    {
        $detalle_Factura = Detalle_Factura::find($detalle_Factura->id);
        return response()->json($detalle_Factura);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detalle_Factura $detalle_Factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detalle_Factura $detalle_Factura)
    {
        $detalle_Factura->factura_id = $request->factura_id;
        $detalle_Factura->producto_id = $request->producto_id;
        $detalle_Factura->cantidad = $request->cantidad;
        $detalle_Factura->subtotal = $request->subtotal;
        $detalle_Factura->total = $request->total;

        $detalle_Factura->save();
        $data = [
            'message' => 'Detalle Actualizado Exitosamente',
            'response' => $detalle_Factura
        ];
        return response($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detalle_Factura $detalle_Factura)
    {
        $detalle_Factura->delete();
        $data = [
            'message' => 'Detalle Eliminado Exitosamente',
            'response' => $detalle_Factura
        ];
        return response($data);
    }
}