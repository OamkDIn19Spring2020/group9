<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Users_model');
  }

  function index()
  {
    $data['page'] = 'myaccount/account';
    $this->load->view('menu/content', $data);
  }

  public function update_username(){
    
    // Form validation
    $this->form_validation->set_rules('username','New Username', 'alpha_dash|required|min_length[4]|max_length[10]|is_unique[users.user_name]');
    $this->form_validation->set_message('is_unique', 'The %s is already taken');

    $data['new_username'] = $this->input->post('username');

    // Show error message in case input in invalid
    if($this->form_validation->run() == FALSE){
      $data['success'] = false;
      $data['error'] = validation_errors();
      $data['pass'] = $_SESSION['password'];
    }else{
      $data['success'] = true;
      $data['error'] = "";

      // Update users database
      $user_name = $_SESSION['username'];
      //$password = $this->Users_model->getPassword($user_name);
      $update_data = array(
        'user_name' => $this->input->post('username'),
        'pass' => $_SESSION['password']
      );
      $this->Users_model->updateUser($user_name, $update_data);
      
      $_SESSION['username'] = $this->input->post('username');
      
      
      $data['redirect'] = site_url('myaccount');
    }

    echo json_encode($data);
  }


  public function update_password(){
    // $data['current_pass'] = $this->input->post('current_pass');
    // $data['new_pass'] = $this->input->post('new_pass');
    // $data['conf_new_pass'] = $this->input->post('conf_new_pass');

    // Form validation
    $this->form_validation->set_rules('pass', 'Password', 'required');
    $this->form_validation->set_rules('current_pass', 'Current Password', 'matches[pass]');
    $this->form_validation->set_rules('new_pass', 'New Password', 'alpha_dash|required|min_length[6]');
    $this->form_validation->set_rules('conf_new_pass', 'Confirm New Password', 'matches[new_pass]');

    if($this->form_validation->run() == FALSE){
      $data['new_error'] = form_error('new_pass');
      $data['conf_new_error'] = form_error('conf_new_pass');
      $data['current_error'] = form_error('current_pass');
    } else{
      $user_name = $_SESSION['username'];
      $password = $this->input->post('new_pass');
      $update_data = array(
        'user_name' => $user_name,
        'pass' => $password
      );

      $this->Users_model->updateUser($user_name, $update_data);
      $_SESSION['password'] = $password;

      $data['redirect'] = site_url('myaccount');
    }
   

    echo json_encode($data);
  }

  public function delete_account(){
    $username = $_SESSION['username'];
    $this->Users_model->deleteAccount($username);

    $_SESSION['logged_in'] = false;
    $data['redirect'] = site_url('camp');

    echo json_encode($data);
  }

  

  
  
  
}