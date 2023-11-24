<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REKLAME</title>

   <!-- Custom fonts for this template-->
  
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>/assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>/assets2/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/datatables.net-bs4/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/daterangepicker/daterangepicker.css"  rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/style.min.css" rel="stylesheet"> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

<style>
            body {
                font-family:tahoma;
                font-size:12px;
            }

            #signup-step {
                margin:left;
                padding:0;
                width:53%
            }

            #signup-step li {
                list-style:none; 
                float:left;
                padding:5px 10px;
                border-top:#004C9C 1px solid;
                border-left:#004C9C 1px solid;
                border-right:#004C9C 1px solid;
                border-radius:5px 5px 0 0;
            }

            .active {
                color:#FFF;
            }

            #signup-step li.active {
                background-color:#004C9C;
            }

            #signup-form {
                clear:both;
                border:20px #d5dbe1 solid;
                padding:20px;
                width:75%;
                margin:left;
            }

            .demoInputBox {
                padding: 5px;
                border: #CDCDCD 1px solid;
                border-radius: 4px;
                background-color: #FFF;
                width: 30%;
            }

            .signup-error {
                color:#FF0000; 
                padding-left:15px;
            }

            .message {
                color: #00FF00;
                font-weight: bold;
                width: 100%;
                padding: 10;
            }

            .btnAction {
                padding: 5px 10px;
                background-color: #F00;
                border: 0;
                color: #FFF;
                cursor: pointer;
                margin-top:15px;
            }

            label {
                line-height:35px;
            }

        </style>

 <script>
    $(document).ready(function() {
        const inputField = document.querySelector('input[name="ID"]');
        const refreshButton = document.getElementById('refreshButton');

        // Function to refresh the input field from the server
        function refreshInputField() {
            // Make an AJAX request to fetch the updated value
            $.ajax({
                url: '<?php echo site_url("Ops_reklame/get_data_id"); ?>', // Replace with your server endpoint to fetch the updated value
                method: 'GET', // or 'POST' depending on your server logic
                success: function(response) {
                    // Update the value of the input field with the new value from the server
                    inputField.setAttribute('data-nota', response.newNota);
                    inputField.value = response.newNota;
                },
                error: function() {
                    // Handle errors if the server request fails
                    alert('Failed to update value.');
                }
            });
        }

        // Attach a click event listener to the refresh button
        refreshButton.addEventListener('click', function() {
            // Trigger the refresh when the button is clicked
            refreshInputField();
        });
    });

	

	$(document).ready(function() {
        const inputField = document.querySelector('input[name="NO_FORMULIR"]');
        const refreshButton2 = document.getElementById('refreshButton2');

        // Function to refresh the input field from the server
        function refreshInputField2() {
            // Make an AJAX request to fetch the updated value
            $.ajax({
                url: '<?php echo site_url("Ops_reklame/get_data_formulir"); ?>', // Replace with your server endpoint to fetch the updated value
                method: 'GET', // or 'POST' depending on your server logic
                success: function(response) {
                    // Update the value of the input field with the new value from the server
                    inputField.setAttribute('data-formulir', response.newFor);
                    inputField.value = response.newFor;
                },
                error: function() {
                    // Handle errors if the server request fails
                    alert('Failed to update value.');
                }
            });
        }

        // Attach a click event listener to the refresh button
        refreshButton2.addEventListener('click', function() {
            // Trigger the refresh when the button is clicked
            refreshInputField2();
        });
    });



</script> 



</head>

<body id="page-top">
	

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('Home')?>">>
                <div class="sidebar-brand-icon rotate-n-20">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Ultimate Reklame <sup>version 1.0.0</sup></div>
        
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('Home')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Penetapan & Silang</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">sub menu:</h6>
                        <?php if($this->session->userdata('access')=='Administrator'){ ?>
                           <a class="collapse-item" href="<?php echo site_url('Insidentil_tunggakan')?>">Data Insidentil Tunggakan</a>
                            <a class="collapse-item" href="<?php echo site_url('Skpdkb')?>">Data Skpdkb</a>
						    <a class="collapse-item" href="<?php echo site_url('Stpdkb')?>">Data Stpdkb</a>
							<a class="collapse-item" href="<?php echo site_url('Progres_silang')?>">Data Progres Silang</a>
							<a class="collapse-item" href="<?php echo site_url('Progres_bantip')?>">Data Bantip</a>
						
							
							<?php } if($this->session->userdata('access')=='User'){ ?>
								<a class="collapse-item" href="<?php echo site_url('Insidentil_tunggakan')?>">Data Insidentil Tunggakan</a>
								<a class="collapse-item" href="<?php echo site_url('Progres_bantip')?>">Data Bantip</a>
                        <?php }; ?>
                    </div>
                </div>
            </li>
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetiga"
                    aria-expanded="true" aria-controls="collapsetiga">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Peta Obyek</span>
                </a>
                <div id="collapsetiga" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">sub menu:</h6>
						<?php if($this->session->userdata('access')=='Administrator'){ ?>
							<a class="collapse-item" href="<?php echo site_url('Peta')?>">Peta Wajib Pajak</a>
							<?php } if($this->session->userdata('access')=='User'){ ?>
								<a class="collapse-item" href="<?php echo site_url('Peta')?>">Peta Wajib Pajak</a>
                        <?php }; ?>
                    </div>
                </div>
            </li>
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseempat"
                    aria-expanded="true" aria-controls="collapseempat">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pencatatan Di BKP</span>
                </a>
                <div id="collapseempat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">sub menu:</h6>
						<?php if($this->session->userdata('access')=='Administrator'){ ?>
							<a class="collapse-item" href="<?php echo site_url('Jambong_permanen')?>">SSPD Jambong</a>
							<a class="collapse-item" href="<?php echo site_url('Jambong_insidentil')?>">SSPD Jambong Insidentil</a>
							<a class="collapse-item" href="<?php echo site_url('Cetak_bkp')?>">Laporan STS BKP</a>
							<?php } if($this->session->userdata('access')=='User'){ ?>
								<a class="collapse-item" href="<?php echo site_url('Jambong_permanen')?>">SSPD Jambong</a>
								<a class="collapse-item" href="<?php echo site_url('Jambong_insidentil')?>">SSPD Jambong Insidentil</a>
								<a class="collapse-item" href="<?php echo site_url('Cetak_bkp')?>">Laporan STS BKP</a>
                        <?php }; ?>
                    </div>
                </div>
            </li>
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselima"
                    aria-expanded="true" aria-controls="collapselima">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pelayanan Simpatik</span>
                </a>
                <div id="collapselima" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-3 collapse-inner rounded">
                        <h2 class="collapse-header">KHUSUS ADMIN!!</h2>
						<?php if($this->session->userdata('access')=='Administrator'){ ?>
							<a class="collapse-item" href="<?php echo site_url('Ops_reklame')?>">OPS Reklame</a>
							<?php } if($this->session->userdata('access')=='User'){ ?>
								
                        <?php }; ?>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
           

            <!-- Divider -->
           

            <!-- Heading -->
           

            <!-- Nav Item - Pages Collapse Menu -->
           

            <!-- Nav Item - Charts -->
         

            <!-- Nav Item - Tables -->
          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <h5 class="title"><?php echo $this->session->userdata('name'); ?></h5></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pelayanan Simpatik</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

					<ul id="signup-step">
            <li id="data_pemohon" class="active">Data pemohon</li>
            <li id="data_obyek">Data obyek</li>
            <li id="final">final</li>
        </ul>

        <?php
        if (isset($success)) {
            echo '<div>Data berhasil di simpan!</div>';
        }

        $attributes = array('name' => 'frmRegistration',  'id' => 'signup-form');
        echo form_open('Ops_reklame/add_data', $attributes);
		//echo form_open('Ops_simpatik/add_data');
        ?>
          <div id="data_pemohon-field">
            <label>Nama Pemohon</label><span id="NAMA-error" class="signup-error"></span>
            <div><input type="text" name="NAMA" id="NAMA" class="demoInputBox"/>
			<input type="text" name="ID" id="ID" data-nota="<?php echo $nota;?>" class="demoInputBox col-1" readonly/>
			 <button type="button" class="btn btn-danger" id="refreshButton">generate id</button> 
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			<input type="text" id="itemId"  class="demoInputBox col-3" placeholder = "cari langsung dari NPWPD jika wp punya"/>
			<button type="button" id="fetchButton" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Cari data</button>
			<div></div>	
            <label>Alamat Pemohon</label><span id="ALAMAT-error" class="signup-error"></span>
            <div><input type="text" name="ALAMAT" id="ALAMAT" class="demoInputBox"/>
			<input type="text" name="NO_ALAMAT" id="NO_ALAMAT"  class="demoInputBox col-1" placeholder = "no"/>
			<input type="text" name="BLOK_ALAMAT" id="BLOK_ALAMAT"  class="demoInputBox col-1" placeholder = "blok"/>
            <div></div>			
			<label>No. telp pemohon</label><span class="signup-error"></span>
            <div><input type="number" name="NO_TELP" id="NO_TELP" class="demoInputBox"/>
			<input type="text" name="NPWPD" id="NPWPD"  class="demoInputBox col-5" placeholder = "NPWPD" readonly/>
			<input type="text" name="JABATAN" id="JABATAN"  class="demoInputBox col-3" placeholder = "jabatan"/>
			<div></div>	
			<label>Nama Perusahaan</label><span  class="signup-error"></span>
            <div><input type="text" id="NAMA_PERUSAHAAN" name="NAMA_PERUSAHAAN" class="demoInputBox"/>
			<div></div>	
            <label>Alamat Perusahaan</label><span  class="signup-error"></span>
            <div><input type="text" name="ALAMAT_PERUSAHAAN" id="ALAMAT_PERUSAHAAN"  class="demoInputBox"/>
			<input type="text" name="NO_ALAMAT_PERUSAHAAN" id="NO_ALAMAT_PERUSAHAAN"  class="demoInputBox col-1" placeholder = "no"/>
			<input type="text" name="BLOK_ALAMAT_PERUSAHAAN" id="BLOK_ALAMAT_PERUSAHAAN"  class="demoInputBox col-1" placeholder = "blok"/>
			<input type="text" name="TELP_PERUSAHAAN" id="TELP_PERUSAHAAN"  class="demoInputBox col-5" placeholder = "no. telp perusahaan"/>
            <div></div>	
			<label>Jenis WP</label><span id="jenis_wp-error" class="signup-error"></span>
			<div>
                <select id="jenis_wp"  class="demoInputBox">
				<option ></option>
                    <option value="BIRO">Biro</option>
                    <option value="PEMILIK">Pemilik</option>                                                                         
                </select>
				
            </div>
			</div>	
			</div>
			</div>
			</div>
        </div>
		</div>
		
        <div id="data_obyek-field" style="display:none;">
		<button type ="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">Cari Obyek reklame</button>
		<div></div>
            <label>Alamat lokasi reklame</label><span id="lokasi_reklame-error" class="signup-error"></span>
            <div><input type="text" name="LOKASI_REKLAME" id="LOKASI_REKLAME" class="demoInputBox" />
			 <input type="text" name="NO_FORMULIR" id="NO_FORMULIR" data-formulir="<?php echo $no_formulir;?>"  class="demoInputBox col-1" readonly/>
			 <button type="button" class="btn btn-danger" id="refreshButton2">generate no formulir</button> 
			<div></div>
			<div></div>
            <label>Detail lokasi</label><span id="detail_lokasi-error" class="signup-error"></span>
            <div><input type="text" name="DETAIL_LOKASI" id="DETAIL_LOKASI" class="demoInputBox" /><div>
			<div><input type="text" class=" demoInputBox col-2" name="TGL_PERMOHONAN" id="TGL_PERMOHONAN">
		
		</div>
		</div>
		</div>
		</div>
		</div>
	
		

        <div id="final-field" style="display:none;">
            <label>Phone</label><span id="phone-error" class="signup-error"></span>
            <div><input type="text" name="phone" id="phone" class="demoInputBox" /></div>
            <label>Email</label><span id="email-error" class="signup-error"></span>
            <div><input type="text" name="email" id="email" class="demoInputBox" /></div>
            <label>Address</label><span id="address-error" class="signup-error"></span>
            <div><textarea name="address" id="address" class="demoInputBox" rows="5" cols="50"></textarea></div>
			
        </div>
		

        <div>
            <input class="btnAction" type="button" name="back" id="back" value="Back" style="display:none;">
            <input class="btnAction" type="button" name="next" id="next" value="Next" >
            <!-- <input class="btnAction" type="submit" name="finish" id="finish" value="Finish" style="display:none;"> -->
			<input class="btn btn-danger" value="Cetak SKPD" name="finish" id="finish" style="display:none;" type="button" onclick="showConfirmation()">
			
        </div>
        <?php echo form_close(); ?>


                        <!-- Earnings (Monthly) Card Example -->
                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                   
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo site_url('login/logout');?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
	</div>
	</div>

    <!-- Bootstrap core JavaScript-->



    <!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url(); ?>/assets2/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url(); ?>/assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>/assets2/js/sb-admin-2.min.js"></script>

	<script src="<?php echo base_url(); ?>/assets/date.js"></script> 
	<script src="<?php echo base_url(); ?>/assets/getsurvey.js"></script> 

<script src="<?php echo base_url(); ?>/assets/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>/assets/daterangepicker/daterangepicker.js"></script>

    <script>var baseurl = "<?php echo site_url(); ?>";</script>

	<script>
            function validate() {
                var output = true;
                $(".signup-error").html('');

				if ($("#data_pemohon-field").css('display') != 'none') {
                    if (!($("#NAMA").val())) {
                        output = false;
                        $("#NAMA-error").html("Name required!");
                    }

                    if (!($("#ALAMAT").val())) {
                        output = false;
                        $("#ALAMAT-error").html("Alamat harus diisi!");
                    }

					if (!($("#jenis_wp").val())) {
                        output = false;
                        $("#jenis_wp-error").html("Jenis wp harus diisi!");
                    }
				
                }

                if ($("#data_obyek-field").css('display') != 'none') {
					if (!($("#LOKASI_REKLAME").val())) {
                        output = false;
                        $("#lokasi_reklame-error").html("LOKASI wp harus diisi!");
                    }

					if (!($("#DETAIL_LOKASI").val())) {
                        output = false;
                        $("#detail_lokasi-error").html("DETAIL wp harus diisi!");
                    }
                }

                if ($("#final-field").css('display') != 'none') {
                    if (!($("#phone").val())) {
                        output = false;
                        $("#phone-error").html("Phone required!");
                    }

                    if (!($("#email").val())) {
                        output = false;
                        $("#email-error").html("Email required!");
                    }

                    if (!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                        $("#email-error").html("Invalid Email!");
                        output = false;
                    }

                    if (!($("#address").val())) {
                        output = false;
                        $("#address-error").html("Address required!");
                    }
                }

                return output;
            }

			function showConfirmation() {
            Swal.fire({
                title: 'Validasi Data',
                text: 'Yakin data di simpan dan dicetak?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
					document.forms['frmRegistration'].submit();
                  
                }
            });
        }


			
		$(document).ready(function () {
    $("#fetchButton").click(function () {
        var NPWPD = $("#itemId").val(); // Get ID from input field

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Ops_reklame/get_data_ops/')?>/" + NPWPD, // Replace with your controller's URL
            data: { NPWPD: NPWPD },
            dataType: "json",
            success: function (response) {
                // Update input fields with fetched data
                $("#NAMA").val(response.NAMA);
                $("#ALAMAT").val(response.ALAMAT);
                $("#NO_ALAMAT").val(response.NO_ALAMAT);
                $("#BLOK_ALAMAT").val(response.BLOK_ALAMAT);
                $("#NO_TELP").val(response.NO_TELP);
                $("#NPWPD").val(response.NPWPD);
                $("#JABATAN").val(response.JABATAN);
                $("#NAMA_PERUSAHAAN").val(response.NAMA_PERUSAHAAN);
                $("#ALAMAT_PERUSAHAAN").val(response.ALAMAT_PERUSAHAAN);
                $("#NO_ALAMAT_PERUSAHAAN").val(response.NO_ALAMAT_PERUSAHAAN);
                $("#BLOK_ALAMAT_PERUSAHAAN").val(response.BLOK_ALAMAT_PERUSAHAAN);
                $("#TELP_PERUSAHAAN").val(response.TELP_PERUSAHAAN);

        
				  // Set TGL_PERMOHONAN with the value from the response for the start date
            // and set the end date as the same day next year
            var startDate = moment(response.TGL_PERMOHONAN, 'DD MMM YYYY');
            var endDate = moment(startDate).add(1, 'year').subtract(1, 'day');
            $('#TGL_PERMOHONAN').val(startDate.format('DD MMM YYYY') + ' s/d ' + endDate.format('DD MMM YYYY'));
        },
                   
              
            
            error: function () {
                alert("Data tidak ditemukan periksa kembali!!");
            }
        });
    });

	

                $("#next").click(function () {
                    var output = validate();
                    if (output === true) {
                        var current = $(".active");
                        var next = $(".active").next("li");
                        if (next.length > 0) {
                            $("#" + current.attr("id") + "-field").hide();
                            $("#" + next.attr("id") + "-field").show();
                            $("#back").show();
							$("#finish").hide();
                            $(".active").removeClass("active");
                            next.addClass("active");
                            if ($(".active").attr("id") == $("li").last().attr("id")) {
                                $("#next").hide();
                                $("#finish").show();
                            }
                        }
                    }
                });


			

                $("#back").click(function () {
                    var current = $(".active");
                    var prev = $(".active").prev("li");
                    if (prev.length > 0) {
                        $("#" + current.attr("id") + "-field").hide();
                        $("#" + prev.attr("id") + "-field").show();
						$("#next").show();
                        $("#finish").hide();
                        $(".active").removeClass("active");
                        prev.addClass("active");
                        if ($(".active").attr("id") == $("li").first().attr("id")) {
                            $("#back").hide();
                        }
                    }
                });

                $("input#finish").click(function (e) {
                    var output = validate();
                    var current = $(".active");

                    if (output === true) {
                        return true;
                    } else {
                        //prevent refresh
                        e.preventDefault();
                        $("#" + current.attr("id") + "-field").show();
                        $("#back").show();
                        $("#finish").show();
                    }
                });
            });     
        </script>

<script>
    var dataTable;

    $(document).ready(function() {
        // Hide the table initially
        $('#table-obyek-survey').hide();

        // Initialize the DataTable
        dataTable = $('#table-obyek-survey').DataTable({
            "ajax": {
                "url": "<?php echo base_url('Ops_reklame/getdatasurvey') ?>",
                "type": "POST",
                "dataSrc": ""
            },
            "columns": [
                { "data": "FOTO" },
                { "data": "PROGRES" },
                { "data": "LATITUDE" },
                { "data": "LONGITUDE" },
                { "data": "TEKS_REKLAME" },
                { "data": "NO_FORM" },
                { "data": "PHOTO" },
                { "data": "NOR" },
                { "data": "SURVEY_KE" }
            ]
        });

        $('#search_button').on('click', function() {
            var norValue = $('#NOR').val();
            if (norValue.trim() !== '') {
                dataTable.ajax.url("<?php echo base_url('Ops_reklame/getdatasurvey') ?>").load({
                    nor: norValue
                });

                // Show the table
                $('#table-obyek-survey').show();
            } else {
                // Hide the table when no valid NOR is provided
                $('#table-obyek-survey').hide();
            }
        });
    });
</script>



</body>

</html>


