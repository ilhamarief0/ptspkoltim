<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_widget extends CI_Model{
  function __construct() {
    parent::__construct();
    $this->load->database();  
  }
  public function total_news(){
    $query  = $this->db->query("SELECT * FROM news_tbl");
    return $query->num_rows();
  }
  public function total_aduan(){
    $query  = $this->db->query("SELECT * FROM aduan_tbl");
    return $query->num_rows();
  }
	
	public function total_skpd(){
    $query  = $this->db->query("SELECT * FROM skpd_tbl");
    return $query->num_rows();
  }
	
	public function total_group(){
    $query  = $this->db->query("SELECT * FROM group_tbl");
    return $query->num_rows();
  }
  public function total_user(){
    $query  = $this->db->query("SELECT * FROM user_tbl");
    return $query->num_rows();
  }
  public function total_alur(){
    $query  = $this->db->query("SELECT * FROM plot_tbl");
    return $query->num_rows();
  }
  public function total_rules(){
    $query  = $this->db->query("SELECT * FROM rules_tbl");
    return $query->num_rows();
  }
  public function total_proper(){
    $query  = $this->db->query("SELECT * FROM proper_tbl");
    return $query->num_rows();
  }

  public function total_proper_terdaftar(){
    $query  = $this->db->query("SELECT * FROM proper_tbl WHERE proper_titik_kordinat !=''");
    return $query->num_rows();
  }
  
  function __destruct() {
    $this->db->close();
  }
}
?>