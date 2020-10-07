<?php
require 'BaseDatos.php';
mainApp();

function mainApp()
{
    $p = new BaseDatos();
    $p->Iniciar();
    $p->Ejecutar("INSERT INTO producto(codigobarra, nombre, marca, color,descripcion,cantstock, importe) VALUES (0,'hola','hola','hola','hola',10,150)");
}
