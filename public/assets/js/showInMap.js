$(document).ready(function () {
    // On initialise la carte
    var carte = L.map('green_areas_map').setView([48.852969, 2.349903], 13);

    // On charge les "tuiles"
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(carte);

    // Appel Ajax
    $.ajax({
        type: "POST",
        url: "/green-areas/map/coordinates",
        cache: false,
        success: function (coordinates) {
            const coords = JSON.parse(coordinates);
            Object.entries(coords).forEach((entry) => {
                const [key, value] = entry;
            var marker = L.marker([value.lat, value.long]).addTo(carte);
            marker.bindPopup(value.nom);
        })
            ;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log('Text Status: ' + textStatus);
        }
    });

    // Injection des donnees marqueur sur la page
    //var marker = L.marker([14.7645042, -17.3660286]).addTo(carte);
    //marker.bindPopup("Dakar");

    // On boucle sur les données (ES8)
    /*Object.entries([]).forEach(agence => {
        // Ici j'ai une seule agence
        // On crée un marqueur pour l'agence
        var marker = L.marker([agence[1].lat, agence[1].lon]).addTo(carte)
        marker.bindPopup(agence[1].nom)
    };*/
});
