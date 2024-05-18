// class Persona{
//         nombre='';
//         apellido='';
//         dni='';
//         nacionalidad='';
//         fecha_nacimiento=''
// }


class Persona{
    constructor(nombre,apellido,dni,nacionalidad,fecha_nacimiento){
        this.nombre=nombre;
        this.apellido=apellido;
        this.dni=dni;
        this.nacionalidad=nacionalidad;
        this.fecha_nacimiento=fecha_nacimiento;
    }

    Saludar(){

        console.log(`Hola soy, ${this.nombre} ${this.apellido}` )
    }

}
class Cliente extends Persona{
    constructor(nombre,apellido,dni,nacionalidad,fecha_nacimiento,numero_cuenta){
        super(nombre,apellido,dni,nacionalidad,fecha_nacimiento);
        this.numero_cuenta=numero_cuenta;
    }

    
}    

let angel = new Cliente('Angel','Murillo','43.414.375','Argentina','2001-07-26','1');
// angel.nombre='Angel'
// angel.apellido='Murillo'
// angel.dni='43.414.375'
// angel.nacionalidad='Argentina'
// angel.fecha_nacimiento='2001-07-26';
// angel.numero_cuenta='1';


console.log(angel);

angel.Saludar();
