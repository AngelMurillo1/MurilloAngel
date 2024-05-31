
function searchUser(){
    fetch(`personas.json`)
    .then(response => response.json()) 
    .then(data => {
        console.log(data["results"]); 

        let array = []; 
        let array2 = []; 
        let mujeres = 0; 
        let varones = 0; 

        data["results"].forEach(user => {
            if (user.gender === "female") {
                array.push(user.name.first + " " + user.name.last);
                mujeres += 1;
            }
            else {
                array2.push(user.name.first + " " + user.name.last);
                varones += 1;   
            }
        });

        // Obtiene los contenedores para las mujeres y los hombres
        const mujeresDiv = document.getElementById("mujeres");
        const hombresDiv = document.getElementById("hombres");

        
        for (let i = 0; i < array.length; i++) {
            const nombre = array[i];

            let p = document.createElement("p"); // Crea un elemento de párrafo
            p.textContent = nombre; // Establece el texto del párrafo
            p.style.color = "#FF0000"; 
            mujeresDiv.appendChild(p); // Añade el párrafo al contenedor de mujeres

           
            let contadorMujeres = document.getElementById("contador");
            contadorMujeres.innerText = `Cantidad de mujeres: ` + mujeres; 
        } 

        
        for (let i = 0; i < array2.length; i++) {
            const nombre = array2[i];

            let p = document.createElement("p"); // Crea un elemento de párrafo
            p.textContent = nombre; // Establece el texto del párrafo
            p.style.color = "#0000FF"; 
            hombresDiv.appendChild(p); // Añade el párrafo al contenedor de hombres

            
            let contadorVarones = document.getElementById("contador2");
            contadorVarones.innerText = `Cantidad de hombres: ` + varones; 
        } 

        let personas = varones + mujeres;
        let contadorPersonas = document.getElementById("contador3");
        contadorPersonas.innerText = `Cantidad de personas: ` + personas; 
    })
}