<?php 
class madminpanel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function getdata($type, $param1="", $param2="", $param3="", $param4=""){
		switch($type){
			case 'admin_login':
				$sql = "
					SELECT A.*
					FROM tbl_user A
					WHERE A.user_id = '".$param1."'
				";
				return $this->db->query($sql)->result_array();
			break;
			case 'subkategori':
				$sql = "
					SELECT A.id as code, A.sub_kategori as value
					FROM cl_subkategori_content A
					WHERE A.cl_kategori_content_id = '".$param1."'
				";
				return $this->db->query($sql)->result_array();
			break;
			case 'tbl_content':
				$sql = "
					SELECT * 
					FROM tbl_content
					WHERE cl_subkategori_content_id = '".$param1."'
				";
				/*
				$data = $this->db->query($sql)->row();
				if($data){
					return $data;
				}else{
					return 0;
				}
				*/
				return $this->db->query($sql)->row();
			break;
		}
	}
	
	function savedata($post, $type='', $editstatus=''){
		$this->db->trans_begin();
			switch($type){
				case 'konten':
					if(!empty($_FILES['gambar']['name'])){	
						$ext = explode('.',$_FILES['gambar']['name']);
						$exttemp = sizeof($ext) - 1;
						$extension = $ext[$exttemp];
						$upload_path = "./repository/foto/konten/";
						$base_name = md5($this->randomString(4));
						$nama_foto =  'foto_'.$post['cl_subkategori_content_id'].'_'.$base_name.'.'.$extension;
						
						$file = $_FILES['gambar']['name'];
						$tmp  = $_FILES['gambar']['tmp_name'];
						if(file_exists($upload_path.$nama_foto)){
							unlink($upload_path.$nama_foto);
							$uploadfile = $upload_path.$nama_foto;
						}	
						else{
							$uploadfile = $upload_path.$nama_foto;
						}
						move_uploaded_file($tmp, $uploadfile);
						if (!chmod($uploadfile, 0775)) {
							 echo "Gagal mengupload file";
							 exit;
						}
						$post['gambar'] = $nama_foto;
					}
						
					
					$cekdata = $this->db->query("
							SELECT *
							FROM tbl_content
							WHERE cl_subkategori_content_id= '".$post['cl_subkategori_content_id']."'
						")->result_array();
					$kount_kontent = count($cekdata);
					
					if($kount_kontent > 0){
						$this->db->update('tbl_content', $post, array('cl_subkategori_content_id'=>$post['cl_subkategori_content_id']));
					}else{
						$this->db->insert('tbl_content', $post);
					}
				break;
				
				case "berita":
					print_r($post);
				break;
				case "artikel":
					print_r($post);
				break;
			}
		if($this->db->trans_status() == false){
			$this->db->trans_rollback();
			return "Data not saved";
		}else{
			return $this->db->trans_commit();
		}
	}
	
	function randomString($length) {
         $str = "";
         $characters = array_merge(range('A','Z'), range('0','9'));
         $max = count($characters) - 1;
         for ($i = 0; $i < $length; $i++) {
              $rand = mt_rand(0, $max);
              $str .= $characters[$rand];
         }
         return $str;
    }
	
	function get_data($p1=""){
		switch($p1){
			case "berita":
				$sql="SELECT * FROM tbl_berita";
			break;
			case "artikel":
				$sql="SELECT * FROM tbl_artikel";
			break;
			case "penduduk":
				$sql="SELECT * FROM tbl_kependudukan";
				return $this->get_jsonna($sql,$p1);
			break;
			case "headline":
				$sql="SELECT * FROM tbl_headline";
			break;
			case "potensi":
				$sql="SELECT A.*,B.komoditi FROM tbl_komoditi_value A
						LEFT JOIN cl_komoditi B ON A.cl_komoditi_id=B.id";
			break;
			case "pdrb":
				$sql="SELECT * FROM tbl_pdrb";
			break;
			case "ekonomi":
				$sql="SELECT * FROM tbl_pertumbuhan_ekonomi";
			break;
		}
		
		return $this->get_jsonna($sql);
	}
	
	function get_jsonna($sql,$p1=""){
		$page = (integer) (($this->input->post('page')) ? $this->input->post('page') : "1");
		$limit = (integer) (($this->input->post('rows')) ? $this->input->post('rows') : "15");
		 
		$count = $this->db->query($sql)->num_rows();
		
		if( $count >0 ) { $total_pages = ceil($count/$limit); } else { $total_pages = 0; } 
		if ($page > $total_pages) $page=$total_pages; 
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)
		if($start<0) $start=0;
		  
		$sql = $sql . " LIMIT $start,$limit";
		
		 $data=$this->db->query($sql)->result();
		 if($p1=='penduduk'){
		 	 $data=$this->db->query($sql)->result_array();
			 $idx=0;
			 foreach($data as $v){
			 	$data[$idx]['jml_penduduk']=number_format($v['jumlah_penduduk'],2);
			 	$idx++;
			 }
		 }
		 	  
			if($total_pages==0){
				$kos='{"total":0,"rows":[]}';
				return $kos;
			}
			else{  	
				if($data){
				   $responce->rows= $data;
				   $responce->total =$count;
				   return json_encode($responce);
				}else{ 
				   return "";
				}   
			}
 	}
	
	function simpan_na($p1="",$post=""){
		$this->db->trans_begin();
		$sts=$post['sts'];
		$id=$post['id'];
		unset($post['sts']);unset($post['id']);
		
		switch($p1){
			case "penduduk":
				$table="tbl_kependudukan";
			break;
			case "headline":
				$table="tbl_headline";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "potensi":
				$table="tbl_komoditi_value";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "pdrb":
				$table="tbl_pdrb";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "ekonomi":
				$table="tbl_pertumbuhan_ekonomi";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "berita":
				$table="tbl_berita";
				//print_r($this->auth);exit;
				$tgl=$post['tanggal'].' '.$post['jam'];
				unset($post['tanggal']);unset($post['jam']);$post['tanggal']=$tgl;
				$post['create_date']=date('Y-m-d');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
			break;
		}
		
		//print_r($post);exit;
		if($sts=='add'){
			$this->db->insert($table,$post);	
		}
		else{
			$this->db->where('id',$id);
			$this->db->update($table,$post);
		}
	//	echo $this->db->last_query();exit;
		if($this->db->trans_status() == false){
		$this->db->trans_rollback();
		return "Data not saved";
		} else{
		return $this->db->trans_commit();
		}
	}
	
	function hapus_na($p1="",$post=""){
		$this->db->trans_begin();
		
		$id=$this->input->post('id');
		
		switch($p1){
			case "penduduk":
				$table="tbl_kependudukan";
			break;
			case "potensi":
				$table="tbl_komoditi_value";
			break;
			case "pdrb":
				$table="tbl_pdrb";
			break;
			case "ekonomi":
				$table="tbl_pertumbuhan_ekonomi";
			break;
			case "berita":
				$table="tbl_berita";
			break;
		}
		
		//print_r($post);exit;
		$this->db->where('id',$id);
		$this->db->delete($table);
		
		if($this->db->trans_status() == false){
		$this->db->trans_rollback();
		return "Data not saved";
		} else{
		return $this->db->trans_commit();
		}
	}
	
	
}