<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Proveedore::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingProveedor = Proveedore::where('documento_identificacion', $request->documento_identificacion)->exists();
        if ($existingProveedor) {
            return response()->json(['message' => 'Ya existe un proveedor con ese documento de identificacion'], 400);
        }

        $existingEmail = Proveedore::where('email', $request->email)->exists();
        if ($existingEmail) {
            return response()->json(['message' => 'Ya existe un proveedor con ese email'], 400);
        }

        $proveedor = new Proveedore;
        $proveedor->documento_identificacion = $request->documento_identificacion;
        $proveedor->nombre = $request->nombre;
        $proveedor->ciudad = $request->ciudad;
        $proveedor->tipo_proveedor = $request->tipo_proveedor;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->email = $request->email;
        $proveedor->estado = $request->estado;

        $proveedor->save();
        $data = [
            'message' => 'Proveedor Creado Exitosamente',
            'response' => $proveedor
        ];
        return response($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedore $proveedore)
    {
        $proveedore = Proveedore::find($proveedore->id);        
        return response()->json($proveedore);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedore $proveedore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedore $proveedore)
    {
        $proveedore->documento_identificacion = $request->documento_identificacion;
        $proveedore->nombre = $request->nombre;
        $proveedore->ciudad = $request->ciudad;
        $proveedore->tipo_proveedor = $request->tipo_proveedor;
        $proveedore->direccion = $request->direccion;
        $proveedore->telefono = $request->telefono;
        $proveedore->email = $request->email;
        $proveedore->estado = $request->estado;
        $proveedore->save();
        $data = [
            'message' => 'Proveedor Actualizado Exitosamente',
            'response' => $proveedore
        ];
        return response($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedore $proveedore)
    {
        $proveedore->delete();
        $data = [
            'message' => 'Proveedor Eliminado Exitosamente',
            'response' => $proveedore
        ];
        return response($data);
    }

    public function proveedorAll(Proveedore $proveedore)
    {
        $proveedore = Proveedore::with('facturas.detalles')->find($proveedore->id);
        return response()->json($proveedore);
    }

}