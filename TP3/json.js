function llamar(){

    fetch(`https://randomuser.me/api/`)
    .then(Response => Response.json())
    .then(data => {
    
        console.log(data)

    //Definicion de variables de las coordenadas
        let longitud = data.results[0].location.coordinates.longitude
        let latitud = data.results[0].location.coordinates.latitude

    //Definimos el mapa y le paso las variables anteriores    
        let map = L.map("map").setView([longitud, latitud], 5);
        let marker = L.marker([longitud, latitud]).addTo(map);

    //Variable con la imagen de la persona    
        let imagen = document.getElementById("img");
        imagen.src = data.results[0].picture.large;

    //Variables con el nombre y apellido de la persona    
        let nombre = data.results[0].name.first;
        let apellido = data.results[0].name.last;

        document.getElementById("nombre").innerHTML=`${nombre + " " + apellido}`
                                                      

        L.tileLayer(`https://tile.openstreetmap.org/{z}/{x}/{y}.png`, {
            maxZoom: 90,
            attribution: `&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>`
        }).addTo(map);
    })

}   

