<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('member/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model('User_model');
        $this->load->model('Activity_log_model');
        $this->load->helper(array('form', 'url'));
    }

    // User_customer view in list
    public function index($offset = NULL) {
        $id = $this->session->userdata('member_id');
        if ($this->User_model->get(array('id' => $id)) == NULL) {
            redirect('member/user');
        }
        $data['user'] = $this->User_model->get(array('id' => $id));
        $data['title'] = 'Detail Profil';
        $data['main'] = 'member/profile/profile_detail';
        $this->load->view('member/layout', $data);
    }

    // Add User_customer and Update
    public function edit($id = NULL) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('member_full_name', 'Nama Lengkap', 'trim|required|xss_clean');
        $this->form_validation->set_rules('member_phone', 'No. Tlp/HP', 'trim|required|xss_clean');
        $this->form_validation->set_rules('member_sex', 'Jenis Kelamin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('member_school', 'Asal Sekolah', 'trim|required|xss_clean');
        $this->form_validation->set_rules('member_mentor', 'Nama Pembimbing', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            $nip = $this->input->post('member_nip');
            $params['member_id'] = $this->input->post('member_id');
            $params['member_last_update'] = date('Y-m-d H:i:s');
            $params['member_full_name'] = stripslashes($this->input->post('member_full_name'));
            $params['member_sex'] = $this->input->post('member_sex');
            $params['member_birth_place'] = $this->input->post('member_birth_place');
            $params['member_birth_date'] = $this->input->post('member_birth_date');
            $params['member_school'] = $this->input->post('member_school');
            $params['member_phone'] = $this->input->post('member_phone');
            $params['member_address'] = $this->input->post('member_address');
            $params['member_mentor'] = $this->input->post('member_mentor');
            $params['member_division'] = $this->input->post('member_division');
            $status = $this->Member_model->add($params);

            if (!empty($_FILES['member_image']['name'])) {
                if ($this->input->post('cases_id')) {
                    $createdate = $this->input->post('member_input_date');
                } else {
                    $createdate = date('Y-m-d H:i');
                }
                $paramsupdate['member_image'] = $this->do_upload($name = 'member_image', $createdate, $nip);
            }
            $paramsupdate['member_id'] = $status;
            $this->Member_model->add($paramsupdate);

            $this->session->set_flashdata('success', $data['operation'] . ' Profil Berhasil');
            redirect('member/profile');
        } else {

            // Edit mode
            $data['user'] = $this->User_model->get(array('id' => $this->session->userdata('user_id')));
            $data['role'] = $this->User_model->get_role();
            $data['button'] = ($id == $this->session->userdata('user_id')) ? 'Ubah' : 'Reset';
            $data['title'] = $data['operation'] . ' Profil';
            $data['main'] = 'member/profile/profile_edit';
            $this->load->view('member/layout', $data);
        }
    }

    function cpw($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|xss_clean|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|xss_clean|min_length[6]|matches[user_password]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        if ($_POST AND $this->form_validation->run() == TRUE) {
            $id = $this->input->post('user_id');
            $params['user_password'] = sha1($this->input->post('user_password'));
            $status = $this->User_model->change_password($id, $params);

            $this->session->set_flashdata('success', 'Ubah Password Berhasil');
            redirect('member/profile');
        } else {
            if ($this->User_model->get(array('id' => $id)) == NULL) {
                redirect('member/profile');
            }
            $data['user'] = $this->User_model->get(array('id' => $id));
            $data['title'] = 'Ubah Password';
            $data['main'] = 'member/profile/change_pass';
            $this->load->view('member/layout', $data);
        }
    }

}

/* End of file user.php */
/* Location: ./application/controllers/ccp/user.php */
