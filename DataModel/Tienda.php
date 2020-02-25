<?php


class Tienda
{
    private int $cuit;
    private string $nombre;
    private string $direccion;
    private int $telefono;

    /**
     * Tienda constructor.
     * @param int $cuit
     * @param string $nombre
     * @param string $direccion
     * @param int $telefono
     */
    public function __construct(int $cuit, string $nombre, string $direccion, int $telefono)
    {
        $this->cuit = $cuit;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    /**
     * @return int
     */
    public function getCuit(): int
    {
        return $this->cuit;
    }

    /**
     * @param int $cuit
     */
    public function setCuit(int $cuit): void
    {
        $this->cuit = $cuit;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getDireccion(): string
    {
        return $this->direccion;
    }

    /**
     * @param string $direccion
     */
    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    /**
     * @return int
     */
    public function getTelefono(): int
    {
        return $this->telefono;
    }

    /**
     * @param int $telefono
     */
    public function setTelefono(int $telefono): void
    {
        $this->telefono = $telefono;
    }



}