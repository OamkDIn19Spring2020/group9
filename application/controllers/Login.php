<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Users_model');
  }

  function index()
  {
    $data['page'] = 'login/login_form';
    $this->load->view('menu/content', $data);
  }

  public function login(){
    $given_username=$this->input->post('username');
    $given_password=$this->input->post('password');

    $realPassword = $this->Users_model->getPassword($given_username);
    $realPassword = reset($realPassword[0]);
    echo $realPassword;

    // succesfully login
    if($realPassword == $given_password){
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $given_username;
      redirect('camp');

    // unsuccesful
    }else{
      $_SESSION['logged_in'] = false;
      redirect('camp');
    }

  }

  public function logout(){
    $_SESSION['logged_in'] = false;
    redirect('camp');
  }



}
