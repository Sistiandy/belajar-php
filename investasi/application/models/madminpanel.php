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
				$where = "";
				if($param2 == 'Y'){
					$where .= "	WHERE cl_subkategori_content_id = '".$param1."'";
				}elseif($param2 == 'N'){
					$where .= "	WHERE cl_kategori_id = '".$param1."'";
				}
				$sql = "
					SELECT * 
					FROM tbl_content
					$where
				";
				return $this->db->query($sql)->row();
			break;
			case 'tbl_forum_thread':
				$sql = "
					SELECT *
					FROM tbl_forum_thread
					WHERE id = '".$param1."'
				";
				return $this->db->query($sql)->row();
			break;
			case 'category_forum':
				$sql = "
					SELECT forumid as code, forum_name as value
					FROM tbl_forum_map
					WHERE parent = '0' AND status = '1'
				";
				return $this->db->query($sql)->result_array();
			break;
			case 'subforum':
				$politik_tai_babi = $this->input->post('v');
				$where = "";
				if($politik_tai_babi){
					$where .= " AND parent = '".$politik_tai_babi."' ";
				}
				$sql = "
					SELECT forumid as code, forum_name as value
					FROM tbl_forum_map
					WHERE status = '1' 
					$where
				";
				return $this->db->query($sql)->result_array();
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
						
					if(isset($post['cl_subkategori_content_id'])){
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
					}else{
						$cekdata = $this->db->query("
								SELECT *
								FROM tbl_content
								WHERE cl_kategori_id= '".$post['cl_kategori_id']."'
							")->result_array();
						$kount_kontent = count($cekdata);
						
						if($kount_kontent > 0){
							$this->db->update('tbl_content', $post, array('cl_kategori_id'=>$post['cl_kategori_id']));
						}else{
							$this->db->insert('tbl_content', $post);
						}
					}
				break;
				
				case "berita":
					print_r($post);
				break;
				case "artikel":
					print_r($post);
				break;
				case 'multimedia':
					$type_form = $post['type_form'];
					unset($post['type_form']);
					if(!empty($_FILES['gambar']['name'])){	
						$ext = explode('.',$_FILES['gambar']['name']);
						$exttemp = sizeof($ext) - 1;
						$extension = $ext[$exttemp];
						$base_name = date('YmdHis');//md5($this->randomString(4));
                                                $title = $_POST['title'];
						if($type_form == 'foto'){
							$upload_path = "./repository/foto/gallery/";
							$nama_foto =  'fotogallery'.'_'.$base_name.'.'.$extension;
							
						}elseif($type_form == 'video'){
							$upload_path = "./repository/video/";
							$nama_foto =  'video_beranda.'.$extension;
						}elseif($type_form == 'kadin'){
							$upload_path = "./repository/foto/kadin/";
							$nama_foto =  'kadin.'.$extension;
						}
						
						$file = $_FILES['gambar']['name'];
						$tmp  = $_FILES['gambar']['tmp_name'];
						
						$allowed = array('jpg','jpeg','mp4');
						$check_jembut = pathinfo($file, PATHINFO_EXTENSION);
						if( ! in_array( strtolower($check_jembut), $allowed )){ return '3';exit; }
						
						if(file_exists($upload_path.$nama_foto)){
							unlink($upload_path.$nama_foto);
						}
						
						$uploadfile = $upload_path.$nama_foto;
						move_uploaded_file($tmp, $uploadfile);
						if (!chmod($uploadfile, 0775)) {
							 echo "Gagal mengupload file";
							 exit;
						}
						
						if($type_form == 'foto'){
							$post_foto = array(
                                                                'title' => $title,
								'filename' => $nama_foto,
								'kategori_file' => '1', //kategori file foto di database = 1
								'tanggal_upload' => date('Y-m-d')
							);
							$this->db->insert('tbl_multimedia', $post_foto);
						}
					}else{
						return '2';
						exit;
					}
				break;
				case 'forum':
					$editstatus = $post['editstatus'];
					$id = $post['id'];
					unset($post['editstatus']);
					unset($post['id']);
					
					if($editstatus == 'add'){
						$post['createdate']=date('Y-m-d H:i:s');
						$post['create_by']=$this->auth[0]['nama_lengkap'];
						$this->db->insert('tbl_forum_thread', $post);
					}elseif($editstatus == 'edit'){
						$post['editdate']=date('Y-m-d H:i:s');
						$this->db->update('tbl_forum_thread', $post, array('id'=>$id));
					}
				break;
				case 'approval_forum':
					if($editstatus == 'approve'){
						$jml_komentar = $this->db->get_where('tbl_forum_thread', array('id'=>$post['threadid']))->result_array();
						$update_komentar = intval($jml_komentar[0]['replyon']) + 1;
						
						$array_approve = array(
							'approval' => 'Y',
							'approval_date' => date('Y-m-d H:i:s')
						);
						$this->db->update('tbl_forum_thread', array('replyon'=>$update_komentar), array('id'=>$post['threadid']));
						$this->db->update('tbl_forum_komentar', $array_approve, array('id'=>$post['id']));
					}elseif($editstatus == 'delete'){
						$this->db->delete('tbl_forum_komentar', array('id'=>$post['id']));
					}
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
			case "tumbuh_penduduk":
				$sql="SELECT * FROM tbl_pertumbuhan_penduduk";
			break;
			case "perbankan":
				$sql="SELECT * FROM tbl_perbankan";
			break;
			case "pad":
				$sql="SELECT * FROM tbl_pad";
			break;
			case "makro_ekonomi":
				$sql="SELECT * FROM tbl_makro_pertumbuhan_ekonomi";
			break;
			case "luas_wil":
				$sql="SELECT A.*,B.nama_kecamatan FROM tbl_luas_wilayah_kecamatan A LEFT JOIN cl_kecamatan B ON A.cl_kecamatan_kode=B.kode";
			break;
			case "rata_ekonomi":
				$sql="SELECT A.*,B.NAMA_KAB_KOTA FROM tbl_rata2_ekonomi A LEFT JOIN cl_kab_kota B ON A.cl_kab_kota_kode=B.KODE_KAB_KOTA WHERE B.KODE_PROPINSI='73'";
			break;
			case "jml_kel":
				$sql="SELECT A.*,B.nama_kecamatan FROM tbl_jml_kelurahan A LEFT JOIN cl_kecamatan B ON A.cl_kecamatan_kode=B.kode";
			break;
			case "user":
				$sql="SELECT * FROM tbl_user";
			break;
			case "artikel":
				$sql="SELECT * FROM tbl_artikel";
			break;
			case "penduduk":
				$sql="SELECT * FROM tbl_kependudukan";
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
			case "kondisi_jalan":
				$sql="SELECT * FROM tbl_kondisi_jalan";
			break;
			case "panjang_jalan":
				$sql="SELECT * FROM tbl_panjang_jalan";
			break;
			case "kendaraan_uji":
				$sql="SELECT * FROM tbl_kendaraan_uji_dephub";
			break;
			case "kapal_pelayaran":
				$sql="SELECT * FROM tbl_kunjungan_kapal";
			break;
			case "kapal_tambatan":
				$sql="SELECT * FROM tbl_kunjungan_kapal_tambatan";
			break;
			case "petikemas_dn":
				$sql="SELECT * FROM tbl_arus_petikemas WHERE flag='D'";
			break;
			case "petikemas_ln":
				$sql="SELECT * FROM tbl_arus_petikemas WHERE flag='L'";
			break;
			case "telp":
				$sql="SELECT * FROM tbl_sambungan_telp";
			break;
			
			case 'forum':
				$sql = "
					SELECT A.*
					FROM tbl_forum_thread A
				";
			break;
			case 'forum_komentar':
				$sql = "
					SELECT A.*, B.thread_title
					FROM tbl_forum_komentar A
					LEFT JOIN tbl_forum_thread B ON A.threadid = B.id
					WHERE A.approval = 'N'
				";
			break;
			
		}
		
		return $this->get_jsonna($sql);
	}
	
	function get_jsonna($sql){
		$page = (integer) (($this->input->post('page')) ? $this->input->post('page') : "1");
		$limit = (integer) (($this->input->post('rows')) ? $this->input->post('rows') : "15");
		 
		$count = $this->db->query($sql)->num_rows();
		
		if( $count >0 ) { $total_pages = ceil($count/$limit); } else { $total_pages = 0; } 
		if ($page > $total_pages) $page=$total_pages; 
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)
		if($start<0) $start=0;
		  
		$sql = $sql . " LIMIT $start,$limit";
		
		 $data=$this->db->query($sql)->result();  
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
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "jml_kel":
				$table="tbl_jml_kelurahan";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "pad":
				$table="tbl_pad";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "perbankan":
				$table="tbl_perbankan";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "rata_ekonomi":
				$table="tbl_rata2_ekonomi";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "makro_ekonomi":
				$table="tbl_makro_pertumbuhan_ekonomi";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "tumbuh_penduduk":
				$table="tbl_pertumbuhan_penduduk";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "luas_wil":
				$table="tbl_luas_wilayah_kecamatan";
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
			case "kondisi_jalan":
				$table="tbl_kondisi_jalan";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "panjang_jalan":
				$table="tbl_panjang_jalan";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "kendaraan_uji":
				$table="tbl_kendaraan_uji_dephub";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "kapal_pelayaran":
				$table="tbl_kunjungan_kapal";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "kapal_tambatan":
				$table="tbl_kunjungan_kapal_tambatan";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "petikemas_dn":
				$table="tbl_arus_petikemas";
				//print_r($this->auth);exit;
				$post['flag']='D';
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "petikemas_ln":
				$table="tbl_arus_petikemas";
				//print_r($this->auth);exit;
				$post['flag']='L';
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "telp":
				$table="tbl_sambungan_telp";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
				$post['create_by']=$this->auth[0]['nama_lengkap'];
				
			break;
			case "profil_kota":
			case "profil_dinas":
				$table="tbl_profil";
				//print_r($this->auth);exit;
				$post['create_date']=date('Y-m-d H:i:s');
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
		
		$id = $this->input->post('id');
		switch($p1){
			case "penduduk":
				$table="tbl_kependudukan";
			break;
			case "pad":
				$table="tbl_pad";
			break;
			case "rata_ekonomi":
				$table="tbl_rata2_ekonomi";
			break;
			case "makro_ekonomi":
				$table="tbl_makro_pertumbuhan_ekonomi";
			break;
			case "perbankan":
				$table="tbl_perbankan";
			break;
			case "tumbuh_penduduk":
				$table="tbl_pertumbuhan_penduduk";
			break;
			case "jml_kel":
				$table="tbl_jml_kelurahan";
			break;
			case "luas_wil":
				$table="tbl_luas_wilayah_kecamatan";
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
			case "kondisi_jalan":
				$table="tbl_kondisi_jalan";
			break;
			case "panjang_jalan":
				$table="tbl_panjang_jalan";
			break;
			case "kendaraan_uji":
				$table="tbl_kendaraan_uji_dephub";
			break;
			case "kapal_pelayaran":
				$table="tbl_kunjungan_kapal";
			break;
			case "kapal_tambatan":
				$table="tbl_kunjungan_kapal_tambatan";
			break;
			case "petikemas_dn":
			case "petikemas_ln":
				$table="tbl_arus_petikemas";
			break;
			case "telp":
				$table="tbl_sambungan_telp";
			break;
			case 'foto':
				$table="tbl_multimedia";
				$sqlcek = $this->db->query("SELECT filename from tbl_multimedia WHERE id = '".$id."' ")->row();
				$uploadpath = "./repository/foto/gallery/";
				unlink($uploadpath.$sqlcek->filename);
			break;
			case 'forum':
				$table = "tbl_forum_thread";
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