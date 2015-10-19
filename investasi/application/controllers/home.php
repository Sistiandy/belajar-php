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
		$this->load->helper('text');
		$this->allsession = $this->session->all_userdata();
		$this->sesi = $this->allsession;
	}

	function index(){
		$data['menu_dinamis'] = $this->getdisplay('menu_index');
		$data['menu_samping'] = $this->getdisplay('menu_samping');	
		$data['headline'] = $this->getdisplay('headline');	
		$data['berita'] = $this->getdisplay('berita');
		$data['isi'] = $this->db->get_where('tbl_berita', null, 5)->result_array();
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
				$data['profil'] = $this->db->get('tbl_profil')->result_array();
			break;
			case 'get':
				$exp_param1 = explode('-', $param1);
				$data['pendukung']="";
				switch($exp_param1[0]){
					case 3:
						$sql="SELECT A.*,B.nama_kecamatan FROM tbl_luas_wilayah_kecamatan A 
								LEFT JOIN cl_kecamatan B ON A.cl_kecamatan_kode=B.kode WHERE A.tahun=(select max(tahun) from tbl_luas_wilayah_kecamatan)";
						$res=$this->db->query($sql)->result_array();
						$table='<table width="100%" class="csstable">';
						$table .='<tr><td>Kode Wil</td><td>Kecamatan</td><td>Luas</td><td>Persentase(%)</td></tr>'	;
						foreach($res as $v){
							$table .='<tr><td>'.$v['cl_kecamatan_kode'].'</td><td>'.$v['nama_kecamatan'].'</td><td>'.$v['luas_wilayah'].'</td><td>'.$v['persentase'].'</td></tr>'	;
						}
						$table .="</table>";
					$data['pendukung']=$table;	
					break;
					case 7:
						/*$sql="SELECT MAX(tahun) as tahun from tbl_komoditi_value ";
						$tahun=$this->db->query($sql)->result_array();
						if(count($tahun)>0){
							$select="";
							$tahun_na=$tahun[0]['tahun'];
							$tahun_sebelumna=($tahun_na-5);
							for($i=$tahun_na;$i>=$tahun_sebelumna;$i--){
								if($i==$tahun_sebelumna){$select .=$i;}else{$select .=$i.',';}
							}
							echo $select;
							exit;
						}
						$sql="SELECT A.*,B.nama_kecamatan FROM tbl_luas_wilayah_kecamatan A 
								LEFT JOIN cl_kecamatan B ON A.cl_kecamatan_kode=B.kode WHERE A.tahun=(select max(tahun) from tbl_luas_wilayah_kecamatan)";
						$res=$this->db->query($sql)->result_array();
						$table='<table width="100%" class="csstable">';
						$table .='<tr><td>Kode Wil</td><td>Kecamatan</td><td>Luas</td><td>Persentase(%)</td></tr>'	;
						foreach($res as $v){
							$table .='<tr><td>'.$v['cl_kecamatan_kode'].'</td><td>'.$v['nama_kecamatan'].'</td><td>'.$v['luas_wilayah'].'</td><td>'.$v['persentase'].'</td></tr>'	;
						}
						$table .="</table>";
						*/
						$sql="SELECT A.*,B.komoditi FROM tbl_komoditi_value A 
								LEFT JOIN cl_komoditi B ON A.cl_komoditi_id=B.id WHERE A.tahun=(select max(tahun) from tbl_komoditi_value)";
						$res=$this->db->query($sql)->result_array();
						$table='<table width="100%" class="csstable">';
						$table .='<tr><td>No</td><td>Komoditi</td><td>Jumlah</td><td>satuan</td></tr>'	;
						$no=1;
						foreach($res as $v){
							$table .='<tr><td>'.$no.'</td><td>'.$v['komoditi'].'</td><td style="text-align: right;">'.number_format($v['jumlah'],2).'</td><td>'.$v['satuan'].'</td></tr>'	;
							$no++;
						}
						$table .="</table>";
						
					$data['pendukung']=$table;	
					break;
					case 5:
					case 17:
					case 24:
						$data['pendukung']="<div id='chart_tambahan'></div>";
				
					break;
					case 18:
						$sql="SELECT A.* FROM tbl_makro_pertumbuhan_ekonomi A 
								WHERE A.tahun=(select max(tahun) from tbl_makro_pertumbuhan_ekonomi)";
						$res=$this->db->query($sql)->result_array();
						$table='<table width="100%" class="csstable">';
						$table .='<tr><td>No</td><td>Tahun</td><td>Lapangan Kerja</td><td>Jumlah</td></tr>'	;
						$no=1;
						foreach($res as $v){
							$table .='<tr><td>'.$no.'</td><td>'.$v['tahun'].'</td><td>'.$v['lapangan_kerja'].'</td><td style="text-align: right;">'.number_format($v['jumlah'],2).'</td></tr>'	;
							$no++;
						}
						$table .="</table>";
					$data['pendukung']=$table;	
					break;
					
				}
				
				
				
				$data['content'] = 'profil_dinas';
				$data['param_chart'] = $exp_param1[1];
				$data['menu_id'] = $exp_param1[0];
				if($exp_param1[1] == 'Y'){
					$query = $this->db->get_where('cl_charttable', array('cl_subkategori_content_id'=>$exp_param1[0]))->row();
					if($query){
						$data['chart'] = $query;
					}else{
						$data['chart'] = "";
					}
				}
				
				$datarecord = $this->mhome->getdata('kontent', $exp_param1[0], $exp_param1[2]);
				if($datarecord){
					$data['recordisi'] = $datarecord->isi;
				}else{
					$data['recordisi'] = "";
				}
				
				
				
			break;
			case "headline":
				$data['content'] = 'headline';
				$data['isi']=$this->db->get_where('tbl_headline',array('id'=>$param1))->row();
			break;
			
			case "berita":
				$data['content'] = 'berita';
				$data['isi']=$this->db->get_where('tbl_berita',array('id'=>$param1))->row();
				$data['comment']=$this->db->get_where('tbl_news_comment',array('berita_id'=>$param1, 'comment_is_publish'=>1))->result_array();
			break;
			case "kontak":
				$data['content'] = 'kontak';
				
			break;
			case "statis":
				$data['content'] = 'statis';
				$data['cat'] = $param1;
				$sql="SELECT * FROM tbl_profil WHERE kategori='".($param1=='ttg' ? 'kota' : 'dinas')."'";
				$data['isi']=$this->db->query($sql)->row();
				//$data['isi']=$this->db->get_where('tbl_berita',array('id'=>$param1))->row();
				
			break;
			
			case 'forum':
				$data['content'] = 'forum';
				$data['kategori_forum'] = $this->db->get_where('tbl_forum_map', array('parent'=>0, 'status'=>1))->result_array();
			break;
			case 'thread':
				$data['content'] = 'thread';
				$data['datathread'] = $this->db->get_where('tbl_forum_thread', array('forumid'=>$param1))->result_array();
				$data['forumname'] = $this->db->get_where('tbl_forum_map', array('forumid'=>$param1))->result_array();
			break;
			case 'viewposting':
				$data['content'] = 'viewposting';
				//$data['']
				$data['isiposting'] = $this->db->get_where('tbl_forum_thread', array('id'=>$param1))->result_array();
			break;
			case 'komentarforum':
				$id_thread = $this->input->post('thid');
				$datuk['komentar'] = $this->db->get_where('tbl_forum_komentar', array('threadid'=>$id_thread,'approval'=>'Y'))->result_array();
				//$data['content'] = 'komentar';
				return $this->load->view('content/page_komentar', $datuk);
				exit;
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
			case 'gallery':
				$data['foto_gallery'] = $this->db->get_where('tbl_multimedia', array('kategori_file'=>'1'))->result_array();
				$data['content'] = 'gallery';
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
		$tablee="";
		if($type=='tbl_pertumbuhan_ekonomi2'){$tablee="tbl_pertumbuhan_ekonomi";}else{$tablee=$type;}
		
		$tahun_skr=$this->db->query("SELECT MAX(tahun)as tahun FROM ".$tablee)->row('tahun');
		$tahun_blk=(int)$tahun_skr-5;
		$no=1;
		$where="WHERE 1=1 AND tahun BETWEEN ".$tahun_blk." AND ".$tahun_skr;
		
		if($this->input->post('menu_id')=='42'){$where .=" AND flag='D' ";} if($this->input->post('menu_id')=='32'){$where .=" AND flag='L' ";}
		$sql="SELECT * FROM $tablee ".$where." ORDER BY tahun DESC limit 0,5";// echo $sql;
		$json = array();
		$kom=$this->db->query($sql)->result_array();
		switch($type){
			case 'tbl_kependudukan':
						$data_y2=array();
						$table .='<table width="100%">';
						$table .='<tr><td style="text-align: center;">No</td><td  style="text-align: center;">Tahun</td><td  style="text-align: right;">Jumlah Penduduk</td><td  style="text-align: center;">Jumlah Pencari Kerja</td></tr>';
						$json['bar']=array();
						foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['jumlah_penduduk'];
							$data_y2[]=(float)$v['jumlah_pencari_kerja'];
							$table .='<tr><td  style="text-align: center;">'.$no.'</td><td  style="text-align: center;">'.$v['tahun'].'</td><td  style="text-align: right;">'.number_format($v['jumlah_penduduk'],2).'</td><td  style="text-align: right;">'.number_format($v['jumlah_pencari_kerja'],2).'</td></tr>';
							$no++;
							
						}
					$y[]=array('name'=>'Jumlah Penduduk','data'=>$data_y);
					$y[]=array('name'=>'Jumlah Pencari Kerja','data'=>$data_y2);
					$table .='</table>';
	
			break;
			case 'tbl_pertumbuhan_penduduk':
						$data_y2=array();
						//echo $sql;
						$json['bar']=array();
						foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['jml_pertumbuhan_penduduk'];
							
							$no++;
							
						}
					$y[]=array('name'=>'Pertumbuhan Jumlah Penduduk','data'=>$data_y);
					
					$table .='</table>';
	
			break;
			case 'tbl_pertumbuhan_ekonomi2':
						$data_y2=array();
						//echo $sql;
						$json['bar']=array();
						foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['pdrb'];
							$data_y2[]=(float)$v['pendatan_kapita'];
							
							$no++;
							
						}
					$y[]=array('name'=>'PDRB','data'=>$data_y);
					$y[]=array('name'=>'Pendapatan Perkapita','data'=>$data_y2);
					
					$table .='';
	
			break;
			case 'tbl_perbankan':
						$data_y2=array();
						//echo $sql;
						$json['bar']=array();
						foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['pinjaman'];
							$data_y2[]=(float)$v['pinjaman_investasi'];
							
							$no++;
							
						}
					$y[]=array('name'=>'Pinjaman','data'=>$data_y);
					$y[]=array('name'=>'Pinjaman Investasi','data'=>$data_y2);
					
					$table .='';
	
			break;
			case 'tbl_pad':
						$data_y2=array();
						//echo $sql;
						$json['bar']=array();
						foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['target'];
							$data_y2[]=(float)$v['realisasi'];
							
							$no++;
							
						}
					$y[]=array('name'=>'Pinjaman','data'=>$data_y);
					$y[]=array('name'=>'Pinjaman Investasi','data'=>$data_y2);
					
					$table .='';
	
			break;
			case 'tbl_rata2_ekonomi':
						$data_y2=array();
						//echo $sql;
						$json['bar']=array();
						$sql="SELECT A.*,B.NAMA_KAB_KOTA FROM tbl_rata2_ekonomi A LEFT JOIN cl_kab_kota B ON A.cl_kab_kota_kode=B.KODE_KAB_KOTA WHERE B.KODE_PROPINSI='73' AND A.tahun=(select max(tahun) from tbl_rata2_ekonomi)";
						$kom=$this->db->query($sql)->result_array();
						$data_na="";
						foreach($kom as $v){
							$x[]=$v['tahun'];
							//$data_y[]=$v['NAMA_KAB_KOTA'].','.(float)$v['rata'];
							//$data_y[]=array((float)$v['rata']);
							//$data_na .="['".$v['NAMA_KAB_KOTA']."',".(float)$v['rata']."]";
							$json['bar'][$v['NAMA_KAB_KOTA']]=(float)$v['rata'];
							$no++;
							
						}
					//$data_na=array();
					//$data_na[]=array();
					//$data_na[]['tes']=5;
					//$data_na[]['tes']=0;
					//$data_na[]['tes2']=0;
					//$y[]=array('type'=>'pie','name'=>'Pertumbuhan Ekonomi','data'=>$data_y);
					echo json_encode($json);
					exit;
					//$table .='</table>';
	
			break;
			
			case 'tbl_jml_kelurahan':
						$data_y2=array();
						$table .='<table width="100%">';
						$table .='<tr><td style="text-align: center;">No</td><td  style="text-align: center;">Tahun</td><td  style="text-align: left;">Kecamatan</td><td  style="text-align: right;">Jumlah Kelurahan</td><td  style="text-align: center;">Jumlah RT</td><td  style="text-align: center;">Jumlah Rw</td></tr>';
						$json['bar']=array();
						$sql="SELECT A.*,B.nama_kecamatan FROM tbl_jml_kelurahan A LEFT JOIN cl_kecamatan B ON A.cl_kecamatan_kode=B.kode 
							  WHERE A.tahun=(select max(tahun) from tbl_jml_kelurahan)";
						$kom=$this->db->query($sql)->result_array();
						
						foreach($kom as $v){
							//$x[]=$v['tahun'];
							//$data_y[]=(float)$v['jumlah_penduduk'];
							//$data_y2[]=(float)$v['jumlah_pencari_kerja'];
							$table .='<tr><td  style="text-align: center;">'.$no.'</td><td  style="text-align: center;">'.$v['tahun'].'</td><td  style="text-align: left;">'.$v['nama_kecamatan'].'</td><td  style="text-align: right;">'.number_format($v['jml_kelurahan'],2).'</td><td  style="text-align: right;">'.number_format($v['jml_rt'],2).'</td><td  style="text-align: right;">'.number_format($v['jml_rw'],2).'</td></tr>';
							$no++;
							
						}
				//	$y[]=array('name'=>'Jumlah Penduduk','data'=>$data_y);
				//	$y[]=array('name'=>'Jumlah Pencari Kerja','data'=>$data_y2);
				$x[]='Data Kecamatan Kota Makassar';
				$sql_na="SELECT A.kode,A.nama_kecamatan,B.jml_kelurahan FROM cl_kecamatan A
						LEFT JOIN 
						(SELECT * FROM tbl_jml_kelurahan WHERE tahun=(SELECT MAX(tahun) from tbl_jml_kelurahan))B ON B.cl_kecamatan_kode=A.kode";
				$kecamatan=$this->db->query($sql_na)->result_array();
						foreach($kecamatan as $v){
							//$x[]=$v['nama_kecamatan'];
							$y[]=array('name'=>$v['nama_kecamatan'],'data'=>array((float)$v['jml_kelurahan']));
						}
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
				$data_y3=array();
				foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['pma'];
							$data_y2[]=(float)$v['pdrb'];
							$data_y3[]=(float)$v['pmdn'];
							$table .='<tr><td  style="text-align: center;">'.$no.'</td><td  style="text-align: center;">'.$v['tahun'].'</td><td  style="text-align: right;">'.number_format($v['pmdn'],1).' ('.$v['satuan_pmdn'].')</td><td  style="text-align: right;">'.number_format($v['pma'],1).' ('.$v['satuan_pma'].')</td><td  style="text-align: right;">'.number_format($v['pdrb'],1).' ('.$v['satuan_pdrb'].')</td></tr>';
							$no++;
				}
				$y[]=array('name'=>'PMDN','data'=>$data_y3);
				$y[]=array('name'=>'PMA','data'=>$data_y);
				$y[]=array('name'=>'PDRB','data'=>$data_y2);
				$table .='</table>';
			break;
			
			case 'tbl_kondisi_jalan':
				$table .='<table width="100%">';
				$table .='<tr><td style="text-align: center;">No</td>
					<td  style="text-align: center;">Tahun</td>
					<td  style="text-align: center;">Panjang Jalan</td>
					<td  style="text-align: center;">Kondisi Baik</td>
					<td  style="text-align: center;">Kondisi Sedang</td>
					<td  style="text-align: center;">Kondisi Rusak Ringan</td>
					<td  style="text-align: center;">Kondisi Rusak Berat</td>
					</tr>';
				$data_y2=array();
				$data_y3=array();
				$data_y4=array();
				$data_y5=array();
				foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['panjang_jalan'];
							$data_y2[]=(float)$v['baik'];
							$data_y3[]=(float)$v['sedang'];
							$data_y4[]=(float)$v['ringan'];
							$data_y5[]=(float)$v['berat'];
							$table .='<tr><td  style="text-align: center;">'.$no.'</td>
								<td  style="text-align: center;">'.$v['tahun'].'</td>
								<td  style="text-align: right;">'.number_format($v['panjang_jalan'],1).' (km)</td>
								<td  style="text-align: right;">'.number_format($v['baik'],1).' (km)</td>
								<td  style="text-align: right;">'.number_format($v['sedang'],1).' (km)</td>
								<td  style="text-align: right;">'.number_format($v['ringan'],1).' (km)</td>
								<td  style="text-align: right;">'.number_format($v['berat'],1).' (km)</td>
								</tr>';
							$no++;
				}
				$y[]=array('name'=>'Panjang Jalan','data'=>$data_y);
				$y[]=array('name'=>'Kondisi Baik','data'=>$data_y2);
				$y[]=array('name'=>'Kondisi Sedang','data'=>$data_y3);
				$y[]=array('name'=>'Kondisi Rusak Ringan','data'=>$data_y4);
				$y[]=array('name'=>'Kondisi Rusak Berat','data'=>$data_y5);
				$table .='</table>';
			break;
			case 'tbl_panjang_jalan':
				$table .='<table width="100%">';
				$table .='<tr><td style="text-align: center;">No</td>
					<td  style="text-align: center;">Tahun</td>
					<td  style="text-align: center;">Arteri</td>
					<td  style="text-align: center;">Kolektor</td>
					<td  style="text-align: center;">Lokal</td>
					<td  style="text-align: center;">Inspeksi Kanal</td>
					
					</tr>';
				$data_y2=array();
				$data_y3=array();
				$data_y4=array();
				
				foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['arteri'];
							$data_y2[]=(float)$v['kolektor'];
							$data_y3[]=(float)$v['lokal'];
							$data_y4[]=(float)$v['inspeksi_kanal'];
							
							$table .='<tr><td  style="text-align: center;">'.$no.'</td>
								<td  style="text-align: center;">'.$v['tahun'].'</td>
								<td  style="text-align: right;">'.number_format($v['arteri'],1).' (km)</td>
								<td  style="text-align: right;">'.number_format($v['kolektor'],1).' (km)</td>
								<td  style="text-align: right;">'.number_format($v['lokal'],1).' (km)</td>
								<td  style="text-align: right;">'.number_format($v['inspeksi_kanal'],1).' (km)</td>
								
								</tr>';
							$no++;
				}
				$y[]=array('name'=>'Arteri','data'=>$data_y);
				$y[]=array('name'=>'Kolektor','data'=>$data_y2);
				$y[]=array('name'=>'Lokal','data'=>$data_y3);
				$y[]=array('name'=>'Inspeksi Kanal','data'=>$data_y4);
				
				$table .='</table>';
			break;
			case 'tbl_kendaraan_uji_dephub':
				$table .='<table width="100%">';
				$table .='<tr><td style="text-align: center;">No</td>
					<td  style="text-align: center;">Tahun</td>
					<td  style="text-align: center;">Kendaraan Penumpang</td>
					<td  style="text-align: center;">Bus</td>
					<td  style="text-align: center;">Truk</td>
					<td  style="text-align: center;">Pickup</td>
					<td  style="text-align: center;">Kendaraan Khusus</td>
					<td  style="text-align: center;">Kendaraan Tempelan</td>
					<td  style="text-align: center;">Kendaraan Tangki</td>
					</tr>';
				$data_y2=array();
				$data_y3=array();
				$data_y4=array();
				$data_y5=array();
				$data_y6=array();
				$data_y7=array();
				foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['penumpang'];
							$data_y2[]=(float)$v['bus'];
							$data_y3[]=(float)$v['truk'];
							$data_y4[]=(float)$v['pick_up'];
							$data_y5[]=(float)$v['khusus'];
							$data_y6[]=(float)$v['tempelan'];
							$data_y7[]=(float)$v['tangki'];
							$table .='<tr><td  style="text-align: center;">'.$no.'</td>
								<td  style="text-align: center;">'.$v['tahun'].'</td>
								<td  style="text-align: right;">'.number_format($v['penumpang'],1).' </td>
								<td  style="text-align: right;">'.number_format($v['bus'],1).' </td>
								<td  style="text-align: right;">'.number_format($v['truk'],1).' </td>
								<td  style="text-align: right;">'.number_format($v['pick_up'],1).' </td>
								<td  style="text-align: right;">'.number_format($v['khusus'],1).' </td>
								<td  style="text-align: right;">'.number_format($v['tempelan'],1).'</td>
								<td  style="text-align: right;">'.number_format($v['tangki'],1).'</td>
								</tr>';
							$no++;
				}
				$y[]=array('name'=>'Kendaraan Penumpang','data'=>$data_y);
				$y[]=array('name'=>'Bus','data'=>$data_y2);
				$y[]=array('name'=>'Truk','data'=>$data_y3);
				$y[]=array('name'=>'Pickup','data'=>$data_y4);
				$y[]=array('name'=>'Kendaraan Khusus','data'=>$data_y5);
				$y[]=array('name'=>'Kendaraan Tempelan','data'=>$data_y6);
				$y[]=array('name'=>'Kendaraan Tangki','data'=>$data_y7);
				$table .='</table>';
			break;
			case 'tbl_kunjungan_kapal':
				$table .='<table width="100%">';
				$table .='<tr><td style="text-align: center;">No</td>
					<td  style="text-align: center;">Tahun</td>
					<td  style="text-align: center;">Samudra</td>
					<td  style="text-align: center;">Nusantara</td>
					<td  style="text-align: center;">Khusus</td>
					<td  style="text-align: center;">Lokal</td>
					
					</tr>';
				$data_y2=array();
				$data_y3=array();
				$data_y4=array();
				
				foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['samudra'];
							$data_y2[]=(float)$v['nusantara'];
							$data_y3[]=(float)$v['khusus'];
							$data_y4[]=(float)$v['lokal'];
							
							$table .='<tr><td  style="text-align: center;">'.$no.'</td>
								<td  style="text-align: center;">'.$v['tahun'].'</td>
								<td  style="text-align: right;">'.number_format($v['samudra'],1).' </td>
								<td  style="text-align: right;">'.number_format($v['nusantara'],1).'</td>
								<td  style="text-align: right;">'.number_format($v['khusus'],1).' </td>
								<td  style="text-align: right;">'.number_format($v['lokal'],1).'</td>
								
								</tr>';
							$no++;
				}
				$y[]=array('name'=>'Samudra','data'=>$data_y);
				$y[]=array('name'=>'Nusantara','data'=>$data_y2);
				$y[]=array('name'=>'Khusus','data'=>$data_y3);
				$y[]=array('name'=>'Lokal','data'=>$data_y4);
				
				$table .='</table>';
			break;
			
			case 'tbl_kunjungan_kapal_tambatan':
				$table .='<table width="100%">';
				$table .='<tr><td style="text-align: center;">No</td>
					<td  style="text-align: center;">Tahun</td>
					<td  style="text-align: center;">Dermaga Umum</td>
					<td  style="text-align: center;">Dermaga Khusus</td>
				
					</tr>';
				$data_y2=array();
				$data_y3=array();
				$data_y4=array();
				
				foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['dermaga_umum'];
							$data_y2[]=(float)$v['dermaga_khusus'];
							
							$table .='<tr><td  style="text-align: center;">'.$no.'</td>
								<td  style="text-align: center;">'.$v['tahun'].'</td>
								<td  style="text-align: right;">'.number_format($v['dermaga_umum'],1).' </td>
								<td  style="text-align: right;">'.number_format($v['dermaga_khusus'],1).'</td>
								
								</tr>';
							$no++;
				}
				$y[]=array('name'=>'Dermaga Umum','data'=>$data_y);
				$y[]=array('name'=>'Dermaga Khusus','data'=>$data_y2);
				
				
				$table .='</table>';
			break;
			
			case 'tbl_arus_petikemas':
				$table .='<table width="100%">';
				$table .='<tr><td style="text-align: center;">No</td>
					<td  style="text-align: center;">Tahun</td>
					<td  style="text-align: center;">'.($this->input->post('menu_id')==42 ? 'Bongkar' : 'Export').'</td>
					<td  style="text-align: center;">'.($this->input->post('menu_id')==42 ? 'Muat' : 'Import').'</td>
				
					</tr>';
				$data_y2=array();
				$data_y3=array();
				$data_y4=array();
				
				foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=($this->input->post('menu_id')==42 ? (float)$v['bongkar'] : (float)$v['export']);
							$data_y2[]=($this->input->post('menu_id')==42 ? (float)$v['muat'] : (float)$v['import']);
							
							$table .='<tr><td  style="text-align: center;">'.$no.'</td>
								<td  style="text-align: center;">'.$v['tahun'].'</td>
								<td  style="text-align: right;">'.($this->input->post('menu_id')==42 ? number_format($v['bongkar'],1) : number_format($v['export'],1)).' </td>
								<td  style="text-align: right;">'.($this->input->post('menu_id')==42 ? number_format($v['muat'],1) : number_format($v['import'],1)).'</td>
								
								</tr>';
							$no++;
				}
				$y[]=array('name'=>($this->input->post('menu_id')==42 ? 'Bongkar' : 'Export'),'data'=>$data_y);
				$y[]=array('name'=>($this->input->post('menu_id')==42 ? 'Muat' : 'Import'),'data'=>$data_y2);
				
				
				$table .='</table>';
			break;
			
			case 'tbl_sambungan_telp':
				$table .='<table width="100%">';
				$table .='<tr><td style="text-align: center;">No</td>
					<td  style="text-align: center;">Tahun</td>
					<td  style="text-align: center;">Pelanggan</td>
					<td  style="text-align: center;">Line Services</td>
					<td  style="text-align: center;">Connected Line</td>
					</tr>';
				$data_y2=array();
				$data_y3=array();
				$data_y4=array();
				
				foreach($kom as $v){
							$x[]=$v['tahun'];
							$data_y[]=(float)$v['pelanggan'];
							$data_y2[]=(float)$v['line_service'];
							$data_y3[]=(float)$v['connected_line'];
							$table .='<tr><td  style="text-align: center;">'.$no.'</td>
								<td  style="text-align: center;">'.$v['tahun'].'</td>
								<td  style="text-align: right;">'.number_format($v['pelanggan'],1).' </td>
								<td  style="text-align: right;">'.number_format($v['line_service'],1).'</td>
								<td  style="text-align: right;">'.number_format($v['connected_line'],1).'</td>
								</tr>';
							$no++;
				}
				$y[]=array('name'=>'Pelanggan','data'=>$data_y);
				$y[]=array('name'=>'Line Services','data'=>$data_y2);
				$y[]=array('name'=>'Connected Line','data'=>$data_y3);
				
				
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
							$bersihinkarakter = preg_replace('/[^ \w]+/', 'a', $b['sub_kategori']);
							$seo_link = strtolower(str_replace(' ', '-', $bersihinkarakter));
							//$html .= 	"<li><a href='".base_url()."home/content/get/".$b['id']."/".$b['flag_chart']."'>".$b['sub_kategori']."</a></li>";
							$html .= 	"<li><a href='".base_url()."konten/".$b['id']."-".$flag_chart."-".$v['flag_submenu']."/".$seo_link.".html'>".$b['sub_kategori']."</a></li>";
						}
						$html .= "</ul>";
					}else{
						$html .= "<li><a href='".base_url()."konten/".$v['id']."-N-".$v['flag_submenu']."/".$seo_link.".html'>".$v['kategori_profil']."</a>";
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
							if($b['flag_chart']) $flag_chart = $b['flag_chart'];
							else $flag_chart = "N";
							$bersihinkarakter = preg_replace('/[^ \w]+/', 'a', $b['sub_kategori']);
							$seo_link = strtolower(str_replace(' ', '-', $bersihinkarakter));						
							$html .= 	"<a href='".base_url()."konten/".$b['id']."-".$flag_chart."-".$v['flag_submenu']."/".$seo_link.".html'>".$b['sub_kategori']."</a>";
							//$html .= 	"<a href='".base_url()."konten/".$b['id']."-".$flag_chart."/".$seo_link.".html'>".$b['sub_kategori']."</a>";
						}
						$html .= "</div>";
					}else{
						//$html .= "<p class='menu_head'><a href='#'>".$v['kategori_profil']."</a></p>";
						$html .= "<p class='menu_head'><a href='".base_url()."konten/".$v['id']."-N-".$v['flag_submenu']."/".$seo_link.".html'>".$v['kategori_profil']."</a></p>";						
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
	
	function nyimpenposting(){
		$post = array();
        foreach($_POST as $k=>$v) $post[$k] = $this->input->post($k, TRUE, TRUE);
		$post['createdate'] = date('Y-m-d H:i:s');
		$post['approval'] = 'N';
		
		echo $this->db->insert('tbl_forum_komentar', $post);
	}
	
	function news_comment(){
		$post = array();
        foreach($_POST as $k=>$v) $post[$k] = $this->input->post($k, TRUE, TRUE);
		$post['comment_date'] = date('Y-m-d H:i:s');
		$post['comment_is_publish'] = FALSE;
		
		echo $this->db->insert('tbl_news_comment', $post);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */