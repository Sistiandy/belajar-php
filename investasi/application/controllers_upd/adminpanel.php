<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminpanel extends CI_Controller {
	function __construct() {
		parent::__construct();
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("If-Modified-Since: Mon, 22 Jan 2008 00:00:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Cache-Control: private");
		header("Pragma: no-cache");
		$this->auth	= unserialize(base64_decode($this->session->userdata('portal_investasi')));
		$this->load->model('madminpanel');
	}

	function index(){
		
		if($this->auth){
			$data['judul'] = 'Beranda';
			$this->load->view('adminpanel/index', $data);
		}else{
			header("Location: " .base_url().'controlpanel');
		}

	}
		
	function getdisplay($type, $param1=""){
		$data = array();
		switch($type){
			case 'konten':
				$template = 'modul_content';
				$data['combo_subkategori'] = $this->combobox('subkategori', 'return','', $param1);
			break;
			case 'getform':
				$template = 'form_content';
				$idsubkategori = $this->input->post('id_subkategori');
				$data['datarecord'] = $this->madminpanel->getdata('tbl_content', $idsubkategori);
				//$sq = $this->madminpanel->getdata('tbl_content', $idsubkategori); 
				$data['idsubkategori'] = $idsubkategori;
				$data['uid_textarea'] = md5(uniqid(rand(),true));
			break;		
			case "get_formna":
				$template = 'form_berita_artikel';
				$data['mod']=$param1;
			break;
			
			case "rame":
				$data['mod']=$param1;
				$template="grid_rame";
				
			break;
			
			
			
			/*case 'potensi':
				$template = 'modul_content';
				$data['combo_subkategori'] = $this->combobox('subkategori', 'return','', 2);
				$data['judul_form'] = 'Potensi';
			break;
			case 'infrastruktur':
				$template = 'modul_content';
				$data['combo_subkategori'] = $this->combobox('subkategori', 'return','', 3);
				$data['judul_form'] = 'Infrastruktur';
			break;
			case 'perizinan':
				$template = 'modul_content';
				$data['combo_subkategori'] = $this->combobox('subkategori', 'return','', 4);
				$data['judul_form'] = 'Perizinan';
			break;
			
		*/
		}
		
		$this->load->view('adminpanel/konten/'.$template, $data);		
	}
	
	function savedata($type='', $editstatus=''){
		$post = array();
        foreach($_POST as $k=>$v) $post[$k] = $this->input->post($k);
		
		echo $this->madminpanel->savedata($post,$type,$editstatus);
	}
	
	function combobox($type, $balikan='', $param="", $param2=''){
		$optTemp = "";
		if($param != ""){
			$p2 = $param;
		}else{
			$p2 = "";
		}
						
		if($type == 'subkategori'){
			$data = $this->madminpanel->getdata($type, $param2);
		}
		
		$optTemp .= "<option value=''>-- Pilih --</option>";			
		foreach($data as $v=>$k){
			if($p2 == $k['code']){
				$optTemp .= "<option selected value='".$k['code']."'>".$k['value']."</option>";
			}else{
				$optTemp .= "<option value='".$k['code']."'>".$k['value']."</option>";
			}
		}
		
		if($balikan == 'echo'){
			echo $optTemp;
		}elseif($balikan == 'return'){
			return $optTemp;
		}
		
	}
	
	function get_data($p1=""){
		echo $this->madminpanel->get_data($p1);
	}
	
	function get_formna($p1=""){
		$data['mod']=$p1;
		$data['sts']=$this->input->post('sts');
		$template="form_rame";
	//	echo $p1;exit;
		switch($p1){
			case "penduduk":
				if($data['sts']=='edit'){
					$data['data']=$this->db->get_where('tbl_kependudukan',array('id'=>$this->input->post('id')))->row();
				}
			break;
			case "headline":
				if($data['sts']=='edit'){
					$data['data']=$this->db->get_where('tbl_headline',array('id'=>$this->input->post('id')))->row();
				}
			break;
			
			case "potensi":
				if($data['sts']=='edit'){
					$data['data']=$this->db->get_where('tbl_komoditi_value',array('id'=>$this->input->post('id')))->row();
				}
				$data['komoditi']=$this->db->get('cl_komoditi')->result_array();
			break;
			case "pdrb":
				if($data['sts']=='edit'){
					$data['data']=$this->db->get_where('tbl_pdrb',array('id'=>$this->input->post('id')))->row();
				}
			break;
			case "ekonomi":
				if($data['sts']=='edit'){
					$data['data']=$this->db->get_where('tbl_pertumbuhan_ekonomi',array('id'=>$this->input->post('id')))->row();
				}
			break;
			case "berita":
				if($data['sts']=='edit'){
					$sql="SELECT A.*,date(tanggal)as tgl,time(tanggal)as jam from tbl_berita A WHERE A.id=".$this->input->post('id');
					$data['data']=$this->db->query($sql)->row();
				}
			break;
		}
		
		$this->load->view('adminpanel/konten/'.$template, $data);	
	}
	
	function simpan_na($p1=""){
		 
		$post = array();
		foreach($_POST as $k=>$v) $post[$k] = $this->input->post($k);
		if($p1=='berita'){
			$upload=$this->upload('berita');
			if($upload["msg"]==1){
				if($upload["name"]!=''){
					$post['gambar']=$upload["name"];
				}
				else{unset($post['gambar']);}
				echo $this->madminpanel->simpan_na($p1,$post); 
			}
		}
		else{echo $this->madminpanel->simpan_na($p1,$post);}
		
	}
	
	function hapus($p1){
		echo $this->madminpanel->hapus_na($p1);
	}
	
	function upload($p1="",$p2="",$p3=""){

		$date=date('YmdHis');
		$data=array();
		switch ($p1){
			case "berita":
				$fileElementName='gambar';
				$upload_dir="repository/foto/berita/";
				$newFilename = $date;
			break;
			
		}
		//print_r($this->sesina);exit;
		if(count($_FILES)>0){
		
			$fName = $_FILES[$fileElementName]['tmp_name'];
			//echo $fName;exit;
			$fSize = @filesize($_FILES[$fileElementName]['tmp_name']);
			@unlink($_FILES[$fileElementName]);		
			$filename = basename($_FILES[$fileElementName]['name']);
			$tmp = explode(".", $filename);
			$newFilename .= '.'.$tmp[1];
			$uploadfile = $upload_dir . $newFilename;
			if(!file_exists($upload_dir))mkdir($upload_dir, 0777, true);
			if(file_exists($uploadfile)){chmod($uploadfile,0777);unlink($uploadfile);}
		
		
			move_uploaded_file($_FILES[$fileElementName]['tmp_name'], $uploadfile);
			
			if(!chmod($uploadfile, 0775)){
				$data["msg"]=2;
				$data["name"]="";
				echo json_encode($data);exit;
			}
			else{
				$data["msg"]=1;
				$data["name"]=$newFilename;
				return $data;
			}
		}
		else{
				$data["msg"]=1;
				$data["name"]='';
				return $data;
		}
		
		
	}
	
}
