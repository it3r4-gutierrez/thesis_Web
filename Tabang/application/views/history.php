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
                            <th>Location(Lat/Long)</th>
                            <th>Responder_ID</th>
                            <th>EmergencyType</th>
                            <th> Responder Contact Number</th>
                            <th> Status</th>
                        </tr>
                    </thead>
                    <tbody id="table">

                        <?php foreach ($data as $d) { ?>
                        <tr onclick="myFunction(this)">
                            <td><?php echo $d->Freport_ID; ?></td>
                            <td><?php echo $d->date; ?></td>
                            <td><?php echo $d->resident_ID; ?></td>
                            <td><?php echo $d->latitude; ?> ,<?php echo $d->longitude; ?></td>
                            <td><?php echo $d->Responder_ID; ?></td>
                            <td><?php echo $d->EmegencyType; ?></td>
                            <td><?php echo $d->ContactNumber; ?></td>
                            <td><?php echo $d->Status_incident; ?></td>

                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
                <h1>AD</h1>
            </div> -->
            <div class="info">
                <h1 style="color:white;text-align: center;"><?php echo $this->session->userdata('User')['userLevel']; ?>
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
                    <a href="<?php echo base_url(); ?>index.php/User/adminhome" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>index.php/User/History" class="nav-link active">
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