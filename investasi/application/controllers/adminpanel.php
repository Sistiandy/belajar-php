<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class adminpanel extends CI_Controller {

    function __construct() {
        parent::__construct();
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("If-Modified-Since: Mon, 22 Jan 2018 00:00:00 GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Cache-Control: private");
        header("Pragma: no-cache");
        $this->auth = unserialize(base64_decode($this->session->userdata('portal_investasi')));
        $this->load->model('madminpanel');
    }

    function index() 
	{
        if ($this->auth) 
		{
            $data['judul'] = 'Beranda';
            $this->load->view('adminpanel/index', $data);
        } 
		else 
		{
            header("Location: " . base_url() . 'controlpanel');
        }
    }

    function getdisplay($type, $param1 = "", $param2 = "") {
        $data = array();
        switch ($type) {
            case 'konten':
                $template = 'modul_content';
                if ($param2 == 'Y') {
                    $data['combo_subkategori'] = $this->combobox('subkategori', 'return', '', $param1);
                }
                if ($param2 == 'N') {
                    $data['id_kategori'] = $param1;
                }
                $data['flag_submenu'] = $param2;
                break;
            case 'getform':
                $submenu = $this->input->post('flag_submenu');
                if ($submenu == 'Y') {
                    $template = 'form_content';
                    $idsubkategori = $this->input->post('id_subkategori');
                    $data['datarecord'] = $this->madminpanel->getdata('tbl_content', $idsubkategori, 'Y');
                    $data['idsubkategori'] = $idsubkategori;
                } else {
                    $template = 'form_content_nonsubmenu';
                    $id_kategori = $this->input->post('id_kategori');
                    $data['datarecord'] = $this->madminpanel->getdata('tbl_content', $id_kategori, 'N');
                    $data['id_kategori'] = $id_kategori;
                }
                $data['uid_textarea'] = md5(uniqid(rand(), true));
                break;
            case "get_formna":
                $param1 = $this->db->get('tbl_berita')->result_array();
                $template = 'form_berita_artikel';
                $data['news'] = $param1;
//                                print_r($param1);
                break;
            case "news_detail":
                $data['news'] = $this->db->get_where('tbl_berita', array('id' => $param1))->row_array();
                $data['comment'] = $this->db->get_where('tbl_news_comment', array('berita_id' => $param1))->result_array();
                $template = "berita_detail";
                break;

            case "rame":
                $data['mod'] = $param1;
                $template = "grid_rame";
                break;

            case 'multimedia':
                $data['param'] = $param1;
                $template = "multimedia";
                break;
				
            case 'file_multimedia':
                $type = $this->input->post('type');
                $html = "";
                if ($type == 'foto') {
                    $sql = $this->db->query("
						SELECT *
						FROM tbl_multimedia
						WHERE kategori_file = '1'
					")->result_array();
                    if ($sql) {
                        foreach ($sql as $k => $v) {
                            $html .= "
								<img src='" . base_url() . "repository/foto/gallery/" . $v['filename'] . "' style='width:150px;height:100px;margin-bottom:8px;' />
								<a href='#' title='Hapus Foto Ini' onClick='deletefoto(" . $v['id'] . ")'><img src='" . base_url() . "assets/images/close.png' style='margin-bottom:100px;margin-left:-20px;'></a>
							";
                        }
                    } else {
                        $html .= "<center><b><i>.:: Tidak Ada Data Foto ::.</i></b></center>";
                    }
                } elseif ($type == 'video') {
                    
                } elseif ($type == 'kadin') {
                    $html .= "
								<img src='" . base_url() . "repository/foto/kadin/kadin.jpg' style='width:150px;height:100px;margin-bottom:8px;' />
						
							";
                }

                echo $html;
                exit;
                break;
            case 'forum':
                $template = 'modul_forum';
                if ($param1 == 'forum_thread') {
                    $data['mod'] = "forum";
                } elseif ($param1 == 'forum_komentar') {
                    $data['mod'] = "forum_komentar";
                }
                break;
            case 'form_forum':
                $template = 'form_forum';
                if ($param1 == 'forum') {
                    $editstatus = $this->input->post('editstatus');
                    if ($editstatus == 'edit') {
                        $id = $this->input->post('id');
                        $datarecord = $this->madminpanel->getdata('tbl_forum_thread', $id);
                        $data['datarecord'] = $datarecord;
                        $gakbisadiandelin = $this->db->get_where('tbl_forum_map', array('forumid' => $datarecord->forumid))->result_array();
                    }
                    $data['uid_textarea'] = md5(uniqid(rand(), true));
                    $data['combo_categori'] = $this->combobox('category_forum', 'return', ($editstatus == 'edit' ? $gakbisadiandelin[0]['parent'] : ''));
                    $data['mod'] = "forum";
                    $data['editstatus'] = $editstatus;
                }
                break;

            /* case 'potensi':
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
              break; */
        }

        $this->load->view('adminpanel/konten/' . $template, $data);
    }

    function savedata($type = '', $editstatus = '') {
        $post = array();
        foreach ($_POST as $k => $v)
            $post[$k] = $this->input->post($k);

        echo $this->madminpanel->savedata($post, $type, $editstatus);
    }

    function combobox($type, $balikan = '', $param = "", $param2 = '') {
        $optTemp = "";
        if ($param != "") {
            $p2 = $param;
        } else {
            $p2 = "";
        }

        if ($type == 'subkategori' || $type == 'category_forum' || $type == 'subforum') {
            $data = $this->madminpanel->getdata($type, $param2);
        }

        $optTemp .= "<option value=''>-- Pilih --</option>";
        foreach ($data as $v => $k) {
            if ($p2 == $k['code']) {
                $optTemp .= "<option selected value='" . $k['code'] . "'>" . $k['value'] . "</option>";
            } else {
                $optTemp .= "<option value='" . $k['code'] . "'>" . $k['value'] . "</option>";
            }
        }

        if ($balikan == 'echo') {
            echo $optTemp;
        } elseif ($balikan == 'return') {
            return $optTemp;
        }
    }

    function get_data($p1 = "") {
        echo $this->madminpanel->get_data($p1);
    }

    function get_formna($p1 = "") {
        $data['mod'] = $p1;
        $data['sts'] = $this->input->post('sts');
        $template = "form_rame";
        //	echo $p1;exit;
        switch ($p1) {
            case "penduduk":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_kependudukan', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "luas_wil":
                $data['kecamatan'] = $this->db->get('cl_kecamatan')->result_array();
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_luas_wilayah_kecamatan', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "jml_kel":
                $data['kecamatan'] = $this->db->get('cl_kecamatan')->result_array();
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_jml_kelurahan', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "tumbuh_penduduk":
                //$data['kecamatan']=$this->db->get('cl_kecamatan')->result_array();
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_pertumbuhan_penduduk', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "makro_ekonomi":
                //$data['kecamatan']=$this->db->get('cl_kecamatan')->result_array();
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_makro_pertumbuhan_ekonomi', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "perbankan":
                //$data['kecamatan']=$this->db->get('cl_kecamatan')->result_array();
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_perbankan', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "pad":
                //$data['kecamatan']=$this->db->get('cl_kecamatan')->result_array();
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_pad', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "rata_ekonomi":
                $data['kabkota'] = $this->db->get_where('cl_kab_kota', array('KODE_PROPINSI' => '73'))->result_array();
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_rata2_ekonomi', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "headline":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_headline', array('id' => $this->input->post('id')))->row();
                }

                //print_r($data['data']);
                break;

            case "potensi":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_komoditi_value', array('id' => $this->input->post('id')))->row();
                }
                $data['komoditi'] = $this->db->get('cl_komoditi')->result_array();
                break;
            case "pdrb":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_pdrb', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "ekonomi":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_pertumbuhan_ekonomi', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "berita":
                if ($data['sts'] == 'edit') {
                    $sql = "SELECT A.*,date(tanggal)as tgl,time(tanggal)as jam from tbl_berita A WHERE A.id=" . $this->input->post('id');
                    $data['data'] = $this->db->query($sql)->row();
                }
                break;
            case "kondisi_jalan":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_kondisi_jalan', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "panjang_jalan":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_panjang_jalan', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "kendaraan_uji":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_kendaraan_uji_dephub', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "kapal_pelayaran":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_kunjungan_kapal', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "kapal_tambatan":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_kunjungan_kapal_tambatan', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "petikemas_dn":
            case "petikemas_ln":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_arus_petikemas', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "telp":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_sambungan_telp', array('id' => $this->input->post('id')))->row();
                }
                break;
            case "user":
                if ($data['sts'] == 'edit') {
                    $data['data'] = $this->db->get_where('tbl_user', array('user_id' => $this->input->post('id')))->row();
                }
                break;
            case "profil_kota":
                unset($data['sts']);
                $data['sts'] = 'edit';
                //if($data['sts']=='edit'){
                $data['data'] = $this->db->get_where('tbl_profil', array('kategori' => 'kota'))->row();
                //}
                break;

            case "profil_dinas":
                unset($data['sts']);
                $data['sts'] = 'edit';
                //if($data['sts']=='edit'){
                $data['data'] = $this->db->get_where('tbl_profil', array('kategori' => 'dinas'))->row();
                //}
                break;
        }

        $this->load->view('adminpanel/konten/' . $template, $data);
    }

    function simpan_na($p1 = "") {

        $post = array();
        foreach ($_POST as $k => $v)
            $post[$k] = $this->input->post($k);
        if ($p1 == 'berita') {
            $upload = $this->upload('berita');
            if ($upload["msg"] == 1) {
                if ($upload["name"] != '') {
                    $post['gambar'] = $upload["name"];
                } else {
                    unset($post['gambar']);
                }
                echo $this->madminpanel->simpan_na($p1, $post);
            }
        } else {
            echo $this->madminpanel->simpan_na($p1, $post);
        }
    }

    function hapus($p1) {
        echo $this->madminpanel->hapus_na($p1);
    }

    function upload($p1 = "", $p2 = "", $p3 = "") {

        $date = date('YmdHis');
        $data = array();
        switch ($p1) {
            case "berita":
                $fileElementName = 'gambar';
                $upload_dir = "repository/foto/berita/";
                $newFilename = $date;
                break;
        }
        //print_r($_FILES);exit;
        //if(count($_FILES)>0){
        if ($_FILES[$fileElementName]['name'] != '') {
            $fName = $_FILES[$fileElementName]['tmp_name'];
            //echo $fName;exit;
            $fSize = @filesize($_FILES[$fileElementName]['tmp_name']);
            @unlink($_FILES[$fileElementName]);
            $filename = basename($_FILES[$fileElementName]['name']);
            $tmp = explode(".", $filename);
            $newFilename .= '.' . $tmp[1];
            $uploadfile = $upload_dir . $newFilename;
            if (!file_exists($upload_dir))
                mkdir($upload_dir, 0777, true);
            if (file_exists($uploadfile)) {
                chmod($uploadfile, 0777);
                unlink($uploadfile);
            }


            move_uploaded_file($_FILES[$fileElementName]['tmp_name'], $uploadfile);

            if (!chmod($uploadfile, 0775)) {
                $data["msg"] = 2;
                $data["name"] = "";
                echo json_encode($data);
                exit;
            } else {
                $data["msg"] = 1;
                $data["name"] = $newFilename;
                return $data;
            }
        } else {
            $data["msg"] = 1;
            $data["name"] = '';
            return $data;
        }
    }
    
    function publish_news($id=NULL){
        $this->db->update('tbl_news_comment', array('comment_is_publish' => 1), array('comment_id'=>$id));
        redirect(site_url('adminpanel'));
    }


}
