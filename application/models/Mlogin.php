<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model{

  public  function query_validasi_username($username){
    	$result = $this->db->query("SELECT * FROM LOG_KETETAPAN_REAL WHERE USERNAME='$username'");
        return $result;
    }

   public function query_validasi_password($username,$password){
    	$result = $this->db->query("SELECT * FROM LOG_KETETAPAN_REAL WHERE USERNAME='$username' AND USER_PASSWORD='$password'");
        return $result;
    }

} 
