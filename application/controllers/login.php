<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = null;
        if ($_POST) {
            $input['username'] = $this->input->post('username');
            $input['password'] = $this->input->post('password');
            if ($this->user_model->getauthen($input)) {

                $data['user'] = $this->user_model->get_account_cookie();
                if ($data['user']['isview'] == 1 && $data['user']['isedit'] == 0 && $data['user']['user_zoneid'] != 1) {
                    redirect(base_url() . "member/member_insurance/" . $data['user']['user_empid']);
                } else {
                    redirect(base_url() . 'home');
                }
            } else {
                echo "<script> alert('You do not have a permission to using this application');</script>";
            }
        }


        $this->load->view('template/login', $data);
    }

}
