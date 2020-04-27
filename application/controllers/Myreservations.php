<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myreservations extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Reservation_model');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $user_name = $_SESSION['username'];
    $reservations = $this->Reservation_model->getUserReservations($user_name);
    $data['page'] = 'myreservations/reservations';
    $data['reservations'] = $reservations;

    $this->load->view('menu/content', $data);
  }

  

}