<!-- printable_output_view.php -->

<!DOCTYPE html>
<html>
<head>
    <title>SKPD</title>
    <!-- Add CSS for styling the printable output -->
</head>
<style>
        /* Define a CSS style for hiding the button when printing */
        @media print {
            button.print-button {
                display: none;
            }
        }
    </style>
<body>
<img class="header-logo"  align="center" src="http://10.21.34.224/Reklame_office/assets/Kota Surabaya.png"
    >
  <h3 align="center">BADAN PENDAPATAN DAERAH</h1>
    <h3 align="center">KOTA SURABAYA</h1>
<p>&nbsp;</p>

<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; No :</p>

<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Formulir :<?php echo $NO_FORMULIR; ?></p>

<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Form. Lama :</p>

<hr />
<p>Nama Pemohon&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:<?php echo $NAMA; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;No. Telp. Pemohon :<?php echo $NO_TELP; ?></p>

<p>Alamat Pemohon&nbsp; &nbsp; &nbsp; &nbsp;:<?php echo $ALAMAT; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;No :<?php echo $NO_ALAMAT; ?>&nbsp; &nbsp; &nbsp; &nbsp; Blok :<?php echo $BLOK_ALAMAT; ?></p>

<p>Nama Perusahan&nbsp; &nbsp; &nbsp; &nbsp;:<?php echo $NAMA_PERUSAHAAN; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;No :<?php echo $NO_ALAMAT_PERUSAHAAN; ?>&nbsp; &nbsp; &nbsp; &nbsp; Blok :<?php echo $BLOK_ALAMAT_PERUSAHAAN; ?></p>

<p>Alamat Perusahaan&nbsp; &nbsp;:<?php echo $ALAMAT_PERUSAHAAN; ?>&nbsp;</p>

<p>Jabatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :<?php echo $JABATAN; ?></p>

<p>NPWPD&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :<?php echo $NPWPD; ?></p>

<hr />
<hr />
<p>Alamat/Lokasi reklame&nbsp; &nbsp;:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:<?php echo $LOKASI_REKLAME; ?></p>

<p>Detail Lokasi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:<?php echo $DETAIL_LOKASI; ?></p>



<p>Waktu penyelenggaraan :<?php echo date('d M Y', strtotime($TGL_AWAL_BERLAKU)); ?> s/d <?php echo date('d M Y', strtotime($TGL_AKHIR_BERLAKU)); ?></p>



<p>Diteliti Oleh :&nbsp; &nbsp; &nbsp; &nbsp; 
<p><u><strong>Ir. Hidayat syah, MT.</strong></u></p>

<p><strong></strong>Pembina Utama Muda</p>

<p>NIP 196707251993031009</p>

<p>&nbsp;</p>


    
   
    <button class="print-button" onclick="window.print()">Print</button>
	<button class="print-button" onclick="goBack()">Kembali</button>
</body>
</html>

<script>
    function goBack() {
        window.history.back(); 
    }
</script>
