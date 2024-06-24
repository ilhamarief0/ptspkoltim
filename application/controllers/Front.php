<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_employee");
    $this->load->model("m_rules");
    $this->load->model("m_news");
    $this->load->model("m_plot");
    $this->load->model("m_news_category");
    $this->load->model("m_aduan");
    $this->load->model("m_widget");
    $this->load->model("m_proper");
    $this->load->model("m_user");
    $this->load->model("m_service");
    $this->load->model("m_service_category");
    $this->load->model("m_rules");
    $this->load->model("m_rules_category");
    $this->load->model("m_setting");
  }
  
  public function index() {

    $visit['visit_id']      ="";
    $visit['visit_date']    =date('Y-m-d H:i:s');
    $this->m_setting->create_visit($visit);

    $data['employee'] = $this->m_employee->fetch_data();
    $data['rules']    = $this->m_rules->fetch_data_last();
    $data['news']     = $this->m_news->fetch_data_last();
    $data['total_aduan']      = $this->m_widget->total_aduan();
    $data['total_alur']       = $this->m_widget->total_alur();
    $data['total_rules']      = $this->m_widget->total_rules();
    $data['total_proper']     = $this->m_widget->total_proper_terdaftar();
    $this->load->view("attribute/front2/index",$data);
  }
  /*Profil*/
  public function visi_misi() {
    $this->load->view("attribute/attribute/front2/header");
    $this->load->view("attribute/attribute/front2/profil/visi_misi");
    $this->load->view("attribute/attribute/front2/footer");
  }
  public function struktur_organisasi() {
    $this->load->view("attribute/attribute/front2/header");
    $this->load->view("attribute/attribute/front2/profil/struktur_organisasi");
    $this->load->view("attribute/attribute/front2/footer");
  }
  public function profil_pejabat() {
    $data['employee'] = $this->m_employee->fetch_data();
    $this->load->view("attribute/attribute/front2/header");
    $this->load->view("attribute/attribute/front2/profil/profil_pejabat",$data);
    $this->load->view("attribute/attribute/front2/footer");
  }
  /*Alur*/
  public function alur() {
    $data['alur'] = $this->m_plot->fetch_data();
    $this->load->view("attribute/attribute/front2/header");
    $this->load->view("attribute/attribute/front2/alur/alur",$data);
    $this->load->view("attribute/attribute/front2/footer");
  }
  /*Regulasi*/
  public function regulasi() {
    $data['regulasi'] = $this->m_rules_category->fetch_data();
    $this->load->view("attribute/attribute/front2/header");
    $this->load->view("attribute/attribute/front2/regulasi/regulasi",$data);
    $this->load->view("attribute/attribute/front2/footer");
  }
  public function regulasi_detail() {
    $data['regulasi'] = $this->m_rules->getAll($this->uri->segment(3));
    $this->load->view("attribute/attribute/front2/header");
    $this->load->view("attribute/attribute/front2/regulasi/regulasi_detail",$data);
    $this->load->view("attribute/attribute/front2/footer");
  }
  /*Berita*/
  // public function berita() {
  //   $data['berita'] = $this->m_news->fetch_data();
  //   $this->load->view("attribute/attribute/front2/header");
  //   $this->load->view("attribute/attribute/front2/berita/berita",$data);
  //   $this->load->view("attribute/attribute/front2/footer");
  // }
  public function detailberita() {
    $data['news'] = $this->m_news->get($this->uri->segment(3));
    $data['news_category'] = $this->m_news_category->fetch_data();
    $this->load->view("attribute/front2/header");
    $this->load->view("attribute/front2/detailberita",$data);
    $this->load->view("attribute/front2/footer");
  }

  public function profil(){

		$data[ "page_title" ] = "Profil";
		$this->load->view( "attribute/front2/header", $data);
		$this->load->view( "attribute/front2/profil", $data);
		$this->load->view( "attribute/front2/footer", $data);

	}

	public function visimisi(){

		$data[ "page_title" ] = "Visi Misi";
		$this->load->view( "attribute/front2/header", $data);
		$this->load->view( "attribute/front2/visi-misi", $data);
		$this->load->view( "attribute/front2/footer", $data);

	}

	public function struktur(){

		$data[ "page_title" ] = "Struktur";
		$this->load->view( "attribute/front2/header", $data);
		$this->load->view( "attribute/front2/struktur", $data);
		$this->load->view( "attribute/front2/footer", $data);

	}

	public function layanan(){

    $data[ "page_title" ] = "Struktur";
    $data['service'] = $this->m_service->fetch_data();
    $data['service_category'] = $this->m_service_category->fetch_data();
		$this->load->view( "attribute/front2/header", $data);
		$this->load->view( "attribute/front2/layanan", $data);
		$this->load->view( "attribute/front2/footer", $data);

	}

	public function peraturan(){

    
    $data[ "page_title" ] = "Peraturan";
    $data['rules'] = $this->m_rules->fetch_data();
    $data['rules_category'] = $this->m_rules_category->fetch_data();
		$this->load->view( "attribute/front2/header", $data);
		$this->load->view( "attribute/front2/peraturan", $data);
		$this->load->view( "attribute/front2/footer", $data);

	}

	public function berita(){

    $data[ "page_title" ] = "Berita";
    $data['news'] = $this->m_news->fetch_data();
    $data['news_category'] = $this->m_news_category->fetch_data();
		$this->load->view( "attribute/front2/header", $data);
		$this->load->view( "attribute/front2/berita", $data);
		$this->load->view( "attribute/front2/footer", $data);

  }
  
  public function beritacategory(){

    $data[ "page_title" ] = "Kategori Berita";
    $data['news'] = $this->m_news->getByCategory($this->uri->segment(3));
    $data['news_category'] = $this->m_news_category->fetch_data();
		$this->load->view( "attribute/front2/header", $data);
		$this->load->view( "attribute/front2/beritacategory", $data);
		$this->load->view( "attribute/front2/footer", $data);

	}

	public function kontak(){

		$data[ "page_title" ] = "Kontak";
		$this->load->view( "attribute/front2/header", $data);
		$this->load->view( "attribute/front2/kontak", $data);
		$this->load->view( "attribute/front2/footer", $data);

	}
  
  
  
  
  
}
?>