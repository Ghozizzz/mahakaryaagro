<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }

    // public function send(){
    //     $this->load->library('mailer');
    //     $email = $this->input->post('email');
    //     $content = $this->load->view('content', array(
    //         'nama'=>$this->input->post('name'),
    //         'email'=>$this->input->post('email'),
    //         'telp'=>$this->input->post('phone'),
    //         'message'=>$this->input->post('message')
    //         ), true); // Ambil isi file content.php dan masukan ke variabel $content
    //     $sendmail = array(
    //       'email'=>$email,
    //       'content'=>$content,
    //     );
    //     $send = $this->mailer->send($sendmail);
    //     echo "<b>".$send['status']."</b><br />";
    //     echo $send['message'];
    //     echo "<br /><a href='".base_url("index.php/email")."'>Kembali ke Form</a>";

    //     // redirect('kontak');
    // }

    public function send(){
        $this->load->library('email');
        $this->email->from($this->input->post('email'), $this->input->post('name'));
        $this->email->to('support@mahakaryaagropertiwi.co.id','Mahakarya Agro');
        $this->email->subject('Email from Mahakarya Agro Website');
        $content = $this->load->view('content', array(
            'nama'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'telp'=>$this->input->post('phone'),
            'message'=>$this->input->post('message')
            ), true);
        $this->email->message($content);
        if($this->email->send()){
            $nama = $this->input->post('nama');
            $this->session->set_flashdata('nama',$nama);
            redirect('sukses');
        }else{
            show_error($this->email->print_debugger());
        }
    }
}