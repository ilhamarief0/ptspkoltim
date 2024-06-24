<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_service extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('service_tbl a');
    $this->db->join('service_category_tbl b','a.service_category_id=b.service_category_id','LEFT');
    $this->db->order_by("a.service_id", "asc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_last() {
    $this->db->select('*');
    $this->db->from('service_tbl a');
    $this->db->join('service_category_tbl b','a.service_category_id=b.service_category_id','LEFT');
    $this->db->order_by("a.service_id", "asc");
    $this->db->limit(4);
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
    $this->db->from('service_tbl a');
    $this->db->join('service_category_tbl b','a.service_category_id=b.service_category_id','LEFT');
    $this->db->where('a.service_id', $id);
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
    $this->db->insert('service_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('service_tbl', $data, array(
      'service_id' => $data['service_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('service_tbl', array('service_id' => $id));
  }  
}
?>
