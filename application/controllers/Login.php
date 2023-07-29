<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // tampilkan halaman login
        $this->load->view("login");
    }

    public function doLogin(){
        if($this->user_model->doLogin($this->input->post('username'),$this->input->post('password'))){
            $url = 'sukses';
        }else{
            $url = 'gagal';
        }
        header('Content-Type: application/json');
        echo json_encode($url); 
    }
}