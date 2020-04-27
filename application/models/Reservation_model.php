<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getCampReservations($camp_id){
    $this->db->select('*');
    $this->db->from('reservation');
    $this->db->where('camp_id', $camp_id);
    return $this->db->get()->result_array();
  }

  public function getUserReservations($user_name){
    $this->db->select('*');
    $this->db->from('reservation');
    $this->db->where('user_name', $user_name);
    return $this->db->get()->result_array();
  }

  public function addReservation($insert_data){
    $this->db->insert('reservation', $insert_data);
    return $this->db->affected_rows();
  }

  public function deleteReservation($reservation_id){
    $this->db->where('reservation_id', $reservation_id);
    $this->db->delete('reservation');
    return $this->db->affected_rows();
  }


}