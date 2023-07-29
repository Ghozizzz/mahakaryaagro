<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  private function lang_seo(){
          $data['title'] = 'Mahakarya Agro Pertiwi';
          $data['description'] = 'Animal Health Company';
          $data['keywords'] = 'Animal Health';
          return $data;
  }

	public function index(){
          $data = $this->lang_seo();
          $data['content'] = "frontend/index";
          $data['cms'] = $this->db->query("Select * From cms where id = 1")->row_array();
          $data['artikel'] = $this->db->query("Select * From artikel where status = 1")->result();
          $data['slider'] = $this->db->query("Select * From slider order by id desc")->result();
          $this->load->view('layout', $data);
	}

	public function about(){
          $data['title'] = $this->lang->line('title_about');
          $data['description'] = $this->lang->line('description_about');
          $data['keywords'] = $this->lang->line('keywords_about');
          $data['artikel'] = $this->db->query("Select * From artikel where status = 1")->result();
          $data['content']= "frontend/about";
          $this->load->view('layout', $data);
	}

	public function kontak(){
          $data['title'] = $this->lang->line('title_kontak');
          $data['description'] = $this->lang->line('description_kontak');
          $data['keywords'] = $this->lang->line('keywords_kontak');
          $data['artikel'] = $this->db->query("Select * From artikel where status = 1")->result();
          $data['content']= "frontend/kontak";
          $this->load->view('layout', $data);
	}

  public function news(){
          $data['title'] = $this->lang->line('title_news');
          $data['description'] = $this->lang->line('description_news');
          $data['keywords'] = $this->lang->line('keywords_news');
          $data['artikel'] = $this->db->query("Select * From artikel where status = 1")->result();
          $data['content']= "frontend/news";
          $this->load->view('layout', $data);
  }

	public function sukses(){
    $data = $this->lang_seo();
		$data['nama'] = $this->session->flashdata('nama');
		$data['content']= "frontend/sukses";
		$this->load->view('layout', $data);
	}

	public function artikel(){
    $data['title'] = $this->lang->line('title_pajak');
    $data['description'] = $this->lang->line('description_pajak');
    $data['keywords'] = $this->lang->line('keywords_pajak');
    $this->load->model("user_model");
    $data['content']= "frontend/artikel";
    $data['list'] = $this->user_model->data(0,10)->result();
    // $data['list']= $this->db->query("Select * From artikel where status = 1 and jenis = 0 order by id desc limit 10")->result();
    $this->load->view('layout', $data);
	}

	public function artikel_view($slug){
    $artikel= $this->db->query("Select * From artikel where slug ='".$slug."'")->row_array();
    $data['title'] = $artikel['judul'];
    $data['description'] = $artikel['meta_description'];
    $data['keywords'] = $artikel['keywords'];

    $data['side_category']= $this->db->query("Select * From artikel where status = 1 order by judul")->result();
    $data['artikel'] = $this->db->query("Select * From artikel where status = 1")->result();

    $data['data'] = $artikel;
    $data['content']= "frontend/artikel_view";
    $this->load->view('layout', $data);
	}

        public function load_more(){ 
                $data = [];
                $data['html'] = '';

                $start = $this->input->post('start');
                $end = $this->input->post('end');

                $this->load->model("user_model");
                $items = $this->user_model->data($start,$end)->result();
                if(empty($items)){
                  $data['html'] .= '
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 card-col">
                        <strong>Data Not Found ...</strong>
                    </div>';
                }else{
                     foreach($items as $v){
                        $data['html'] .= '
                          <div class="well" style="display:none">
                            <div class="row">
                              <div class="col-md-4">
                                <img class="roomy-10 judul_artikel_img" src="'.base_url().'/assets/images/artikel/'.$v->img_src.'" alt="'.$v->img_desc.'">
                              </div>
                              <div class="col-md-8">
                                <a class="judul_artikel_list" href="'.base_url().'belajar-pajak/'.$v->slug.'">
                                  <h2><b>'.$v->judul.'</b></h2>
                                </a>
                                <div class="artikel_isi">
                                  '.substr($v->deskripsi, 0, 200).' ...
                                </div>
                                <ul class="list-inline list-unstyled fl_left roomy-10">
                                  <li><span class="created_at"><i class="fa fa-calendar fa"></i> '.$v->created_at.'</span></li>
                                </ul>
                                <p class="fl_right text-right roomy-10"><a class="btn btn-primary btn-small" href="'.base_url().'belajar-pajak/'.$v->slug.'">Baca Selengkapnya</a></p>
                              </div>
                            </div>
                          </div>';
                     }
                }
                $data['response'] = [
                  'error' => 0,
                  'message' => 'Sukses',          
                ];
                echo json_encode($data);
        }

        public function search(){
                $data = $this->lang_seo();
                $new = str_replace('%20', ' ', $this->uri->segment(2));
                $query = $this->db->query("Select * from artikel where judul like '%".$new."%'");
                $data['data'] = $query->result();
                $data['num_rows'] = $query->num_rows();
                $data['content']= "frontend/search";
                $this->load->view('layout', $data);
        }
}
