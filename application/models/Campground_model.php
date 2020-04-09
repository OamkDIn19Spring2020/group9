<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campground_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getCampground()
  {
    $this->db->select('*');
    $this->db->from('campground');
    return $this->db->get()->result_array();
  }

  public function getUserCampground($user_name)
  {
    $this->db->select('*');
    $this->db->from('campground');
    $this->db->where('user_name', $user_name);

    return $this->db->get()->result_array();

  }

  public function addCampground($insert_data)
  {
    $this->db->insert('campground', $insert_data);
    return $this->db->affected_rows();
  }

  public function updateCampground($camp_id, $update_data)
  {
      $this->db->where('camp_id', $camp_id);
      $this->db->update('campground', $update_data);
      return $this->db->affected_rows();
  }

  public function deleteCampground($camp_id)
  {
      $this->db->where('camp_id', $camp_id);
      $this->db->delete('campground');
      return $this->db->affected_rows();
  }

  

}
