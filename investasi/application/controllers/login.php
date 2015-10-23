<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	function __construct() {
		parent::__construct();
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("If-Modified-Since: Mon, 22 Jan 2008 00:00:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Cache-Control: private");
		header("Pragma: no-cache");
		$this->load->model('madminpanel');
		
	}

	function index(){
		$this->load->view('adminpanel/loginadm');
	}
	
	function index2($type){
		if($type == 'administrator'){
			$this->load->view('adminpanel/loginadm');
		}else{
			
		}
	}
	
	function dologiners(){
		$this->load->library('encrypt');	
		$username = $this->input->post('username',TRUE,TRUE);
		$password = $this->input->post('password',TRUE,TRUE);
		
		//echo 'bangsat';
		//echo $this->encrypt->encode($password);exit;

		$data = $this->madminpanel->getdata('admin_login', $username);
		
		if($data)
		{
			// && $password == $this->encrypt->decode($data[0]['password'])){
            //$this->session->set_userdata('ses_data', $data[0]);	
			$this->session->set_userdata('portal_investasi', base64_encode(serialize($data)));
			//redirect($baseUrl.'');
			$this->session->set_flashdata('pesan', 'username atau password benar');
			header("Location: " .base_url().'adminpanel');
		} 
		else
		{
			$this->session->set_flashdata('pesan', 'username atau password salah');
			header("Location: " .base_url().'controlpanel');
			//redirect($baseUrl.'login/login');
		}

	}
	
	function dologouters() {
		$this->session->sess_destroy();
		redirect(base_url().'controlpanel');
	}		
	
	function show_404(){
		$this->output->set_status_header('404');
		$this->load->view('not_found');
	}
	
}
