<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Dashboard controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Present extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model('Present_model');
        $this->load->model('Member_model');
    }

    // Dashboard View
    public function index($nip = 'all', $date_start = 'all', $date_end = 'all', $offset = NULL) {
        $this->load->library('pagination');
        if ($_POST) {
            $filter = array(
                ($this->input->post('nip') == '') ? 'all' : $this->input->post('nip'),
                ($this->input->post('date_start') == '') ? 'all' : $this->input->post('date_start'),
                ($this->input->post('date_end') == '') ? 'all' : $this->input->post('date_end'),
            );
            $url = implode('/', $filter);
            redirect('admin/present/index/' . $url);
        }
        $params = array();
        if ($nip != 'all')
            $params['member_nip'] = $nip;
        if ($date_start != 'all')
            $params['date_start'] = $date_start;
        if ($date_end != 'all')
            $params['date_end'] = $date_end;
        $params_total = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;
        $data['present'] = $this->Present_model->get($params);


        $config['base_url'] = site_url('admin/present/index/' . $nip . '/' . $date_start . '/' . $date_end . '/' . $offset);
        $config['total_rows'] = count($this->Present_model->get($params_total));
        $this->pagination->initialize($config);

        $data['title'] = 'Kehadiran';
        $data['main'] = 'admin/present/present_list';
        $this->load->view('admin/layout', $data);
    }

    public function export() {
        $this->load->helper('csv');
        
//        if($nip != 'all'){
//            $params['member_nip'] = $nip;
//        }
        $data['present'] = $this->Present_model->get();
        $params = array();
        $csv = array(
            0 => array(
                'No.', 'NIP', 'Nama', 'Tanggal', 'Jam masuk', 'Jam keluar',
                'Kehadiran', 'Keterangan'
            )
        );
        $i = 1;
        foreach ($data['present'] as $row) {
            $csv[] = array( $i,
                $row['member_member_nip'], $row['member_full_name'], pretty_date($row['present_date'], 'd/m/Y', FALSE),
                $row['present_entry_time'], $row['present_out_time'], strip_tags($row['present_desc'], ($row['present_is_late'] == 1) ? 'Telat' : '-')
            );
            $i++;
        }
        array_to_csv($csv, 'rekapitulasi.csv');
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
