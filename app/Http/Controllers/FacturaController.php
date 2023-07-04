<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Factura;
use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturasConDetalles = Factura::with('detalles')->get();
        return response()->json($facturasConDetalles);
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

        // Crear la factura
        $factura = new Factura;
        $factura->proveedor_id = $request->proveedor_id;
        $factura->fecha_factura = $request->fecha_factura;
        $factura->tipo_pago = $request->tipo_pago;
        if ($request->tipo_pago == 'Credito') {
            $factura->fecha_vencimiento = $request->fecha_vencimiento;
        }
        $factura->total = $request->total;
        $factura->estado = $request->estado;
        $factura->save();

        // Crear los detalles de la factura
        foreach ($request->detalle_facturas as $detalle) {
            $detalleFactura = new Detalle_Factura;
            $detalleFactura->factura_id = $factura->id;
            $detalleFactura->producto_id = $detalle['producto_id'];
            $detalleFactura->cantidad = $detalle['cantidad'];
            $detalleFactura->subtotal = $detalle['subtotal'];
            $detalleFactura->total = $detalle['total'];
            $detalleFactura->save();            
        }        
        
        return response()->json(['message' => 'Factura creada exitosamente', 'factura' => $factura]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        $facturaConDetalles = Factura::with('detalles')->find($factura->id);
        return response()->json($facturaConDetalles);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        $factura->proveedor_id = $request->proveedor_id;
        $factura->fecha_factura = $request->fecha_factura;
        $factura->tipo_pago = $request->tipo_pago;
        $factura->fecha_vencimiento = $request->fecha_vencimiento;
        $factura->total = $request->total;
        $factura->estado = $request->estado;
        $factura->impreso = $request->impreso;

        $factura->save();
        $data = [
            'message' => 'Factura Actualizada Exitosamente',
            'response' => $factura
        ];
        return response($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        $factura->detalles()->delete();
        $factura->delete();
        $data = [
            'message' => 'Factura Eliminada Exitosamente',
            'response' => $factura
        ];
        return response($data);
    }    

}