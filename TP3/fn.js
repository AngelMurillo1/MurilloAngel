class Persona{
    
   constructor(nombre,apellido, fecha_nacimiento){

    this.nombre = nombre;
    this.apellido = apellido;
    this.fecha_nacimiento = fecha_nacimiento;

   }

   Saludar(){

    console.log(`Hola, soy ${this.nombre} ${this.apellido} y tengo ${this.edad} años`)

   }

   getEdad(){

    //Año actual
    let hoy = new Date();

    //Año de la fecha de nacimiento
    let cumpleanos = new Date(this.fecha_nacimiento);
    
    //Restamos el año actual con el de la fecha de nacimiento
    let edad = hoy.getFullYear() - cumpleanos.getFullYear();

    //Restamos el mes actual con el de la fecha de nacimiento
    let mes = hoy.getMonth() - cumpleanos.getMonth();
 
    //Comparamos si ya cumplio años o no, si no lo cumplio restamos la edad - 1
    if (mes < 0 || (mes === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }

    return edad
   }
}


let Angel = new Persona('Angel','Murillo','2001-07-26');

let Bruno = new Persona('Bruno','Godoy','2001-09-13');

console.log(`${Angel.nombre} tiene ${Angel.getEdad()} años.`);
console.log(`${Bruno.nombre} tiene ${Bruno.getEdad()} años.`);

