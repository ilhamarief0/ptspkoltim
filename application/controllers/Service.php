<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Controller {
  function __construct() {
    parent::__construct();
    //error_reporting(0);
    $this->load->model("m_service");
    $this->load->model("m_service_category");
    $this->load->model("m_setting");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['service'] = $this->m_service->fetch_data();
    $data['jenis']   = $this->m_service_category->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/service/service", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function add() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['jenis']   = $this->m_service_category->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/service/service_add", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function update() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['jenis']   = $this->m_service_category->fetch_data();
    $data['service']    = $this->m_service->get($this->uri->segment(3));
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/service/service_edit", $data);
    $this->load->view("attribute/footer", $setting);
  }

  
  
  public function input() {
    $filename                = date('YmdHis').rand(1000,99999);
    $config['upload_path']   = './upload/service/';
    $config['allowed_types'] = "png|jpg|jpeg|doc|docx|xls|xlsx|pdf";
    $config['overwrite']     = "true";
    $config['max_size']      = "20000000000";
    $config['max_width']     = "10000";
    $config['max_height']    = "10000";
    $config['file_name']     = 'service-'.$this->input->post('service_category_id').'-'. $filename;

    $this->upload->initialize($config);
      
    if (!$this->upload->do_upload()) {
      echo $this->upload->display_errors();
      
    } else {

      $dat                           = $this->upload->data();
      $data['service_id']               = "";
      $data['service_title']            = $this->input->post('service_title');
      $data['service_text']             = $this->input->post('service_text');
      $data['service_picture']          = $dat['file_name'];
      $data['service_category_id']      = $this->input->post('service_category_id');
      $this->session->set_flashdata('add', 'Berhasil Tambah Berita ' . $data['service_title']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Menambah Data Berita ".$this->input->post('service_title');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_service->input($data);
    }
    
    redirect('service');
  }
  
  public function edit() {
    if ($_FILES['userfile']['name'] == '') {
      $data['service_id']             = $this->input->post('service_id');
      $data['service_title']          = $this->input->post('service_title');
      $data['service_text']           = $this->input->post('service_text');
      $data['service_category_id']    = $this->input->post('service_category_id');
      $this->session->set_flashdata('update', 'Berhasil Update Berita ' . $data['service_title']);

      $log['log_id']      = "";
      $log['log_time']    = date('Y-m-d H:i:s');
      $log['log_message'] = "Mengubah Data service ".$this->input->post('service_title');
      $log['user_id']     = $this->session->userdata('user_id');
      $this->m_setting->create_log($log);
      
      $this->m_service->edit($data);

    }else{
      $filename                = date('YmdHis').rand(1000,99999);
      $config['upload_path']   = './upload/service/';
      $config['allowed_types'] = "png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'service-'.$this->input->post('service_category_id').'-'. $filename;

      $this->upload->initialize($config);
        
      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
        
      } else {
        unlink("./upload/service/".$this->input->post('service_picture'));
        $dat                          = $this->upload->data();
        $data['service_id']              = $this->input->post('service_id');
        $data['service_title']           = $this->input->post('service_title');
        $data['service_text']            = $this->input->post('service_text');
        $data['service_author']          = $this->input->post('service_author');
        $data['service_date']            = $this->input->post('service_date');
        $data['service_picture']         = $dat['file_name'];
        $data['service_category_id']     = $this->input->post('service_category_id');
        $this->session->set_flashdata('update', 'Berhasil Update service ' . $data['service_title']);

        $log['log_id']      = "";
        $log['log_time']    = date('Y-m-d H:i:s');
        $log['log_message'] = "Mengubah Data service ".$this->input->post('service_title');
        $log['user_id']     = $this->session->userdata('user_id');
        $this->m_setting->create_log($log);
        
        $this->m_service->edit($data);
      }
    }

    redirect('service');
      
  }
  
  public function delete() {
    $this->m_service->delete($this->input->post('service_id'));
    unlink("./upload/service/".$this->input->post('service_picture'));
    $this->session->set_flashdata('delete', 'service ' . $this->input->post('service_title')." telah dihapus !");


    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data service ".$this->input->post('service_title');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    redirect('service');
  }

  
}
?>
