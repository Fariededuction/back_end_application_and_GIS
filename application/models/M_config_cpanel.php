<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_config_cpanel extends CI_Model {

	var $skey   = "upn"; 
	
	function replace_kutip($nama)
	{
		$search = array("'",
                     "'",
                     '"',
                     '"');
		$nama2 = str_replace($search," ",$nama);
		return $nama2;
	}
	

	function aktif_sistem()
	{

		/*
		$query = $this->db->query("select encode(decrypt(value,'".$this->getHash()."','".$this->getTipeEnkrip()."')::bytea,'escape') as nilai from tb_config where decrypt(item,'".$this->getHash()."','".$this->getTipeEnkrip()."')='aktif_sistem'");
		*/
		$query = $this->db->query("select t_val from tb_config where t_item='aktif_sistem'");
		$hasil = $query->row();
		$status_sistem = $hasil->T_VAL;
		if($status_sistem == "1")
		{
			//redirect('google.com');
			return true;
		}
		else
		{
			return FALSE;
			//redirect('Login');
			//$kd_pegawai_temp = $this->session->userdata('kd_pegawai_temp');
			/*$b = array();
			$level_pegawai = $this->session->userdata('kd_level');
			if(is_array($level_pegawai))
			{
				if (in_array('1',$level_pegawai))
				{
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}*/
			

		}

	}

	function rupiah($angka)
		{
			if($angka==null)
			{
				return "Kosong";
			}
			else
			{
				$jumlah_desimal="0";
				$pemisah_desimal=",";
				$pemisah_ribuan=".";
				return  $rupiah="Rp. ".number_format($angka,$jumlah_desimal,$pemisah_desimal,$pemisah_ribuan).",-";
			}
		}
	
	function get_datetime()
	{
		$sql="SELECT trunc(sysdate) as tanggal from dual";
		$query = $this->db->query($sql);
		$hasil = $query->row();
		return $hasil->TANGGAL;
	}

	function get_date_time()
	{
		$sql="SELECT sysdate as tanggal from dual";
		$query = $this->db->query($sql);
		$hasil = $query->row();
		return $hasil->TANGGAL;
	}

	
	function get_timestamp()
	{
		$sql="SELECT sysdate as tanggal from dual";
		$query = $this->db->query($sql);
		$hasil = $query->row();
		return $hasil->TANGGAL;
	}

	function getHash()
	{
		$hash=$this->config->item('encrypt_key');
		
		return $hash; 
	}
	
	function getTipeEnkrip()
	{
		$hash=$this->config->item('tipeenkrip');
		return $hash; 
	}
	
	
	function getDecr($value)
	{
		$hash=$this->getHash();
		$this->db->select("dbo.getDecr($value,'$hash') as hasil");
		$dt=$this->db->get();
		$rs=$dt->row();
		$result=$rs->hasil;
		return $result;
		
	}
	
	function get_breadcrumb($kdmenu)
	{		
		$this->load->model('login/m_login','login');
		$hasil ='';
		$hasil = $this->login->get_breadcrumb($kdmenu);
		return $hasil;
	}
	
	function generateFormToken($sess) {    
       // generate a token from an unique value
    	$token = md5(uniqid(microtime(), true));  
    	   	
    	$this->session->set_userdata($sess,$token);
    	return $token;

	}
	
	function verifyFormToken($nama_sess,$t_post) {
    
    // check if a session is started and a token is transmitted, if not return an error
		if(empty($this->session->userdata($nama_sess))) { 
			return false;
	    }
		
		// check if the form is sent with token in it
		if(empty($t_post)) {
			return false;
	    }
		
		// compare the tokens against each other if they are still the same
		
		if ($this->session->userdata($nama_sess) !== $t_post) {
			return false;
	    }
	
		return true;
}
	
	
	function hitung_usia($tgl)
    {
            $biday = new DateTime($tgl);
            $today = new DateTime();
            $diff = $today->diff($biday);
            return $diff->y;
    }
   	
   	function select_all_jenis_img($nama,$jenis)
	{
		$qry="select id_jenis_img as id,jenis_img as text from tb_category_jenis_img where jenis_img like '".$nama."%' and kategori_img='".$jenis."'";
		$query = $this->db->query($qry);
		return $query->result();
	}
	
	function select_kategori_img($nama,$kdpeg)
	{
		$qry="select distinct kategori_img as id,kategori_img as text from vw_category_dokumen where jenis_img like '".$nama."%' 
		and kd_pegawai in ('-','".$kdpeg."')";
		$query = $this->db->query($qry);
		return $query->result();
	}
	
	function select_kategori_img_detail($nama,$kdpeg,$kategori)
	{
		$qry="select id_jenis_img as id,jenis_img as text from vw_category_dokumen where jenis_img like '".$nama."%' 
		and kd_pegawai in ('-','".$kdpeg."') and kategori_img='".$kategori."'";
		$query = $this->db->query($qry);
		return $query->result();
	}
	
	function select_detail_img($nama,$kdpeg,$kategori)
	{
		$qry="select id_jenis_img as id,jenis_img || ' - ' || keterangan as text from vw_category_dokumen_detail where jenis_img like '".$nama."%' 
		and kd_pegawai in ('-','".$kdpeg."') and kategori_img='".$kategori."'";
		$query = $this->db->query($qry);
		return $query->result();
	}
	
    
    function get_umur($tgl_lahir,$delimiter='-') {
    
    list($tahun,$bulan,$hari) = explode($delimiter, $tgl_lahir);
    
    $selisih_hari = date('d') - $hari;
    $selisih_bulan = date('m') - $bulan;
    $selisih_tahun = date('Y') - $tahun;
    
    if ($selisih_hari < 0 || $selisih_bulan < 0) {
        $selisih_tahun--;
    }
    
    return $selisih_tahun;
	}
    
    function get_usia($tgl_lahir,$jenis){
	    $tgl=explode("-",$tgl_lahir);
	    $cek_jmlhr1=cal_days_in_month(CAL_GREGORIAN,$tgl['1'],$tgl['0']);
	    $cek_jmlhr2=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
	    $sshari=$cek_jmlhr1-$tgl['2'];
	    $ssbln=12-$tgl['1']-1;
	    $hari=0;
	    $bulan=0;
	    $tahun=0;
	//hari+bulan
	    if($sshari+date('d')>=$cek_jmlhr2){
	        $bulan=1;
	        $hari=$sshari+date('d')-$cek_jmlhr2;
	    }else{
	        $hari=$sshari+date('d');
	    }
	    if($ssbln+date('m')+$bulan>=12){
	        $bulan=($ssbln+date('m')+$bulan)-12;
	        $tahun=date('Y')-$tgl['0'];
	    }else{
	        $bulan=($ssbln+date('m')+$bulan);
	        $tahun=(date('Y')-$tgl['0'])-1;
	    }
		if ($jenis=='m')
		{
			$selisih=$bulan;	
		}
		else
		{
			$selisih=$tahun;
		}
	      
    return $selisih;
}

function get_masa_kerja($tgl_mulai,$jenis,$tmt_pangkat){
	    $tgl=explode("-",$tgl_mulai);
	    $tgl1=explode("-",$tmt_pangkat);
	    $cek_jmlhr1=cal_days_in_month(CAL_GREGORIAN,$tgl['1'],$tgl['0']);
	    $cek_jmlhr2=cal_days_in_month(CAL_GREGORIAN,$tgl1['1'],$tgl1['0']);
	    $sshari=$cek_jmlhr1-$tgl['2'];
	    $ssbln=12-$tgl['1']-1;
	    $hari=0;
	    $bulan=0;
	    $tahun=0;
	//hari+bulan
	    if($sshari+$tgl1['2']>=$cek_jmlhr2){
	        $bulan=1;
	        $hari=$sshari+$tgl1['2']-$cek_jmlhr2;
	    }else{
	        $hari=$sshari+$tgl1['2'];
	    }
	    if($ssbln+$tgl1['1']+$bulan>=12){
	        $bulan=($ssbln+$tgl1['1']+$bulan)-12;
	        $tahun=$tgl1['0']-$tgl['0'];
	    }else{
	        $bulan=($ssbln+$tgl1['1']+$bulan);
	        $tahun=($tgl1['0']-$tgl['0'])-1;
	    }
		if ($jenis=='m')
		{
			$selisih=$bulan;	
		}
		else
		{
			$selisih=$tahun;
		}
	      
    return $selisih;
}


   function encode_url($string)
   {
		$encrypted_id = $this->encrypt->encode($string);
        $encrypted_id = strtr($encrypted_id, '+/=', '-_.');
   		return $encrypted_id;
   	}


   	function decode_url($string)
   {
		$string = strtr($string, '-_.', '+/=');
        $string = $this->encrypt->decode($string);
   		return $string;
   	}

	function get_pensiun($usia,$tgl_lahir)
   	{
   		$data = array();   		

   		//$hasil = $query->row();
   		$val = $this->session->userdata("pensiun_tendik");   		
   		
   		$selisih=$val-$usia;
   		$selisih1=$usia-$val;
   		if(($usia>=$val) && ($selisih<0))
   		{
			$data['status'] = "pensiun";
		}
		elseif(($val>=$usia) && ($selisih==1))
		{
			$bln=$this->get_usia($tgl_lahir,"m");
			
			$data['status'] = $bln." bulan lagi persiapan_pensiun";
			
		}
		else
		{
			$data['status'] = "-";
		}
		 return $data;
   		
   	}

   	function notif_pensiun($tgl_lahir)
   	{
   		$data = array();
   		$data['tgl_lahir'] = $tgl_lahir;
   		$hash=$this->getHash();
   		$tipeenkrip = $this->getTipeEnkrip();
   		$query = $this->db->query("select  item, value from tb_config where item='pensiun'");

   		$hasil = $query->row();
   		$val = $hasil->value;
   		
   		
   		
   		

   		$query_tambah_tanggal = $this->db->query("SELECT $val + to_date('$tgl_lahir','YYYY-MM-DD') as tgl_pensiun");
   		$hasil = $query_tambah_tanggal->row();
   		$tgl_pensiun = $hasil->tgl_pensiun;
   		$data['tgl_pensiun'] = $tgl_pensiun;

   		/*
   		$tambah_pensiun = "+".$val." year";
   		//tambah tanggal_pensiun
   		$newdate2 = strtotime ( $tambah_pensiun , strtotime ( $tgl_lahir ) ) ;//menambahkan 3 minggu
		$tgl_pensiun = date ( 'Y-m-j' , $newdate2 ); //untuk menyimpan ke dalam variabel baru
		//$data['tgl_pensiun'] = $tgl_pensiun;
		*/

		$query_today = $this->db->query("SELECT current_date as tgl");
		$hasil_query_today = $query_today->row();
		$today = $hasil_query_today->tgl;

		 $data['tgl_pensiun'] = $tgl_pensiun;
		 $tgl_pensiun = new DateTime($tgl_pensiun);
  		 $tgl_hari_ini = new DateTime($today);

  		 if($tgl_pensiun > $tgl_hari_ini)
  		 {
  		 	 
  		 	 $selisih = $tgl_pensiun->diff($tgl_hari_ini);
	  		 $selisih_hari = $selisih->days;
	  		 

	  		 $query_notif_pensiun = $this->db->query("select item,value from tb_config where item = 'notif_pensiun'");
	  		 $hasil_query_notif_pensiun = $query_notif_pensiun->row();
	  	     $notif_pensiun = $hasil_query_notif_pensiun->value;


	  	     if($notif_pensiun > $selisih_hari)
	  	     {
	  	     	$data['status'] = "persiapan_pensiun";
	  	     	$data['selisih_hari'] = $selisih_hari;
	  	     }
	  	     else
	  	     {
	  	     	$data['status'] = "belum_masuk_persiapan_pensiun";
	  	     }



  		 }
  		 else
  		 {
  		 	$data['status'] = "masa_pensiun";
  		 }



  	     


  	     /*
  	     if($notif_pensiun > $selisih_hari)
  	     {
  	     	$selisih = $notif_pensiun - $selisih_hari;
  	     	$data['status'] = true;
  	     	$data['selisih'] = $selisih;
  	     }
  	     else
  	     {
  	     	$data['status'] = false;
  	     }
  	     */

  	     //$data['tgl_lahir'] = $tgl_lahir;

  	     return $data;


	   }


	   
	   




}
