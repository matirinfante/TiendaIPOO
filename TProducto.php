<?php
require "DataModel/Producto.php";

class TProducto
{

    public function __construct()
    {
    }

    public function altaProducto()
    {
        $producto = new Producto(0, "p1", "m1", "red", "d1", 10, 150);
        $producto->insertar();
        $producto->listar();
        return $producto;
    }

    public function bajaProducto($idProducto)
    {
        $producto = new Producto();
        if ($producto->buscar($idProducto)) {
            $producto->eliminar();
        }
    }

    public function modificarProducto($idProducto)
    {
        $producto = new Producto();
        if ($producto->buscar()) {
            //TODO modificar producto
        }
    }

    public function actualizarStock($cantidad, $idProducto)
    {
        $producto = new Producto();
        if ($producto->buscar($idProducto)) {
            if ($cantidad <> 0) {
                $stockActual = $producto->getCantstock() + $cantidad;
                $producto->setCantstock($stockActual);
                $producto->modificar();
            }
        }
    }
}