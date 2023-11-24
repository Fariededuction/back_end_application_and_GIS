<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>assets/style.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/datatables.net-bs4/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/daterangepicker/daterangepicker.css"  rel="stylesheet">
	<title>Welcome to CodeIgniter</title>

</head>
<body>

<div id="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="col-md-12 col-md-6 col-lg-6">
                <form class="mt-3" method="post" id="form">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-default" type="button">Pilih Tanggal</button>
                        </div>
                        <input type="text" class="form-control shawCalRanges" name="rangetgl" id="rangetgl">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button" id="btn-filter">Set</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <!-- Column -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                    <!-- <a class=""><i class="ti-plus"></i></a> -->
                    <!-- <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a> -->
                </div>
                <h4 class="card-title mb-0"> DATA INSIDENTIL TIDAK BAYAR</h4>
            </div>
            <div class="card-body ">
                <div class="table-responsive no-wrap">
                    <table class="table table-bordered table-striped nowrap display" width="80%" cellspacing="0" id="table-siswa-tabungan">
                        <thead>
                            <tr>
                                <th class="border-0 text-center">NO SKPD</th>
                                <th class="border-0 text-center">NO FORMULIR</th>
                                <th class="border-0 text-center">TGL PERMOHONAN</th>
                                <th class="border-0 text-center">NAMA</th>
                                <th class="border-0 text-center">TGLSKPD</th>
                                <th class="border-0 text-center">TGL BAYAR</th>
                                <th class="border-0 text-center">PAJAK</th>
                                <th class="border-0 text-center">JAMBONG</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                        <tfoot>
                            <tr class="bg-dark text-white">
                                <th style="text-align:center" colspan="6">Jumlah</th>
                                <th style="text-align:right"></th>
                                <th style="text-align:right"></th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->

    

</div>


    <!-- Column -->

    

</div>
</div>

</body>
</html>

<script src="<?php echo base_url(); ?>assets/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/moment/moment.js"></script>

<script src="<?php echo base_url(); ?>assets/daterangepicker/daterangepicker.js"></script>
<script>
    /*******************************************/
    // Always Show Calendar on Ranges
    /*******************************************/
    $('.shawCalRanges').daterangepicker({
        // autoApply: true,

        locale: {
         //   format: to_char(TGLSKPD,'DD/MM/YYYY'),
            format: '%d-%b-%y',
            separator: " s.d "

        },
        startDate: moment().subtract(7, 'day'),

        ranges: {
            'Hari ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 hari yang lalu': [moment().subtract(6, 'days'), moment()],
            '30 hari yang lalu': [moment().subtract(29, 'days'), moment()],
            'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        alwaysShowCalendars: true,
    });
</script>



<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table-siswa-tabungan').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],


            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('datatables/ajax_siswa_tabungan') ?>",
                "type": "POST",
               "data": function(data) {
                    data.tgl_awal = $('#rangetgl').val();
                    data.tgl_akhir = $('#rangetgl').val();
                }
            },

            

            //Set column definition initialisation properties.
            "columnDefs": [{
				"targets": [6,7],
                "className": "text-right",
                "targets": [6,7],
                "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp'),
            }, 
        ],

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                var numFormat = $.fn.dataTable.render.number(',', '.', 0, 'Rp').display;


                // Total over this page
                pageTotal2 = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(6).footer()).html(
					numFormat(pageTotal2)
                );

                pageTotal7 = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(7).footer()).html(
					numFormat(pageTotal7)
                );

               


              
            }

        });


        $('#btn-filter').click(function() { //button filter event click
            table.ajax.reload(); //just reload table
        });



    });


    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }




	
</script>