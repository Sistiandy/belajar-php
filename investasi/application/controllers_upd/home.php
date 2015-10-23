<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	function __construct() {
		parent::__construct();
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("If-Modified-Since: Mon, 22 Jan 2008 00:00:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Cache-Control: private");
		header("Pragma: no-cache");
		$this->load->model('mhome');
		$this->load->model('forum_model');
		$this->load->helper('forum');
	}

	function index(){
		$data['menu_dinamis'] = $this->getdisplay('menu_index');
		$data['menu_samping'] = $this->getdisplay('menu_samping');	
		$data['headline'] = $this->getdisplay('headline');	
		$data['berita'] = $this->getdisplay('berita');		
		$data['content'] = 'beranda';
		$data['type'] = 'beranda';
		$this->load->view('index', $data);
	}
	
	function content($type="", $param1="", $param2=""){
		$data['menu_dinamis'] = $this->getdisplay('menu_index');
		$data['menu_samping'] = $this->getdisplay('menu_samping');
		$data['headline'] = $this->getdisplay('headline');		
		$data['berita'] = $this->getdisplay('berita');		
		$data['type']=$type;
		switch($type){
			case 'beranda':
				$data['content'] = 'beranda';
			break;
			case 'get':
				$data['content'] = 'profil_dinas';
				$data['param_chart'] = $param2;
				$data['menu_id'] = $param1;
				if($param2 == 'Y'){
					$query = $this->db->get_where('cl_charttable', array('cl_subkategori_content_id'=>$param1))->row();
					if($query){
						$data['chart'] = $query;
					}else{
						$data['chart'] = "";
					}
				}
				
				$datarecord = $this->mhome->getdata('kontent', $param1);
				$data['row'] = $datarecord;
				if($datarecord){
					$data['recordisi'] = $datarecord->isi;
				}else{
					$data['recordisi'] = "SORRY NO CONTENT";
				}
			break;
			case "headline":
				$data['content'] = 'headline';
				$data['isi']=$this->db->get_where('tbl_headline',array('id'=>$param1))->row();
			break;
			
			case "berita":
				$data['content'] = 'berita';
				$data['isi']=$this->db->get_where('tbl_berita',array('id'=>$param1))->row();
			break;
			
			case "statis":
				$data['content'] = 'statis';
				$data['cat'] = $param1;
				//$data['isi']=$this->db->get_where('tbl_berita',array('id'=>$param1))->row();
				
			break;
			
			case 'forum':
				$forumid=""; 
				$permalink="";
				
				if ($forumid == "") {
					$parent = 0;
				} else {
					$parent = $forumid;
				}
				
				/*$data['sesi'] = $this->sesi;*/
				if ($this->session->userdata('username') != "") {
					$data['logged_in'] = TRUE;
				} else {
					$data['logged_in'] = FALSE;
				}

				$getforum = $this->forum_model->getdata('tbl_forum_map',array('parent'=>$parent,'status'=>1), array('forumid','DESC'));
				
				if(sizeOf($getforum) > 0) {
					$data['content'] = 'forum';
					
					$result_array = array();
					$sub_array	  = array();
				
					foreach ($getforum as $get=>$g) {
					$subforum = $this->forum_model->getdata('v_foruminfo',array('parent'=>$g['forumid'],'status'=>1), array('forumid','DESC'));
					
						$num = 1;
						foreach($subforum as $sub) {
							$mods = $num % 2;
							if ($mods == 0) {
								$sub['flag'] = "genap";
							} else {
								$sub['flag'] = "ganjil";
							}
							array_push($sub_array, $sub);
							$num++;
						}
						$g['subforum'] = $sub_array;
						$sub_array = array();
						array_push($result_array, $g);
					}
					
					$data['forum_mapping'] = $result_array;
					
					/*header('Content-Type: application/json');
					echo json_encode($result_array);
					die();*/
				} else {
					$data['content'] = 'thread';
					$data['thread'] = $this->forum_model->getdata('tbl_forum_map', array('forumid'=>$forumid));
					$data['topic']  = $this->forum_model->getdata('v_threadinfo', array('forumid'=>$forumid, 'status'=>1), array('threadid','DESC'));
				}
			break;
			
			case 'cari_konten':
				$keynya_sicari_ini = $this->input->post('key', TRUE, TRUE);
				$keynya_sicari_ini = preg_replace('/[^ \w]+/', '', $keynya_sicari_ini);
				$hasilcari_konten = $this->mhome->getdata('cari_konten', $keynya_sicari_ini);
				$hasilcari_berita = $this->mhome->getdata('cari_berita', $keynya_sicari_ini);
				//$hasilcari_forum  = $this->mhome->getdata('cari_forum', $keynya_sicari_ini);
				$data['hasil_konten'] = $hasilcari_konten;
				$data['hasil_berita'] = $hasilcari_berita;
				//$data['hasil_forum'] = $hasilcari_forum;
				$data['keyword'] = $keynya_sicari_ini;
				$data['content'] = 'cari';
			break;
		}
		$this->load->view('index', $data);
	}
	
	function getchart($type=''){
		$x=array();
		$y=array();
		$data_y=array();
		$chart=array();
		$table="";
		$no=1;
		$sql="SELECT * FROM $type ORDER BY tahun DESC limit 0,5";
		$json = array();
		$kom=$this->db->query($sql)->result_array();
		switch($type){
			case 'tbl_kependudukan':
						$table .='<table width="100%">';
						$table .='<tr><td style="text-align: center;">No</td><td  style="text-align: center;">Tahun</td><td  style="text-align: right;">Jumlah Penduduk</td><td  style="text-align: center;">Jumlah Pencari Kerja</td></tr>';
						$json['bar']=array();
						foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['jumlah_penduduk'];
							$table .='<tr><td  style="text-align: center;">'.$no.'</td><td  style="text-align: center;">'.$v['tahun'].'</td><td  style="text-align: right;">'.number_format($v['jumlah_penduduk'],2).'</td><td  style="text-align: right;">'.number_format($v['jumlah_pencari_kerja'],2).'</td></tr>';
							$no++;
							
						}
					$y[]=array('name'=>'Data','data'=>$data_y);
					$table .='</table>';
	
			break;
			case 'tbl_pertumbuhan_ekonomi':
						$table .='<table width="100%">';
						$table .='<tr><td style="text-align: center;">No</td><td  style="text-align: center;">Tahun</td><td  style="text-align: right;">Inflasi</td><td  style="text-align: center;">Satuan</td></tr>';
						$json['bar']=array();
						
						foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['inflasi'];
							$table .='<tr><td  style="text-align: center;">'.$no.'</td><td  style="text-align: center;">'.$v['tahun'].'</td><td  style="text-align: right;">'.number_format($v['inflasi'],1).'</td><td  style="text-align: center;">%</td></tr>';
							$no++;
						}
						$y[]=array('name'=>'Data','data'=>$data_y);
						$table .='</table>';
			break;
			
			case 'tbl_komoditi_value':
						$table .='<table width="100%">';
						$table .='<tr><td style="text-align: center;">No</td><td  style="text-align: center;">Tahun</td><td  style="text-align: right;">Jumlah</td><td  style="text-align: center;">Satuan</td></tr>';
						$json['bar']=array();
						$sql =" SELECT A.* FROM tbl_komoditi_value A
								LEFT JOIN cl_komoditi B ON A.cl_komoditi_id=B.id
								LEFT JOIN cl_sektor_potensi C ON B.cl_sektor_potensi_id=C.id 
								WHERE C.cl_subkategori_content_id=".$this->input->post('menu_id')." order by A.tahun DESC limit 0,5";
						$kom=$this->db->query($sql)->result_array();
						
						foreach($kom as $v){
							$table .='<tr><td  style="text-align: center;">'.$no.'</td><td  style="text-align: center;">'.$v['tahun'].'</td><td  style="text-align: right;">'.number_format($v['jumlah'],2).'</td><td  style="text-align: center;">'.$v['satuan'].'</td></tr>';
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['jumlah'];
							$no++;
							
						}
						$table .='</table>';
						$y[]=array('name'=>'Data','data'=>$data_y);
			break;
			case 'tbl_pdrb':
				$table .='<table width="100%">';
				$table .='<tr><td style="text-align: center;">No</td><td  style="text-align: center;">Tahun</td><td  style="text-align: center;">PMDN</td><td  style="text-align: center;">PMA</td><td  style="text-align: center;">PDRB</td>';
				$data_y2=array();
				foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['pma'];
							$data_y2[]=(float)$v['pdrb'];
							$table .='<tr><td  style="text-align: center;">'.$no.'</td><td  style="text-align: center;">'.$v['tahun'].'</td><td  style="text-align: right;">'.number_format($v['pmdn'],1).' ('.$v['satuan_pmdn'].')</td><td  style="text-align: right;">'.number_format($v['pma'],1).' ('.$v['satuan_pma'].')</td><td  style="text-align: right;">'.number_format($v['pdrb'],1).' ('.$v['satuan_pdrb'].')</td></tr>';
							$no++;
				}
				$y[]=array('name'=>'PMA','data'=>$data_y);
				$y[]=array('name'=>'PDRB','data'=>$data_y2);
				$table .='</table>';
			break;
		}
			//echo join($data_y,',');
		//exit;
		
		
		$chart['x']=$x;
		$chart['y']=$y;
		$chart['table']=$table;
		echo json_encode($chart); 		
	}
	
	function getdisplay($type=''){
		switch($type){
			case 'menu_index':
				$html = "";
				$datakategori = $this->mhome->getdata('kategori_menu_atas');
				foreach($datakategori as $k=>$v){
					$datasubkategori = $this->mhome->getdata('subkategori_menu', $v['id']);
					if($datasubkategori){
						$html .= "<li><a href='#'>".$v['kategori_profil']."</a>";
						$html .= "<ul>";
						foreach($datasubkategori as $a => $b){
							if($b['flag_chart']) $flag_chart = $b['flag_chart'];
							else $flag_chart = "N";
							//$html .= 	"<li><a href='".base_url()."home/content/get/".$b['id']."/".$b['flag_chart']."'>".$b['sub_kategori']."</a></li>";
							$html .= 	"<li><a href='".base_url()."konten/".$b['id']."/".$flag_chart."'>".$b['sub_kategori']."</a></li>";
						}
						$html .= "</ul>";
					}else{
						$html .= "<li><a href=''>".$v['kategori_profil']."</a>";
					}
					$html .= "</li>";
				}
				return $html;
				exit;
			break;
			case 'menu_samping':
				$html = "";			
				$datakategori = $this->mhome->getdata('kategori_menu_samping');
				foreach($datakategori as $k=>$v){
					$datasubkategori = $this->mhome->getdata('subkategori_menu', $v['id']);
					if($datasubkategori){
						$html .= "<p class='menu_head'>".$v['kategori_profil']."</p>";
						$html .= "<div class='menu_body'>";
						foreach($datasubkategori as $a => $b){
							$html .= 	"<a href='".base_url()."home/content/get/".$b['id']."/".$b['flag_chart']."'>".$b['sub_kategori']."</a>";
						}
						$html .= "</div>";
					}else{
						$html .= "<p class='menu_head'><a href='#'>".$v['kategori_profil']."</a></p>";
					}
				}
				return $html;
				exit;
			break;
			
			case "headline":
				return $this->db->get('tbl_headline')->result_array();
			break;
			case "berita":
				return $this->db->query('SELECT * FROM tbl_berita ORDER BY tanggal DESC limit 0,10')->result_array();
			break;
		}
	}
	
	function tes(){
		$data['judul']='TESSS';
		$data['content'] = 'tes';
		$data['type'] = 'beranda';
		$data['menu_dinamis'] = $this->getdisplay('menu_index');
		$data['menu_samping'] = $this->getdisplay('menu_samping');
		$this->load->view('index', $data);
	}
	
	function tes_data(){
		$x=array();
		$y=array();
		$data_y=array();
		$chart=array();
		$sql="select * from tbl_kependudukan ";
		
		$json['bar']=array();
		$kom=$this->db->query($sql)->result_array();
		foreach($kom as $v){
			//$val=$v['jumlah_penduduk'];
			//$json['bar'][$v['tahun']]=(int)$val;	
			$x[]=$v['tahun'];
			$data_y[]=(float)$v['jumlah_penduduk'];
			
			
		}
		
		//echo join($data_y,',');
		//exit;
		$y[]=array('name'=>'Data','data'=>$data_y);
		$chart['x']=$x;
		$chart['y']=$y;
		echo json_encode($chart);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */