<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helpers('url_helper');
        $this->load->model('select_model');
        $this->load->model('user_model');
    }

    function getJsondata($url) {
        header('Content-type: application/json');
        $Data = json_decode(file_get_contents($url), true);
        return $Data;
    }

    function getJsondatafromString($contents) {
        header('Content-type: application/json');
        $Data = json_decode($contents, true);
        return $Data;
    }

    public function index() {
        $data['view'] = 'member/index';
        $this->load->view('template/masterpage', $data);
    }

  

}