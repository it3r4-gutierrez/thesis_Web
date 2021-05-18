<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modal.css">
<div class="container" style="background-color:gray;width:1150px; margin:auto;padding-top:20px;">
    <div style="width:1100px; margin:auto;">
        <div class="row">

            <div class="col-lg-12">
                <div class="pull-right">
                    <a class="btn btn-info btn-lg" onclick="document.getElementById('id01').style.display='block'"
                        style="width:auto;"> Create New
                        User</a>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
        <div class="table-responsive">

            <div class="container">
                <table id="thisTable" class="table table-striped" style="color:white;">
                    <thead>
                        <tr>
                            <th>ID <input style="width:80px;" type="text" id="myInput" onkeyup="myFunction()"
                                    placeholder="ID...." title="Type in a name"></th>
                            <th>Email <input type="text" id="myInputE" onkeyup="myFunctionEmail()"
                                    placeholder="Search for Email.." title="Type in a name"></th>
                            <th>Full Name<input type="text" id="myInputName" onkeyup="myFunctionName()"
                                    placeholder="Search for Name.." title="Type in a name"></th>
                            <th>Location<input type="text" id="myInputLoc" onkeyup="myFunctionLoc()"
                                    placeholder="Search for Location.." title="Type in a name"></th>
                            <th>Type <input type="text" id="myInputType" onkeyup="myFunctionType()"
                                    placeholder="Search for Type.." title="Type in a name"></th>
                            <th>Department<input type="text" id="myInputDept" onkeyup="myFunctionDept()"
                                    placeholder="Search for Type.." title="Type in a Department"></th>
                            <th>Contact Number</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody id="thisTable">

                        <?php foreach ($data as $d) { ?>
                        <tr>
                            <td class="nr">
                                <?php echo $d->userInfo_ID; ?>

                            </td>
                            <td><?php echo $d->username; ?></td>
                            <td><?php echo $d->FirstName; ?> <?php echo $d->LastName; ?></td>
                            <td><?php echo $d->Address; ?></td>
                            <td><?php echo $d->userLevel; ?></td>
                            <td><?php echo $d->Department; ?></td>
                            <td><?php echo $d->ContactNumber; ?></td>
                            <td style="width:50px;">
                                <form method="POST" action=" <?php echo base_url(); ?>index.php/user/deleteC">

                                    <button id="subm" type="submit" class="use-address btn btn-danger btn-xs"><i
                                            class=" subm fas fa-trash" onclick="myFunction(this)"></i></button>



                            </td>
                        </tr>
                        <?php } ?>
                        <input type="hidden" name="userInfo_ID" id="finalID" value="">

                        </form>
                    </tbody>
                </table>



            </div>


        </div>


    </div>
</div>
<!-- Modal -->
<div id="id01" class="modal" style="width: 50% !important;margin-left:30%;">
    <span style="margin-top:40px;" type="button" onclick="document.getElementById('id01').style.display='none'"
        class="close">×</span>
    <div class="container">
        <div class="tab row">
            <button class="tablinks column" onclick="openCity(event, 'Responder')" id="defaultOpen">Responder</button>
            <button class="tablinks column" onclick="openCity(event, 'Resident')">Resident</button>
        </div>
        <div id="Responder" class="tabcontent">
            <form method="POST" action="<?php echo base_url(); ?>index.php/User/createresponder"
                class="modal-content animate" role="form">
                <div class="container">
                    <div class="row2">
                        <div class="column">
                            <label><b>First Name</b></label>
                            <input type="text" placeholder="Enter First Name" name="fname" required>
                        </div>
                        <div class="column">
                            <label><b>Last Name</b></label>
                            <input type="text" placeholder="Enter Last Name" name="lname" required>
                        </div>
                    </div>
                    <br>
                    <div class="row2">
                        <div class="column" style="width: 30% !important;">
                            <label><b> Department</b></label>
                            <select class="selopt" name="department" id="department" required>

                                <option class="selopt" value="">Department</option>
                                <option class="selopt" value="Police">Police</option>
                                <option class="selopt" value="Fire">Fireman</option>
                                <option class="selopt" value="Hospital">Medics/Hospital</option>
                                <option class="selopt" value="Hospital">Search and Rescue</option>
                            </select>
                        </div>
                        <div class="column" style="width: 70% !important;">
                            <label><b>Address</b></label>
                            <input type="text" placeholder="Enter Address" name="Address" required>
                        </div>
                    </div>
                    <br>
                    <div class="row2">
                        <div class="column" style="width: 100% !important;">
                            <label><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="username" required>
                        </div>
                    </div>
                    <br>
                    <div class="row2">
                        <div class="column">
                            <label><b>Contact Number</b></label>
                            <input type="text" placeholder="Enter Contact Number" name="ContactNum" required>
                        </div>
                        <div class="column">
                            <label><b>Password</b></label>
                            <input type="text" placeholder="Enter Password" name="Password" required>
                        </div>
                    </div>
                    <br>

                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Create</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="Resident" class="tabcontent ">
            <form method="POST" action="<?php echo base_url(); ?>index.php/User/createresident"
                class="modal-content animate" role="form">
                <div class="container">
                    <div class="row2">
                        <div class="column">
                            <label><b>First Name</b></label>
                            <input type="text" placeholder="Enter First Name" name="fname" required>
                        </div>
                        <div class="column">
                            <label><b>Last Name</b></label>
                            <input type="text" placeholder="Enter Last Name" name="lname" required>
                        </div>
                    </div>
                    <br>
                    <div class="row2">

                        <div class="column" style="width: 100% !important;">
                            <label><b>Address</b></label>
                            <input type="text" placeholder="Enter Address" name="Address" required>
                        </div>
                    </div>
                    <br>
                    <div class="row2">
                        <div class="column" style="width: 100% !important;">
                            <label><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="username" required>
                        </div>
                    </div>
                    <br>
                    <div class="row2">
                        <div class="column">
                            <label><b>Contact Number</b></label>
                            <input type="text" placeholder="Enter Contact Number" name="ContactNum" required>
                        </div>
                        <div class="column">
                            <label><b>Password</b></label>
                            <input type="text" placeholder="Enter Password" name="Password" required>
                        </div>
                    </div>
                    <br>

                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Create</button>
                    </div>
                </div>
            </form>
        </div>



    </div>
</div>


<!--close

 the modal by just clicking outside of the modal-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
$(".use-address").click(function() {
    var $row = $(this).closest("tr"); // Find the row
    var $text = $row.find(".nr").text();
    var $id = parseFloat($text); // Find the text
    $("#finalID").val($id);
    // Let's test it out
    // alert($text);
});


var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script>
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function myFunctionEmail() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputE");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function myFunctionName() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputName");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function myFunctionLoc() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputLoc");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function myFunctionType() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputType");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function myFunctionDept() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputDept");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[5];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>





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
                    <a href="<?php echo base_url(); ?>index.php/User/adminhome" class="nav-link ">
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
                    <a href="<?php echo base_url(); ?>index.php/User/users" class="nav-link active">
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