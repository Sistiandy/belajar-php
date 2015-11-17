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

    function login() {
        $this->load->model('Posts_model');
        $this->load->helper('text');
        if ($this->session->userdata('logged_member')) {
            redirect('member');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $data['posts'] = $this->Posts_model->get(array('limit' => 3, 'status' => TRUE));
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
            $this->db->where('user_status', TRUE);
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
