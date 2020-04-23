<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getUsers(){
    $this->db->select('*');
    $this->db->from('users');
    return $this->db->get()->result_array();
  }

  public function getPassword($user_name){
    $this->db->select('pass');
    $this->db->from('users');
    $this->db->where('user_name', $user_name);
    return $this->db->get()->result_array();
  }

  public function addUser($insert_data){
    $this->db->insert('users', $insert_data);
    return $this->db->affected_rows();
  }

  public function updateUser($user_name, $update_data){
    $this->db->where('user_name', $user_name);
    $this->db->update('users', $update_data);
    return $this->db->affected_rows();
  }

  public function deleteAccount($user_name){
    $this->db->where('user_name', $user_name);
    $this->db->delete('users');
    return $this->db->affected_rows();
  }


}
