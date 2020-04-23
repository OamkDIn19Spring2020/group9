<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camp extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
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

}
