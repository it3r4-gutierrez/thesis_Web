<div id="map"></div>


<script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoidGFiYW5nZGIiLCJhIjoiY2tuOHg3dHBrMTJjZzMxcGh5YnBiYmdpaSJ9.KzUKn0mqGKBac6r7lX60rg';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [124.61187706445592, 8.47452440465969], //long lat 8.47452440465969, 124.61187706445592 
    //https://www.google.com/maps/search/8.47452440465969,124.61187706445592
    zoom: 15
});

map.on('load', function() {
    // Add an image to use as a custom marker
    map.loadImage(
        'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
        function(error, image) {
            if (error) throw error;
            map.addImage('custom-marker', image);
            // Add a GeoJSON source with 2 points
            map.addSource('points', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': [{
                        // feature for Mapbox DC
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [
                                124.61187706445592, 8.47452440465969 //long lat
                            ]
                        },
                        'properties': {
                            'title': 'Report Location'
                        }
                    }]
                }
            });

            // Add a symbol layer
            map.addLayer({
                'id': 'points',
                'type': 'symbol',
                'source': 'points',
                'layout': {
                    'icon-image': 'custom-marker',
                    // get the title name from the source's "title" property
                    'text-field': ['get', 'title'],
                    'text-font': [
                        'Open Sans Semibold',
                        'Arial Unicode MS Bold'
                    ],
                    'text-offset': [0, 1.25],
                    'text-anchor': 'top'
                }
            });

        }
    );

    map.addControl(new mapboxgl.NavigationControl());
});
</script>