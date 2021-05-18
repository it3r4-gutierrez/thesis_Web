<div class="container" style="background-color:gray; min-width:1350px; margin:auto;padding-top:20px;">
    <div style="width:1300px; margin:auto;">



        <div class="table-responsive">

            <div class="container">
                <table class="table table-striped" style="color:white;">
                    <thead>
                        <tr> 
                            <th>Emergency_ID</th>
                            <th>Resident_ID</th>
                            <th>Date/Time</th>
                            <th>Full Name</th>
                            <th>Location(Lat/Long)</th>
                            <th>Address</th>
                            <th>Note</th>
                            <th>EmergencyType</th>
                            <th>Contact Number</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody id="table">

                        <?php foreach ($data as $d) { ?>
                        <tr onclick="myFunction(this)">
                            <td><?php echo $d->Ereport_ID; ?></td>
                            <td><?php echo $d->resident_ID; ?></td>
                            <td><?php echo $d->date; ?></td>
                            <td><?php echo $d->FirstName; ?> <?php echo $d->LastName; ?></td>
                            <td><?php echo $d->latitude; ?>,<?php echo $d->longitude; ?></td>
                            <td><?php echo $d->addressDesc; ?></td>
                            <td><?php echo $d->note; ?></td>
                            <td><?php echo $d->EmegencyType; ?></td>
                            <td><?php echo $d->ContactNumber; ?></td>
                            <td style="width:50px;">
                                <button class=" btn btn-info btn-lg"
                                    onclick="document.getElementById('id01').style.display='block'">
                                    <i class=" fas fa-map"></i></button>



                            </td>

                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>


        <div id="id01" class="modal" style="width: 80%; margin-left:300px;margin-right:50px; ">
            <!-- <span style="margin-top: 50px;" data-dismiss="modal"
                onclick="document.getElementById('id01').style.display='none'" class="close"
                title="Close Modal">×</span> -->
            <div class="container">
                <div class="modal-body">
                    <div id="map" style="width: 95% !important;margin-top:280px;height:500px;"></div>
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
                <div class="clearfix" style="height: 200px;overflow: scroll;background-color:white;">
                    <table id="myTable" class="table table-striped " style="color:black;">
                        <thead>
                            <tr>
                                <th>Responder_ID </th>
                                <th>Department
                                <input type="text" id="myInputDept" onkeyup="myFunctionDept()"
                                        placeholder="Department..." title="Type in a Department">
                                </th>
                                <th>Address<input type="text" id="myInputAddress" onkeyup="myFunctionAddress()"
                                        placeholder="Address..." title="Type in a Address">
                                </th>
                                <th>Contact Number</th>
                                <th>Forward</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($datamodal as $ds) { ?>
                            <tr onclick="myRFunction(this)">
                                <td>
                                    <?php echo $ds->Responder_ID; ?>

                                </td>
                                <td><?php echo $ds->Department; ?></td>
                                <td><?php echo $ds->Address; ?></td>
                                <td><?php echo $ds->ContactNumber; ?></td>

                                <!-- -->

                                <td>

                                    <form method="POST" action=" <?php echo base_url(); ?>index.php/user/forward_con">



                                        <button type=" submit" class="btn btn-info btn-lg"><i
                                                class="fas fa-forward"></i></button>


                                </td>
                            </tr>
                            <?php } ?>


                        </tbody>
                        <!-- <input type="hidden" name="Ereport_ID" > -->
                    </table>


                </div>
            </div>


        </div>

    </div>
</div>
<input type="hidden" name="Responder_index" id="finalIDRe" value="">
<input type="hidden" name="Ereport_index" id="finalID" value="">
</form>
<!--close the modal by just clicking outside of the modal-->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>   -->
<script>
function myFunction(x) {
    // alert(x.rowIndex);
    $("#finalID").val(x.rowIndex);
}

function myRFunction(x) {
    // alert(x.rowIndex);
    $("#finalIDRe").val(x.rowIndex);
}
</script>

<script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
</script>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
                <h1>AD</h1>
            </div> -->
            <div class="info">
                <h1 style="color:white;text-align: center;">
                    <?php echo $this->session->userdata('User')['userLevel']; ?>
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
                    <a href="<?php echo base_url(); ?>index.php/User/adminhome" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>index.php/User/History" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            History
                            <!-- <i class="fas fa-angle-left right"></i>
               <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>index.php/User/users" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            User
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>

                <li class="nav-item">

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <a href="<?php echo base_url(); ?>index.php/User/logout" class="nav-link">
        <i class="fas fa-power-off text-info"> Logout</i>

    </a>


</aside>