function randomUser(){
    fetch(`https://randomuser.me/api/?results=3`)
    .then(response => response.json())
    .then(data => {
        let array = [];

        let mayorEdad = null;

        console.log(data["results"])

        data["results"].forEach(user => {
            array.push(user.dob.age);
            
            if (mayorEdad === null || user.dob.age > mayorEdad.dob.age) {
                mayorEdad = user;
            }
        });
        console.log(array)

        if (mayorEdad != null) {
            const mayorEdadC = document.getElementById("mayorEdades");
            let p = document.createElement("p")
            p.textContent = `La persona de mayor edad es ${mayorEdad.name.first} ${mayorEdad.name.last} con ${mayorEdad.dob.age} años `
            mayorEdadC.appendChild(p)
        }
        
    })
}

function rickMorty(){

    let codigoInput1 = document.getElementById("codigo1").value;
    let codigoInput2 = document.getElementById("codigo2").value;
    let codigoInput3 = document.getElementById("codigo3").value;


    if(codigoInput1 && codigoInput2 && codigoInput3 > 0 && codigoInput1 && codigoInput2 && codigoInput3 < 827){
    fetch(`https://rickandmortyapi.com/api/character/${codigoInput1},${codigoInput2},${codigoInput3}`)
    .then(response => response.json())
    .then(data => {
        console.log(data)

        let array = [];

        data.forEach(nombre => {

            array.push(" " + nombre.name)

            array.sort()
            
        });

        console.log(array)

        let ordenar = document.getElementById("ordenar")
        let p = document.createElement("p")
        p.textContent = `Los personajes ordenados alfabeticamente son: ${array} `
        ordenar.appendChild(p)



    })
}

else{
    alert("No existen ID negativos, ni tampoco mas de 826 personajes")
}
}

const RandomUserAPI = `https://randomuser.me/api/`
const RickandMortyAPI= `https://rickandmortyapi.com/api/character/3`


class Persona{
    constructor(nombre,foto,edad,genero,ciudad){
        this.nombre=nombre;
        this.foto=foto;
        this.edad=edad;
        this.genero=genero;
        this.ciudad=ciudad;
    }
}


function crearObjeto(){
    let RandomUserData,RickandMortyData


    fetch(RandomUserAPI)
    .then(response => response.json())
    .then(data => {


        RandomUserData = data; // Guardar los datos de Random User


        return fetch(RickandMortyAPI) // Hacer la solicitud a la API de Rick and Morty
    })
    .then(response => response.json())
    .then(data => {


        RickandMortyData = data; // Guardar los datos de Rick and Morty


        // Crear un objeto con la información combinada de ambas APIs
        let PersonajeCombinado = new Persona(RandomUserData.results[0].name.first + ' ' + RandomUserData.results[0].name.last,
                                            RickandMortyData.image,RandomUserData.results[0].dob.age,RickandMortyData.gender,
                                            RickandMortyData.location.name)


       


        console.log(PersonajeCombinado)


        let mostrarObjeto = document.getElementById("mostrar")


        let p = document.createElement("p")


        p.textContent = `El personaje se llama ${PersonajeCombinado.nombre}, su edad es ${PersonajeCombinado.edad} años,
                                    vive en ${PersonajeCombinado.ciudad} y su genero es ${PersonajeCombinado.genero}`
       
        mostrarObjeto.appendChild(p)


        let image = document.createElement("img")
        image.src = PersonajeCombinado.foto
        mostrarObjeto.appendChild(image);
    })
   
}
