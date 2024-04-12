let personaje = {
  id: 140,
  name: "Genital Washer",
  status: "Alive",
  species: "Human",
  type: "",
  gender: "Male",
  origin: {
    name: "Post-Apocalyptic Earth",
    url: "https://rickandmortyapi.com/api/location/8",
  },
  location: {
    name: "Post-Apocalyptic Earth",
    url: "https://rickandmortyapi.com/api/location/8",
  },
  image: "https://rickandmortyapi.com/api/character/avatar/140.jpeg",
  episode: ["https://rickandmortyapi.com/api/episode/23"],
  url: "https://rickandmortyapi.com/api/character/140",
  created: "2017-12-27T18:47:44.566Z",
};

//console.log("El personaje " + personaje.name + " esta "+ personaje.status);

//document.getElementById("result").innerHTML=("El personaje " + personaje.name + " esta " + personaje.status);




/*
forma para buscar los primeros 20 personajes

let codigoInput = document.getElementById("codigo").value;

function buscarPersonaje() {

  const codigoInput = document.getElementById("codigo").value;

  document.getElementById("result").innerHTML ="";

  fetch("https://rickandmortyapi.com/api/character")
    .then((response) => response.json())
    .then((data) => {
      console.log(data);

      console.log(data["results"]);

      console.log(codigoInput);

      data["results"].forEach((personaje) => {console.log(personaje.id)
        if ((codigoInput) == personaje.id) {
          document.getElementById("result").innerHTML =
            "El personaje " + personaje.name + " esta " + personaje.status;

        } 
      });
    });
}
*/


/*forma para buscar usando la api chacarcter

function buscarPersonaje(){
  let codigoInput = document.getElementById("codigo").value;
  document.getElementById("result").innerHTML=" ";
  fetch("https://rickandmortyapi.com/api/character/" + codigoInput)
  .then(Response => Response.json())
  .then(data =>{
  
      if (data.name != null){
          document.getElementById("result").innerHTML=("El personaje " + data.name + " esta " + data.status)
  
      }
          else {
          
              document.getElementById("result").innerHTML=("El personaje no existe")   
          }
  
      console.log(data)   
  } )
  }

*/



function buscarImagen(){
  let codigoInput = document.getElementById("codigo").value;
  
  document.getElementById("result").innerHTML=" ";
  fetch(`https://rickandmortyapi.com/api/character/${codigoInput}`)
  .then(Response => Response.json())
  .then(data =>{
  let imagen= document.getElementById("imagen").src;
  imagen.src=data.image;
   let gender=data.gender;
  
      if (gender === "unknown"){
          document.getElementById("result").innerHTML=`<img src="${data.image}">
                                                       <p>${data.name}<p>
                                                       <p>${data.gender}<p>`
  
      }
          else {
          
              document.getElementById("result").innerHTML=("El personaje no es del genero que buscas")   
          }
  
      console.log(data)   
  } )
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
