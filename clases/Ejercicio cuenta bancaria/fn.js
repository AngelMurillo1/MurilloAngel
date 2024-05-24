class Cliente{
    constructor(nombre,apellido,fecha_nacimiento){
        this.nombre = nombre;
        this.apellido = apellido;
        this.fecha_nacimiento = new Date(fecha_nacimiento)
    }

    // Método para verificar si el cliente es mayor de edad
    getEsMayorDeEdad() {
        let hoy = new Date();
        let edad = hoy.getFullYear() - this.fecha_nacimiento.getFullYear();
        let mes = hoy.getMonth() - this.fecha_nacimiento.getMonth();

        if (mes < 0 || (mes === 0 && hoy.getDate() < this.fecha_nacimiento.getDate())) {
            return edad--;
        }
        return edad;
    }
}


class Cuenta_Bancaria{
    constructor(cliente,saldo){  

        // Verifica si el cliente es mayor de edad antes de crear la cuenta
        if (cliente.getEsMayorDeEdad() >= 18) {
            this.cliente = cliente;
            this.saldo = 0;
        } else {
            console.log("El cliente debe ser mayor de edad para crear una cuenta bancaria.");
        }

    }

    // Método para consultar el saldo de la cuenta
    consultarSaldo() {
        return this.saldo;
    }

     // Método para depositar un monto en la cuenta
    depositar(monto){

        // Verifica si el monto es válido y no excede los $1000
        if (monto > 0 && monto <= 1000){
            this.saldo += monto;
            console.log(`Deposito exitoso.`)
        }
        else {
            console.log(`El monto a depositar debe ser positivo y no mayor a $1000`)
        }
    }

    // Método para retirar un monto de la cuenta
    retirar(monto){

        // Verifica si el monto es válido y no excede el saldo disponible
        if(monto > 0 && monto <= this.saldo){
            this.saldo -= monto;
            console.log(`Retiro exitoso.`)
        }
        else{
            console.log("El monto a retirar debe ser positivo y no mayor que el saldo")
        }
    }

}

let clienteActual;
let cuentaActual;

function crearCliente() {

    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let fecha_nacimiento = document.getElementById("fechaNacimiento").value;

    clienteActual = new Cliente(nombre,apellido,fecha_nacimiento);

     // Verifica si el cliente es mayor de edad
    if (clienteActual.getEsMayorDeEdad() >= 18 ){
        cuentaActual = new Cuenta_Bancaria(clienteActual);
        console.log("Cliente y cuenta bancaria creados exitosamente")
    }
    else{
        console.log("El cliente debe ser mayor de edad para crear una cuenta bancaria")
    }
    
}

function consultarSaldo() {
    if (cuentaActual){
        console.log(`Saldo actual: ${cuentaActual.consultarSaldo()}`)
    }
    else{
        console.log("Debe crear una cuenta bancaria primero.")
    }
}

function depositar() {
    if (cuentaActual){
    let monto = parseFloat(document.getElementById("deposito").value);
    let resultado = cuentaActual.depositar(monto);
    
    }
    else{
        console.log("Debe crear una cuenta bancaria primero.")
    }
}

function retirar() {
    if (cuentaActual){
    let monto = parseFloat(document.getElementById("retiro").value);
    let resultado = cuentaActual.retirar(monto)
    }
    else{
        console.log("Debe crear una cuenta bancaria primero.")
    }
}








