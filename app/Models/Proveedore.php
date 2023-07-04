<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedore extends Model
{
    use HasFactory;
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'proveedor_id');
    }

    public function detalles()
    {
        return $this->hasManyThrough(DetalleFactura::class, Factura::class);
    }
}