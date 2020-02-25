<?php


class Venta
{
    private int $codigo;
    private DateTime $fecha;
    private string $denominacioncliente;
    private float $descuento;
    private float $incremento;
    private float $importefinal;

    /**
     * Venta constructor.
     * @param int $codigo
     * @param DateTime $fecha
     * @param string $denominacioncliente
     * @param float $descuento
     * @param float $incremento
     * @param float $importefinal
     */
    public function __construct(int $codigo, DateTime $fecha, string $denominacioncliente, float $descuento, float $incremento, float $importefinal)
    {
        $this->codigo = $codigo;
        $this->fecha = $fecha;
        $this->denominacioncliente = $denominacioncliente;
        $this->descuento = $descuento;
        $this->incremento = $incremento;
        $this->importefinal = $importefinal;
    }

    /**
     * @return int
     */
    public function getCodigo(): int
    {
        return $this->codigo;
    }

    /**
     * @param int $codigo
     */
    public function setCodigo(int $codigo): void
    {
        $this->codigo = $codigo;
    }

    /**
     * @return DateTime
     */
    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    /**
     * @param DateTime $fecha
     */
    public function setFecha(DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return string
     */
    public function getDenominacioncliente(): string
    {
        return $this->denominacioncliente;
    }

    /**
     * @param string $denominacioncliente
     */
    public function setDenominacioncliente(string $denominacioncliente): void
    {
        $this->denominacioncliente = $denominacioncliente;
    }

    /**
     * @return float
     */
    public function getDescuento(): float
    {
        return $this->descuento;
    }

    /**
     * @param float $descuento
     */
    public function setDescuento(float $descuento): void
    {
        $this->descuento = $descuento;
    }

    /**
     * @return float
     */
    public function getIncremento(): float
    {
        return $this->incremento;
    }

    /**
     * @param float $incremento
     */
    public function setIncremento(float $incremento): void
    {
        $this->incremento = $incremento;
    }

    /**
     * @return float
     */
    public function getImportefinal(): float
    {
        return $this->importefinal;
    }

    /**
     * @param float $importefinal
     */
    public function setImportefinal(float $importefinal): void
    {
        $this->importefinal = $importefinal;
    }

}