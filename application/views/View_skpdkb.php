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
    <link href="<?php echo base_url('assets3/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>/assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>/assets2/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/datatables.net-bs4/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/daterangepicker/daterangepicker.css"  rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/style.min.css" rel="stylesheet"> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet"> 

</head>

<body id="page-top">

<style>
    
    .dataTables_wrapper .dt-buttons {
        float:right;  
        text-align:center;
        font-size:12px;
    }
  
    .dataTables_info{
        font-size:12px;
    }
</style>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('Home')?>">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
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
                       
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->

                    <div id="container">

<div class="row">
    <!-- Column -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                    <!-- <a class=""><i class="ti-plus"></i></a> -->
                    <!-- <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a> -->
                </div>
                <h4 class="card-title mb-0"> DATA SKPDKB</h4>
            </div>
            <div class="card-body ">
                <div class="table-responsive no-wrap">
                    <table class="table table-bordered table-striped nowrap display" width="80%" cellspacing="0" id="table-skpdkb">
                        <thead>
                            <tr>                           
                                <th class="border-0 text-center">NO FORMULIR</th>
                                <th class="border-0 text-center">KODE OBYEK</th>
                                <th class="border-0 text-center">TGL PENETAPAN</th>
                                <th class="border-0 text-center">NILAI PAJAK</th>
                                <th class="border-0 text-center">NILAI DENDA</th>
                                <th class="border-0 text-center">DENDA PERSEN</th>
                                <th class="border-0 text-center">CATATAN</th>
                                <th class="border-0 text-center">OPR CETAK</th>
                                <th class="border-0 text-center">TGL EDIT</th>                             
                                <th class="border-0 text-center">action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                       

                        <!-- Earnings (Monthly) Card Example -->
                       
                        <!-- Earnings (Monthly) Card Example -->
                      

                        <!-- Pending Requests Card Example -->
                       
                                        </div>
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

    <?php


?>

    <!-- Bootstrap core JavaScript-->

	<script src="<?php echo base_url('assets3/jquery/jquery-2.1.4.min.js')?>"></script>
<!-- <script src="<?php echo base_url('assets3/bootstrap/js/bootstrap.min.js')?>"></script> -->
<script src="<?php echo base_url('assets3/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets3/datatables/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets3/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


    <!-- Bootstrap core JavaScript-->

    <script src="<?php echo base_url(); ?>/assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>/assets2/js/sb-admin-2.min.js"></script>

    
<script src="<?php echo base_url(); ?>/assets/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>/assets/daterangepicker/daterangepicker.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>  
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
    <script>var baseurl = "<?php echo site_url(); ?>";</script>
   


<script>
    /*******************************************/
    // Always Show Calendar on Ranges
    /*******************************************/
   
</script>



<script type="text/javascript">
    var save_method; //for save method string
    var sql;
    $(document).ready(function() {

        //datatables
		sql  = $('#table-skpdkb').DataTable({

            dom: 'Blfrtip',
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
           

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": baseurl+"Skpdkb/skpdkb",
                "type": "POST",
             
            },
        
            "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
        

        });

        


        $('#btn-filter').click(function() { //button filter event click
            sql.ajax.reload(); //just reload table
        });


    });

    function edit_person(NO_SKPDKB)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Skpdkb/edit/')?>/" + NO_SKPDKB,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="NO_SKPDKB"]').val(data.NO_SKPDKB);
            $('[name="NO_FORMULIR"]').val(data.NO_FORMULIR);
       //     $('[name="KODE_OBYEK"]').val(data.KODE_OBYEK);
       //     $('[name="TGL_PENETAPAN"]').val(data.TGL_PENETAPAN);
            $('[name="NILAI_DENDA_PAJAK"]').val(data.NILAI_DENDA_PAJAK);
            $('[name="DENDA_PERSEN"]').val(data.DENDA_PERSEN);
            $('[name="CATATAN"]').val(data.CATATAN);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Skpd'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    sql.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('person/ajax_add')?>";
    } else {
        url = "<?php echo site_url('Skpdkb/update')?>";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
 
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}	
</script>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Skpd Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="NO_SKPDKB"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">NO FORMULIR</label>
                            <div class="col-md-9">
                                <input name="NO_FORMULIR" placeholder="NO FORMULIR" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="control-label col-md-3">NILAI DENDA PAJAK</label>
                            <div class="col-md-9">
                                <input name="NILAI_DENDA_PAJAK" placeholder="NILAI DENDA PAJAK" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">DENDA PERSEN</label>
                            <div class="col-md-9">
                                <input name="DENDA_PERSEN" placeholder="DENDA PERSEN" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3">CATATAN</label>
                            <div class="col-md-9">
                                <input name="CATATAN" placeholder="CATATAN" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->



   
  
</body>

</html>
