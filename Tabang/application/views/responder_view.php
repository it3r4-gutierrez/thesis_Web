<div class="container" style="background-color:gray;width:1150px; margin:auto;padding-top:20px;">
    <div style="width:1100px; margin:auto;">



        <div class="table-responsive">

            <div class="container">
                <table class="table table-striped" style="color:white;">
                    <thead>
                        <tr>
                            <th>Freport_ID</th>
                            <th>Date/Time</th>
                            <th>Resident_ID</th>
                            <th>Resident Contact Number</th>
                            <th>Location(Lat/Long)</th>
                            <th>Address</th>
                            <th>Note</th>
                            <th>EmergencyType</th>
                            <th>Status</th>
                            <th>Update</th>
                            <th>View
                            <th>
                        </tr>
                    </thead>
                    <tbody id="table">

                        <?php foreach ($data as $d) { ?>
                        <tr>
                            <form method="POST" action="<?php echo base_url(); ?>index.php/User/updatestatusinres"
                                role="form" class="login-form">
                                <td><?php echo $d->Freport_ID; ?>
                                    <input type="hidden" name="Freport_ID" value="<?php echo $d->Freport_ID; ?>">

                                </td>
                                <td><?php echo $d->date; ?></td>
                                <td><?php echo $d->resident_ID; ?></td>
                                <td><?php echo $d->ContactNumber; ?></td>
                                <td><?php echo $d->latitude; ?> ,<?php echo $d->longitude; ?></td>
                                <td><?php echo $d->addressDesc; ?></td>
                                <td><?php echo $d->note; ?></td>
                                <td><?php echo $d->EmegencyType; ?></td>
                                <td>

                                    <select name="Status_incident" id="list" style="width: 150px;" class="form-control"
                                        onchange="changeValue()">
                                        <option value="<?php echo $d->Status_incident; ?>">
                                            <?php echo $d->Status_incident; ?></option>
                                        <option value="Pending">Pending</option>
                                        <option value="OnGoing">OnGoing</option>
                                        <option value="Done">Done</option>
                                    </select>

                                </td>
                                <td>
                                    <button type="submit" class=" btn btn-success btn-sm">
                                        <i class=" fas fa-map"></i>Update</button>
                            </form>
                            </td>

                            <td><button class=" btn btn-info btn-lg"
                                    onclick="document.getElementById('id01').style.display='block'">
                                    <i class=" fas fa-map"></i></button>
                            </td>

                        </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
function changeValue() {
    var value = $("#list").val();
    alert(value);
}
</script>
<div id="id01" class="modal" style="width: 80%; margin-left:300px;margin-right:50px; ">



    <div class="modal-body">
        <button style="margin-top: 100px;" type="button" onclick="document.getElementById('id01').style.display='none'"
            class="cancelbtn btn btn-warning">Close</button>
        <div id="map" style="width: 95% !important;margin-top:180px;height:700px;"></div>
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
        <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoidGFiYW5nZGIiLCJhIjoiY2tuOHg3dHBrMTJjZzMxcGh5YnBiYmdpaSJ9.KzUKn0mqGKBac6r7lX60rg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [<?php echo $d->longitude; ?>,
                <?php echo $d->latitude; ?>
            ], //long lat 8.47452440465969, 124.61187706445592 
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
                                        <?php echo $d->longitude; ?>,
                                        <?php echo $d->latitude; ?> //long lat
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

    </div>

</div>


</div>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.0/js/bootstrap.min.js"></script>

</html>
<script>
function singleSelectChangeValue() {
    //Getting Value
    //var selValue = document.getElementById("singleSelectDD").value;
    var selObj = document.getElementById("singleSelectValueDDJS");
    var selValue = selObj.options[selObj.selectedIndex].value;
    //Setting Value
    document.getElementById("textFieldValueJS").value = selValue;
}
</script>



</div>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <h1 style="color:white;">Responder
                </h1>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>index.php/User/responderhome" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>index.php/User/responderhistory" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            History
                            <!-- <i class="fas fa-angle-left right"></i>
               <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <a href="<?php echo base_url(); ?>index.php/user/logout" class="nav-link">
        <i class="fas fa-power-off text-info"> Logout</i>

    </a>


</aside>