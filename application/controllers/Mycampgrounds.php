<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycampgrounds extends CI_Controller {

	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('Campground_model');
  	}

	public function index()
	{
		$data['camps'] = $this->Campground_model->getUserCampground($_SESSION['username']);
		$data['page'] = 'mycampgrounds/campgrounds';
		$this->load->view('menu/content', $data);
	}

	public function addCampground()
	{
		$insert_data = array(
			'user_name' => $_SESSION['username'],
			'name' => $this->input->post('name'),
			'img' => $this->input->post('img'),
			'description' => $this->input->post('description'),
			'price' => $this->input->post('price')
		);

		$this->Campground_model->addCampground($insert_data);
		redirect('mycampgrounds');
	}

	public function updateCampground()
	{
		$camp_id = $this->input->post('camp_id');
		$update_data = array(
			'user_name' => $_SESSION['username'],
			'name' => $this->input->post('name'),
			'img' => $this->input->post('img'),
			'description' => $this->input->post('description'),
			'price' => $this->input->post('price')
		);

		$this->Campground_model->updateCampground($camp_id, $update_data);
		redirect('mycampgrounds');
	}

	public function deleteCampground()
	{
		$camp_id = $this->input->post('camp_id');
		
		$this->Campground_model->deleteCampground($camp_id);

		redirect('mycampgrounds');
	}
}

