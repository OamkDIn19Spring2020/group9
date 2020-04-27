<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camp extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Reservation_model');
    $this->load->model('Campground_model');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['campsites'] = $this->Campground_model->getCampground();
    $data['page'] = 'camp/home'; 
    $this->load->view('menu/content', $data);
  }

  public function show_campgrounds(){
    $data['page'] = 'camp/show_campgrounds';
    $this->load->view('menu/content', $data);
  }

  public function show_campsite($campname = null){
    $data['page'] = 'camp/show_campsite';
    $data['groundname'] = $campname;
    $this->load->view('menu/content', $data);
  }

  public function reserve_camp(){
    $insert_data = array(
      'start' => $this->input->post('from'),
      'end' => $this->input->post('to'),
      'price' => $this->input->post('price'),
      'camp_id' => $this->input->post('camp_id'),
      'user_name' => $this->input->post('user_name')
    );
    $this->Reservation_model->addReservation($insert_data);

    $data['page'] = 'camp/receipt';
    $data['info'] = $insert_data;
    $this->load->view('menu/content', $data);
  }

}
