let i1=0;
let i2=0;
let $array = [];

function search(){

    i1 += 1

    let $numero= document.getElementById("codigo1").value;

    $array.push($numero)

    if (i1 === 3){

    document.getElementById("codigo1").disabled = true;
    document.getElementById("enviar1").disabled = true;

    }
    console.log($array)
}


function search2(){

    i2 += 1

    let $numero= document.getElementById("codigo2").value;
    
    $array.push($numero)

    if (i2 === 3){

        document.getElementById("codigo2").disabled = true;
        document.getElementById("enviar2").disabeld = true;
    }

    if( i1 ===3 && i2 === 3){
        buscarImagenes();
    }
    console.log($array)
}


function buscarImagenes(){

    personajesID= $array.join(",");

    fetch(`https://rickandmortyapi.com/api/character/${personajesID}`)
    .then(Response => Response.json())
    .then(data =>{

        data.forEach((personaje, index) => {

            const img = document.createElement("img");
            img.src = personaje.image;

            img.classList.add(`imagen-${index + 1}`); 

            document.getElementById("imagenes").appendChild(img);
            
        });

    })
}


    
