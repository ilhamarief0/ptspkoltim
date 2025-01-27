<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service_category extends CI_Controller {

  function __construct() {

    parent::__construct();

    error_reporting(0);

    $this->load->model("m_service_category");

    $this->load->model("m_setting");

    if (!($this->session->userdata('user_id'))) {

      redirect('home');

    }

  }

  

  public function index() {

    $setting['settings_app'] = $this->m_setting->fetch_setting();

    $data['service_category'] = $this->m_service_category->fetch_data();

    $this->load->view("attribute/header",$setting);

    $this->load->view("attribute/menus",$setting);

    $this->load->view("admin/master_data/service/service_category", $data);

    $this->load->view("attribute/footer",$setting);

  }



  

  

  public function input() {

    $data['service_category_id']    = "";

    $data['service_category_name']  = $this->input->post('service_category_name');

    $this->session->set_flashdata('add', 'Berhasil Tambah Jenis Berita ' . $data['service_category_name']);



    $log['log_id']      = "";

    $log['log_time']    = date('Y-m-d H:i:s');

    $log['log_message'] = "Menambah Data Jenis Berita ".$this->input->post('service_category_name');

    $log['user_id']     = $this->session->userdata('user_id');

    $this->m_setting->create_log($log);

    

    $this->m_service_category->input($data);

    redirect('service_category');

  }

  

  public function edit() {

    $data['service_category_id']    = $this->input->post('service_category_id');

    $data['service_category_name']  = $this->input->post('service_category_name');

    $this->session->set_flashdata('update', 'Berhasil Update Jenis Berita ' . $data['service_category_name']);



    $log['log_id']      = "";

    $log['log_time']    = date('Y-m-d H:i:s');

    $log['log_message'] = "Mengubah Data Jenis Berita ".$this->input->post('service_category_name');

    $log['user_id']     = $this->session->userdata('user_id');

    $this->m_setting->create_log($log);

    

    $this->m_service_category->edit($data);

    redirect('service_category');

      

  }

  

  public function delete() {

    $this->m_service_category->delete($this->input->post('service_category_id'));

    $this->session->set_flashdata('delete', 'Jenis Berita ' . $this->input->post('service_category_name')." telah dihapus !");





    $log['log_id']      = "";

    $log['log_time']    = date('Y-m-d H:i:s');

    $log['log_message'] = "Menghapus Data Jenis Berita ".$this->input->post('service_category_name');

    $log['user_id']     = $this->session->userdata('user_id');

    $this->m_setting->create_log($log);

    redirect('service_category');

  }

  

}

?>