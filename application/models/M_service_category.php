<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_service_category extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('service_category_tbl');
    $this->db->order_by("service_category_id", "asc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function get($id) {
    $this->db->select('*');
    $this->db->from('service_category_tbl');
    $this->db->where('service_category_id', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }
  
  public function input($data) {
    $this->db->insert('service_category_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('service_category_tbl', $data, array(
      'service_category_id' => $data['service_category_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('service_category_tbl', array('service_category_id' => $id));
  }  
}
?>
