<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
 public function __construct(){
        parent::__construct();
		$this->load->model('Mlogin','Mlogin');
    }
    
public function index(){
        if($this->session->userdata('logged') !=TRUE){
            $this->load->view('view-login');
        }else{
            $url=base_url('home');
            redirect($url);
        };
    }
    
   public function autentikasi(){
        $username = $this->input->post('user');
        $password = md5($this->input->post('pass'));
                
        $validasi_username = $this->Mlogin->query_validasi_username($username);
        if($validasi_username->num_rows() > 0){
            $validate_ps=$this->Mlogin->query_validasi_password($username,$password);
            if($validate_ps->num_rows() > 0){
                $x = $validate_ps->row_array();
                if($x['STATUS_PENGOLAHAN']=='1'){
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('user',$username);
                    $id=$x['ID'];
                    if($x['ROLE_ID']=='1'){ //Administrator
                        $name = $x['USERNAME'];
                        $this->session->set_userdata('access','Administrator');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        redirect('home');

                    }else if($x['ROLE_ID']=='2'){ //Pengolah biasa
                        $name = $x['USERNAME'];
                        $this->session->set_userdata('access','User');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        redirect('home');

                    }
                }else{
                    $url=base_url('login');
                    echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p>');
                    redirect($url);
                }
            }else{
                $url=base_url('login');
                echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect($url);
            }

        }else{
            $url=base_url('login');
            echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Uupps!</h3>
            <p>Username yang kamu masukan salah.</p>');
            redirect($url);
        }

    }

   public function logout(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }

}
