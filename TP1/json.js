let personaje={
    "id": 140,
    "name": "Genital Washer",
    "status": "Alive",
    "species": "Human",
    "type": "",
    "gender": "Male",
    "origin": {
        "name": "Post-Apocalyptic Earth",
        "url": "https://rickandmortyapi.com/api/location/8"
    },
    "location": {
        "name": "Post-Apocalyptic Earth",
        "url": "https://rickandmortyapi.com/api/location/8"
    },
    "image": "https://rickandmortyapi.com/api/character/avatar/140.jpeg",
    "episode": [
        "https://rickandmortyapi.com/api/episode/23"
    ],
    "url": "https://rickandmortyapi.com/api/character/140",
    "created": "2017-12-27T18:47:44.566Z"
}

//console.log("El personaje " + personaje.name + " esta "+ personaje.status);

//document.getElementById("result").innerHTML=("El personaje " + personaje.name + " esta " + personaje.status);

function buscarPersonaje(){

    const codigoInput= document.getElementById("codigo").value 

    if(parseInt(codigoInput) === personaje.id){

        document.getElementById("result").innerHTML=("El personaje " + personaje.name + " esta " + personaje.status);

    }    
    else{
        document.getElementById("result").innerHTML=("No existe personaje con este id");
    }



}

/*
let jugador={
    "nombre": "Nahuel ",
    "apellido":"Barrios",
    "apodo":"Perrito",
    "edad":28,
    "clubes":['San Lorenzo','Defensa y Justicia'],
    "activo":true,
    "sueldo":10000.99,
}

console.log(jugador.clubes[0]);
*/