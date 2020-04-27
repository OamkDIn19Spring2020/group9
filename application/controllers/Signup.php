<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Users_model');
  }

  function index()
  {
    // FORM VALIDATION
    $this->form_validation->set_rules('username','Username', 'alpha_dash|required|min_length[4]|max_length[10]|is_unique[users.user_name]');
    $this->form_validation->set_message('is_unique', 'The %s is already taken');

    $this->form_validation->set_rules('password', 'Password', 'alpha_dash|required|min_length[6]');
    $this->form_validation->set_rules('confpassword', 'Confpassword', 'matches[password]');

    // Keep displaying sign up page untill form is submited succesfully
    if($this->form_validation->run() == FALSE){
      $data['page'] = 'login/signup_form';
      $this->load->view('menu/content', $data);
    } else{
      // Add user to database
      $insert_data = array(
        'user_name' => $this->input->post('username'),
        'pass' => $this->input->post('password'));
      $this->Users_model->addUser($insert_data);

      // Initialize session
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $insert_data['user_name'];
      $_SESSION['password'] = $insert_data['pass'];

      // Redirect to 'success' page
      $data['page'] = 'login/signup_success';
      $this->load->view('menu/content', $data);
      
    }

  }

}
