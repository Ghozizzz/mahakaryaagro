<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data['content']= "backend/index";
        $data['artikel']=$this->db->query("Select * From artikel order by id desc")->result();
        $this->load->view('layout_admin', $data);
    }

    public function add_on()
    {
        $data['content']= "backend/add_on";
        $data['artikel']=$this->db->query("Select * From add_on where jenis = 1 order by id desc")->result();
        $this->load->view('layout_admin', $data);
    }

    public function slider()
    {
        $data['content']= "backend/slider";
        $data['cms_header']=$this->db->query("Select * From cms where id = 1")->row_array();
        $data['slider']=$this->db->query("Select * From slider order by id desc")->result();
        $this->load->view('layout_admin', $data);
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }

    public function img_compress($data,$height,$width){
        $this->load->library('image_lib');

        $w = $data['image_width']; // original image's width
        $h = $data['image_height'];

        $source_ratio = $w/$h;
        $new_ratio = $width/$height;

        if($source_ratio != $new_ratio){

            $config['image_library']='gd2';
            $config['source_image']='./assets/img/upload/'.$data['orig_name'];
            $config['maintain_ratio'] = FALSE;

            if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))){
                $config['width'] = $w;
                $config['height'] = round($w/$new_ratio);
                $config['y_axis'] = round(($h - $config['height'])/2);
                $config['x_axis'] = 0;

            } else {

                $config['width'] = round($h * $new_ratio);
                $config['height'] = $h;
                $config['x_axis'] = round(($w - $config['width'])/2);
                $config['y_axis'] = 0;

            }
            $this->image_lib->initialize($config);
            $this->image_lib->crop();
            $this->image_lib->clear();
        }

        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/img/upload/'.$data['orig_name'];
        $config['new_image'] = './assets/img/upload/'.$data['orig_name'];
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;
        $this->image_lib->initialize($config);
    }

    public function save() {
        // print_r($this->input->post());die();
        $tgl_input = date('Y-m-d H:i:s');
        $judul = $this->input->post('judul');
        $img_name = ($this->input->post('img_name')!='')?$this->input->post('img_name'):'mahakaryaagro_item_'.date('dmHis');
        $this->db->trans_start();
        //Buat slug
        // print_r($this->input->post());die();
        $string=preg_replace('/[^a-zA-Z0-9'.'\s'. ']/u', '', $this->input->post('slug')); //filter karakter unik dan replace dengan kosong ('')
        $trim=trim($string); // hilangkan spasi berlebihan dengan fungsi trim
        $pre_slug=strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
        $slug=$pre_slug; // tambahkan ektensi .html pada slug
        
        $config['upload_path'] = './assets/images/artikel/';
        $config['file_name'] = $img_name;
        $config['allowed_types'] = 'jpg|png|jpeg|webp';
        $config['max_size'] = 2000;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('img_src')) {
            $header_image = '';
        } else {
            $data = $this->upload->data();

            $header_image = $data['orig_name'];
        }

        if($_FILES['banner_src']['name']){
            $banner_name = 'mahakaryaagro_item_banner_'.date('dmHis');
            $config['upload_path'] = './assets/images/artikel/';
            $config['file_name'] = $banner_name;
            $config['allowed_types'] = 'jpg|png|jpeg|webp';

            $config['max_size'] = 2000;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('banner_src')) {
                $data['error'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('flash_gagal', 'Data Gagal di Simpan : '.$this->upload->display_errors());
            } else {
                $data = $this->upload->data();

                $banner_image = $data['orig_name'];
                
                unlink("./assets/images/artikel/".$img_old['banner_src']);
            }
        }

            if(null !== $this->input->post('status')){
                $status = 1;
            }else{
                $status = 0;
            }
            $this->db->insert('artikel', array(
                'judul'=> $judul,
                'slug'=>$slug,
                'jenis'=>$this->input->post('jenis'),
                'banner_src'=>$banner_image,
                'img_src'=>$header_image,
                'img_name'=> $img_name,
                'img_desc'=> $this->input->post('img_desc'),
                'deskripsi'=> $this->input->post('deskripsi'),
                'meta_description'=> $this->input->post('meta_description'),
                'keywords'=> $this->input->post('keywords'),
                'status'=> $status,
                'created_at'=>$tgl_input
            ));
            $id = $this->db->insert_id();
            foreach ($this->input->post('artikel_terkait') as $v) {
                $this->db->insert('artikel_terkait', [
                    'id_utama' => $id,
                    'id_artikel' => $v
                ]);
            }
            $this->session->set_flashdata('flash_msg', 'Artikel Berhasil di Buat');

        if($this->db->trans_complete()){
            redirect('Admin/index'); 
        }
    }

    public function delete($id){
        $this->db->trans_start();

        $query = $this->db->delete('artikel',['id'=>$id]);
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Artikel Berhasil di Hapus');
            redirect('Admin/index'); 
        }
    }

    public function delete_addon($id){
        $this->db->trans_start();

        $query = $this->db->delete('add_on',['id'=>$id]);
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Add On Berhasil di Hapus');
            redirect('Admin/add_on'); 
        }
    }

    public function delete_slider($id){
        $this->db->trans_start();

        $img_old = $this->db->get_where('slider',['id' => $id])->row_array();
        unlink("./assets/images/upload/".$img_old['image']);
        $query = $this->db->delete('slider',['id'=>$id]);
        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'slider Berhasil di Hapus');
            redirect('Admin/slider'); 
        }
    }

    public function update() {
        $tgl_input = date('Y-m-d H:i:s');
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $this->db->trans_start();
        //Buat slug
        $string=preg_replace('/[^a-zA-Z0-9'.'\s'. ']/u', '', $this->input->post('slug')); //filter karakter unik dan replace dengan kosong ('')
        $trim=trim($string); // hilangkan spasi berlebihan dengan fungsi trim
        $pre_slug=strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
        $slug=$pre_slug; // tambahkan ektensi .html pada slug

        $img_old = $this->db->get_where('artikel',['id' => $id])->row_array();
        $header_image = $img_old['img_src'];
        $banner_image = $img_old['banner_src'];
        $img_name = $img_old['img_name'];

        $config['upload_path'] = './assets/images/artikel/';
        $config['allowed_types'] = 'jpg|png|jpeg|webp';
        $config['max_size'] = 2000;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if($_FILES['img_src']['name']){
            $img_name = 'mahakaryaagro_item_'.date('dmHis');
            $config['file_name'] = $img_name;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_src')) {
                $data = $this->upload->data();

                $header_image = $data['orig_name'];
                echo 'header '.$header_image.' | ';
                
                $delete_path = './assets/images/artikel/'.$img_old['img_src'];
                if(file_exists($delete_path)){
                    unlink($delete_path);
                }
            } else {
                $data['error'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('flash_gagal', 'Data Gagal di Simpan : '.$this->upload->display_errors());
            }
        }

        if($_FILES['banner_src']['name']){
            $banner_name = 'mahakaryaagro_item_banner_'.date('dmHis');
            $config['file_name'] = $banner_name;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('banner_src')) {
                $dataa = $this->upload->data();

                $banner_image = $dataa['orig_name'];
                echo 'banner '.$banner_image.' | ';
                
                $delete_path = './assets/images/artikel/'.$img_old['banner_src'];
                if(file_exists($delete_path)){
                    unlink($delete_path);
                }
            } else {
                $dataa['error'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('flash_gagal', 'Data Gagal di Simpan : '.$this->upload->display_errors());
            }
        }

            if(null !== $this->input->post('status')){
                $status = 1;
            }else{
                $status = 0;
            }

            $this->db->where('id', $id);
            $this->db->update('artikel', array(
                'judul'=> $judul,
                'slug'=>$slug,
                'jenis'=>$this->input->post('jenis'),
                'banner_src'=>$banner_image,
                'img_src'=>$header_image,
                'img_desc'=> $this->input->post('img_desc'),
                'deskripsi'=> $this->input->post('deskripsi'),
                'meta_description'=> $this->input->post('meta_description'),
                'keywords'=> $this->input->post('keywords'),
                'status'=> $status,
                'updated_at'=>$tgl_input
            ));
            $this->session->set_flashdata('flash_msg', 'Artikel Berhasil di Buat, ');

        if($this->db->trans_complete()){
            redirect('Admin/index'); 
        }
    }

    function edit($id){
        $data['type'] = 'edit';
        $data['header'] = $this->db->query("Select * from artikel where id =".$id)->row_array(); 
        $data['content']= "backend/form";
        
        $this->load->view('layout_admin', $data);
    }

    public function form()
    {
        $data['type'] = 'add';
        $data['artikel_terkait'] = $this->db->query("Select * from artikel where status = 1")->result();
        $data['content']= "backend/form";
        $this->load->view('layout_admin', $data);
    }

    function tinymce_upload() {
        $config['upload_path'] = './assets/images/artikel/';
        $config['file_name'] = 'mahakaryaagro_artikel_'.date('dmHis');
        $config['allowed_types'] = 'jpg|png|jpeg|webp';
        $config['max_size'] = 2000;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')) {
            $this->output->set_header('HTTP/1.0 500 Server Error');
            exit;
        } else {
            $data = $this->upload->data();
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode(['location' => base_url().'assets/images/artikel/'.$data['orig_name']]))
                ->_display();

            $this->db->insert('add_on', array(
                'jenis'=>2,//tiny cc upload section
                'src'=> $data['orig_name']
            ));
            exit;
        }
    }

    public function save_add_on() {
        $this->db->trans_start();

        $config['upload_path'] = './assets/images/upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|webp';
        $config['max_size'] = 2000;
        $config['file_name'] = 'mahakaryaagro_add_on_'.date('dmHis');
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('caption_image')) {
            $data['error'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('flash_gagal', 'Data Gagal di Simpan : '.$this->upload->display_errors());
        } else {
            $data = $this->upload->data();

            $this->db->insert('add_on', array(
                'jenis'=>1,//promo section
                'src'=> $data['orig_name']
            ));
            $this->session->set_flashdata('flash_msg', 'Data Berhasil di Simpan');
        }

        if($this->db->trans_complete()){
            redirect('Admin/add_on'); 
        }
    }

    public function save_slider() {
        $this->db->trans_start();

        $config['upload_path'] = './assets/images/upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|webp';
        $config['max_size'] = 2000;
        $config['file_name'] = 'mahakaryaagro_slider_'.date('dmHis');
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('caption_image')) {
            $data['error'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('flash_gagal', 'Data Gagal di Simpan : '.$this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            $orig_name = $data['orig_name'];
            $data = $this->crop_ratio_image($data);


            $this->db->insert('slider', array(
                'image'=> $orig_name,
            ));
            $this->session->set_flashdata('flash_msg', 'Data Berhasil di Simpan');
        }

        if($this->db->trans_complete()){
            redirect('Admin/slider'); 
        }
    }

    function edit_slider(){
        $id = $this->input->post('id');
        $data = $this->db->get_where('slider',['id' => $id])->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($data);       
    }

    public function crop_ratio_image($upload_data){
          $image_path = $upload_data['full_path'];

        // Load the image manipulation library
          $this->load->library('image_lib');

          // Set the configuration for image resizing or cropping
          $config['image_library'] = 'gd2';
          $config['source_image'] = $image_path;
          $config['maintain_ratio'] = FALSE;
          $config['width'] = 1200;
          $config['height'] = 800;

          // Calculate the crop position to maintain the 3:2 aspect ratio
          $width = $upload_data['image_width'];
          $height = $upload_data['image_height'];
          $target_ratio = 3 / 2;
          $current_ratio = $width / $height;

          if ($current_ratio > $target_ratio) {
            $config['x_axis'] = round(($width - ($height * $target_ratio)) / 2);
            $config['y_axis'] = 0;
            $config['width'] = round($height * $target_ratio);
            $config['height'] = $height;
          } else {
            $config['x_axis'] = 0;
            $config['y_axis'] = round(($height - ($width / $target_ratio)) / 2);
            $config['width'] = $width;
            $config['height'] = round($width / $target_ratio);
          }

          // Apply the resizing or cropping
          $this->image_lib->initialize($config);
          $this->image_lib->crop();
    }

    public function update_slider() {
        $this->db->trans_start();
        $id = $this->input->post('id');
        if($_FILES['caption_image']['name']){
            $img_old = $this->db->get_where('slider',['id' => $id])->row_array();
            unlink("./assets/images/upload/".$img_old['image']);
            $config['upload_path'] = './assets/images/upload/';
            $config['allowed_types'] = 'gif|jpg|jpeg|webp';

            $config['max_size'] = 2000;
            $config['file_name'] = 'mahakaryaagro_slider_'.date('dmHis');
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('caption_image')) {
                $data['error'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('flash_gagal', 'Data Gagal di Simpan : '.$this->upload->display_errors());
            } else {
                $data = $this->upload->data();
                $orig_name = $data['orig_name'];
                $data = $this->crop_ratio_image($data);

                $this->db->where('id',$id);
                $this->db->update('slider', array(
                    'image'=> $orig_name,
                ));
            }
            $this->session->set_flashdata('flash_msg', 'Data Berhasil di Simpan');
        }else{
            $this->session->set_flashdata('flash_msg', 'Data tidak ter-Simpan');
        }

        if($this->db->trans_complete()){
            redirect('Admin/slider'); 
        }
    }


    public function save_cms() {
        $this->db->trans_start();

        $this->db->where('id',$this->input->post('id'));
        $this->db->update('cms', array(
            'nama'=> $this->input->post('nama'),
        ));
        $this->session->set_flashdata('flash_msg', 'Data Berhasil di Simpan');

        if($this->db->trans_complete()){
            $this->session->set_flashdata('flash_msg', 'Data Berhasil di Simpan');
            redirect('Admin/slider'); 
        }else{

            $this->session->set_flashdata('flash_msg', 'Data Gagal di Simpan');
            redirect('Admin/slider'); 
        }
    }

}