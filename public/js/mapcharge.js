/**
 * Created by James on 13/01/2016.
 */
$(document).ready()(function(){
    map1= new GMaps({
        div: '#map',
        lat:-0.291941,
        long: -78.456722,
        zoom:15

    });
    map1.addMarker({
        lat:-0.291941,
        long: -78.456722,
        title: 'Iglesia San Gabriel de los Chillos',
        infoWindow: {
            content: '<p>Direcci&oacuten</p>'
        }

    });
    panorama= new GMaps.createPanorama({
        div: '#stvw',
        lat:-0.291941,
        long: -78.456722
    });
});