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

  /* buscar id del personaje y con su foto saber su genero
  function buscarImagen(){
    let codigoInput = document.getElementById("code").value;
    document.getElementById("results").innerHTML=" ";
    fetch(`https://rickandmortyapi.com/api/character/${codigoInput}`)
    .then(Response => Response.json())
    .then(data =>{
    let imagen=document.getElementById("imagen");
    imagen.src=data.image;
        if (data.gender === "unknown"){
            document.getElementById("results").innerHTML=`<img src="${imagen}">`
                                                     
    
        }
            else {
            
                document.getElementById("results").innerHTML=("El genero del personaje no es el correcto")   
            }
    
        console.log(data)   
    } )
    }
  */

    function comparar(){
      let codigoInput = document.getElementById("codigo").value;
      let codigoInput2 = document.getElementById("code").value;

      document.getElementById("resultado").innerHTML=" ";

      fetch(`https://rickandmortyapi.com/api/character/${codigoInput},${codigoInput2}`)
      .then(Response => Response.json())
      .then(data =>{

      let imagen=document.getElementById("img");
      let imagen2 = document.getElementById("img2");

      imagen.src=data[0].image;
      imagen2.src=data[1].image;
       
      if(data[0].gender === data[1].gender){
          document.getElementById("resultado").innerHTML=`<img src="https://media.istockphoto.com/id/1133442802/es/vector/marca-de-verificaci%C3%B3n-verde-ilustraci%C3%B3n-vectorial.jpg?s=612x612&w=0&k=20&c=VFWXNv5mal3SxiaabNxWedt-vGBvq_NODY_OZyYNXdM=">`
      }
  
      else {
          document.getElementById("resultado").innerHTML=`<img src="https://w7.pngwing.com/pngs/509/800/png-transparent-door-organization-tick-cross-angle-logo-business-thumbnail.png">`
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
