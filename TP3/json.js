function llamar(){

    fetch(`https://randomuser.me/api/`)
    .then(Response => Response.json())
    .then(data => {
    
        console.log(data)

        let longitud= data.results[0].location.coordinates.longitude
        let latitud= data.results[0].location.coordinates.latitude

        let map = L.map("map").setView([longitud, latitud], 10);

        let marker = L.marker([longitud, latitud]).addTo(map);

        //  circle = L.circle([longitud, latitud], {
        //     color: 'red',
        //     fillColor: '#f03',
        //     fillOpacity: 0.5,
        //     radius: 500
        // }).addTo(map);
       

        L.tileLayer(`https://tile.openstreetmap.org/{z}/{x}/{y}.png`, {
            maxZoom: 90,
            attribution: `&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>`
        }).addTo(map);
    })

    
    
}
        
