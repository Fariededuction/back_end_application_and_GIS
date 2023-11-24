<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
class numbertowordconvertsconver {
    function convert_number($angka) {
		$angka = abs($angka);
		$baca  = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas');
		$convert_number = '';
	
		if ($angka < 12) { // 0 - 11
			$convert_number = ' ' . $baca[$angka];
		} elseif ($angka < 20) { // 12 - 19
			$convert_number = $this->convert_number($angka -10) . ' belas';
		} elseif ($angka < 100) { // 20 - 99
			$convert_number = $this->convert_number($angka / 10) . ' puluh' . $this->convert_number($angka % 10);
		} elseif ($angka < 200) { // 100 - 199
			$convert_number = ' seratus' . $this->convert_number($angka -100);
		} elseif ($angka < 1000) { // 200 - 999
			$convert_number = $this->convert_number($angka / 100) . ' ratus' . $this->convert_number($angka % 100);
		} elseif ($angka < 2000) { // 1.000 - 1.999
			$convert_number = ' seribu' . $this->convert_number($angka -1000);
		} elseif ($angka < 1000000) { // 2.000 - 999.999
			$convert_number = $this->convert_number($angka / 1000) . ' ribu' . $this->convert_number($angka % 1000);
		} elseif ($angka < 1000000000) { // 1000000 - 999.999.990
			$convert_number = $this->convert_number($angka / 1000000) . ' juta' . $this->convert_number($angka % 1000000);
		}
	
		return $convert_number;
	}
}
?>
