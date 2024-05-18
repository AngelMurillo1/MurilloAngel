class Persona{
    constructor(name,lastname,gender,city,email,fecha_nacimiento){
        this.name=name;
        this.lastname=lastname;
        this.gender=gender;
        this.city=city;
        this.email=email;
        this.fecha_nacimiento=fecha_nacimiento;
    }

    getEdad(){
        let hoy = new Date();
        let cumpleanos = new Date(this.fecha_nacimiento);
        let edad = hoy.getFullYear() - cumpleanos.getFullYear();
        let mes = hoy.getMonth() - cumpleanos.getMonth();

        if (mes < 0 || (mes === 0 && hoy.getDate() < cumpleanos.getDate())){
            edad--;
        }
        return console.log (`Hola, soy ${this.name} ${this.lastname} y tengo ${edad} años`);

    }

    // Saludar(){
    //     console.log(`Hola, soy ${this.name} ${this.lastname} `)
    // }


    // esMenor(){
    //     console.log(`Hola soy ${this.name} ${this.lastname} y soy cliente, mi cuenta de banco es ${this.numero_cuenta}`)
    // }

    // esMayor(){
    //     console.log(`Hola soy ${this.name} ${this.lastname} y soy empleado, mi legajo es ${this.legajo}`)
    // }

}


class Cliente extends Persona{
    constructor(name,lastname,gender,city,email,numero_cuenta){
        super(name,lastname,gender,city,email);

        this.numero_cuenta=numero_cuenta;

    }
}

class Empleado extends Persona{
    constructor(name,lastname,gender,city,email,legajo){
        super(name,lastname,gender,city,email);
        this.legajo = legajo;

    }
}

function Usuario(){
    fetch(`https://randomuser.me/api`)
    .then(response => response.json())
    .then(data => {

        console.log(data)

        let usuario = new Persona(data.results[0].name.first, data.results[0].name.last, data.results[0].gender, 
            data.results[0].location.city, data.results[0].email, data.results[0].dob.date)

        console.log(usuario)

        usuario.getEdad()


        // let usuario = new Persona(data.results[0].name.first, data.results[0].name.last, data.results[0].gender, 
        //                           data.results[0].location.city, data.results[0].email)

        // console.log(usuario)


        // if (data.results[0].dob.age < 18){
        //     let user = new Cliente(data.results[0].name.first, data.results[0].name.last, data.results[0].gender, 
        //                            data.results[0].location.city, data.results[0].email, '1');
        //         user.esMenor();
        // }

        // else{
        //     let user = new Empleado(data.results[0].name.first, data.results[0].name.last, data.results[0].gender, 
        //                             data.results[0].location.city, data.results[0].email, '10');
        //         user.esMayor();
        // }


        
    })
}

