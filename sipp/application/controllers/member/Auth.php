<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Auth controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
        $this->load->helper('url');
    }

    function index() {
        redirect('member/auth/login');
    }

    function present($lokasi = '') {
        $this->load->model('Present_model');
        if ($this->session->userdata('logged_member')) {
            redirect('member');
        }

        if ($lokasi != '') {
            $lokasi = $this->input->post('location');
        } else {
            $lokasi = NULL;
        }
        $this->form_validation->set_rules('nip', 'Nip', 'trim|required');
        $this->form_validation->set_rules('desc', 'Keterangan', 'trim|required');
        if ($_POST AND $this->form_validation->run() == TRUE) {
            $nip = $this->input->post('nip', TRUE);
            $password = $this->input->post('password', TRUE);
            $desc = $this->input->post('desc', TRUE);
            $this->db->from('member');
            $this->db->where('member_nip', $nip);
            $this->db->where('member_status', TRUE);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $params['member_member_nip'] = $nip;
                $params['member_member_id'] = $query->row('member_id');
                $params['present_year'] = date('Y');
                $params['present_month'] = date('m');
                $params['present_date'] = date('Y-m-d');
                if ($desc == 0) {
                    $checkin = $this->Present_model->get(array('date' => date('Y-m-d'), 'member_nip' => $nip));
                    if (!empty($checkin)) {
                        $this->session->set_flashdata('failedpresent', 'Maaf, anda sudah mengisi jam kedatangan untuk hari ini');
                        header("Location:" . site_url('member/auth/login') . "?location=" . urlencode($lokasi));
                    } else {
                        if (date('H:i:s') > '08:15:59') {
                            $params['present_is_late'] = TRUE;
                        }
                        $params['present_desc'] = 'Hadir';
                        $params['present_entry_time'] = date('H:i:s');
                        $this->Present_model->add($params);
                        if ($lokasi != '') {
                            $this->session->set_flashdata('alert', 'Selamat datang, '.$query->row('member_full_name'). ' absen berhasil diinput.');
                            header("Location:" . site_url('member/auth/login') . "?location=" . urlencode($lokasi));
                        } else {
                            $this->session->set_flashdata('alert', 'Selamat datang, '.$query->row('member_full_name'). ' absen berhasil diinput.');
                            redirect('member/auth/login');
                        }
                    }
                } else {
                    if (date('H:i:s') < '17:00:00') {
                        $params['present_is_before'] = TRUE;
                    }
                    $checkout = $this->Present_model->get(array('date' => date('Y-m-d'), 'member_nip' => $nip));
                    if (empty($checkout)) {
                        $this->session->set_flashdata('failedpresent', 'Maaf, silahkan input jam kedatangan terlebih dahulu');
                        header("Location:" . site_url('member/auth/login') . "?location=" . urlencode($lokasi));
                    } else {
                        $params['present_id'] = $checkout['present_id'];
                        $params['present_out_time'] = date('H:i:s');
                        $this->Present_model->add($params);
                        if ($lokasi != '') {
                            $this->session->set_flashdata('alert', 'Selamat jalan, '.$query->row('member_full_name'). ' absen pulang berhasil diinput hati-hati dijalan.');
                            header("Location:" . site_url('member/auth/login') . "?location=" . urlencode($lokasi));
                        } else {
                            $this->session->set_flashdata('alert', 'Selamat jalan, '.$query->row('member_full_name'). ' absen pulang berhasil diinput hati-hati dijalan.');
                            redirect('member/auth/login');
                        }
                    }
                }
            } else {
                if ($lokasi != '') {
                    $this->session->set_flashdata('failedpresent', 'Sorry, username and password do not match');
                    header("Location:" . site_url('member/auth/login') . "?location=" . urlencode($lokasi));
                } else {
                    $this->session->set_flashdata('failedpresent', 'Sorry, username and password do not match');
                    redirect('member/auth/login');
                }
            }
        } else {
            $this->session->set_flashdata('failedpresent', 'Sorry, Nip, password and keterangan are not complete');
            header("Location:" . site_url('member/auth/login') . "?location=" . urlencode($lokasi));
        }
    }

    function login($lokasi = '') {
        $this->load->model('Posts_model');
        $this->load->model('Present_model');
        $this->load->helper('text');
        if ($this->session->userdata('logged_member')) {
            redirect('member');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $data['posts'] = $this->Posts_model->get(array('limit' => 3, 'status' => TRUE));
        $data['present'] = $this->Present_model->get(array('date' => date('Y-m-d'), 'limit' => 10));
        if ($_POST AND $this->form_validation->run() == TRUE) {
            if ($this->input->post('location')) {
                $lokasi = $this->input->post('location');
            } else {
                $lokasi = NULL;
            }
            $this->process_login($lokasi);
        } else {
            $this->load->view('member/login', $data);
        }
    }

    // Login Prosessing
    function process_login($lokasi = '') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $this->db->from('member');
            $this->db->where('username', $username);
            $this->db->where('password', sha1($password));
            $this->db->where('member_status', TRUE);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $this->session->set_userdata('logged_member', TRUE);
                $this->session->set_userdata('member_id', $query->row('member_id'));
                $this->session->set_userdata('member_name', $query->row('username'));
                $this->session->set_userdata('member_full_name', $query->row('member_full_name'));
                if ($lokasi != '') {
                    header("Location:" . htmlspecialchars($lokasi));
                } else {
                    redirect('member');
                }
            } else {
                if ($lokasi != '') {
                    $this->session->set_flashdata('failed', 'Sorry, username and password do not match');
                    header("Location:" . site_url('member/auth/login') . "?location=" . urlencode($lokasi));
                } else {
                    $this->session->set_flashdata('failed', 'Sorry, username and password do not match');
                    redirect('member/auth/login');
                }
            }
        } else {
            $this->session->set_flashdata('failed', 'Sorry, username and password are not complete');
            redirect('member/auth/login');
        }
    }

    // Logout Processing
    function logout() {
        $this->session->unset_userdata('logged_member');
        $this->session->unset_userdata('member_id');
        $this->session->unset_userdata('member_name');
        $this->session->unset_userdata('member_full_name');
        if ($this->input->post('location')) {
            $lokasi = $this->input->post('location');
        } else {
            $lokasi = NULL;
        }
        header("Location:" . $lokasi);
    }

}
