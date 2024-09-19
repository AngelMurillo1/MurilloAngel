<?php

require_once "Persona.php";
require_once "Empleado.php";
require_once "script.php";

class Cliente extends Persona {
    public $numeroCuenta;
    public $monto;

    public function __construct($nombre, $apellido, $fecha_nacimiento, $dni, $localidad, $provincia, $telefono, $numeroCuenta, $monto) {
        parent::__construct($nombre, $apellido, $fecha_nacimiento, $dni, $localidad, $provincia, $telefono);
        $this->numeroCuenta = $numeroCuenta;
        $this->monto = $monto;
    }

    public function mostrarInformacion() {
        $info = parent::mostrarInformacion();
        return "$info, Número de Cuenta: $this->numeroCuenta, Monto: $this->monto";
    }

    public function calcularMontoConImpuesto() {
        return aplicarImpuestoCliente($this->monto, $this->fecha_nacimiento);
    }
}

?>