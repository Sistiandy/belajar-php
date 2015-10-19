<?php 
class mhome extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function getdata($type, $param1="", $param2="", $param3="", $param4=""){
		switch($type){
			case 'kategori_menu_atas':
				$sql = "
					SELECT A.*
					FROM cl_kategori_content A
					WHERE A.flag_menu = 'Y'
				";
				return $this->db->query($sql)->result_array();
			break;
			case 'kategori_menu_samping':
				$sql = "
					SELECT A.*
					FROM cl_kategori_content A
					WHERE A.flag_menu = 'N'
				";
				return $this->db->query($sql)->result_array();
			break;
			case 'subkategori_menu':
				$sql = "
					SELECT A.*
					FROM cl_subkategori_content A
					WHERE A.cl_kategori_content_id = '".$param1."'
				";
				return $this->db->query($sql)->result_array();
			break;
			case 'kontent':
				if($param2 == 'Y'){
					$where = "	WHERE A.cl_subkategori_content_id = '".$param1."'";
				}elseif($param2 == 'N'){
					$where = "	WHERE A.cl_kategori_id = '".$param1."'";
				}
				$sql = "
					SELECT A.*
					FROM tbl_content A
					$where
				";
				return $this->db->query($sql)->row();
			break;
			case 'cari_konten':
				$sql = "
					SELECT A.*
					FROM tbl_content A
					WHERE A.isi like '%".$this->db->escape_str($param1)."%'
				";
				return $this->db->query($sql)->result_array();
			break;
			case 'cari_berita':
				$sql = "
					SELECT A.*
					FROM tbl_berita A
					WHERE A.judul_berita like '%".$this->db->escape_str($param1)."%'
				";
				return $this->db->query($sql)->result_array();
			break;
		}
	}
		
}