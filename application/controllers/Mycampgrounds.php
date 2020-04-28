<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycampgrounds extends CI_Controller {

	public function __construct()
  	{
    	parent::__construct();
		$this->load->model('Campground_model');
		$this->load->helper(array('form', 'url'));
  	}

	public function index()
	{
		$data['camps'] = $this->Campground_model->getUserCampground($_SESSION['username']);
		$data['page'] = 'mycampgrounds/campgrounds';
		$this->load->view('menu/content', $data);
	}

	public function addCampground()
	{	
		// Image upload configurations
		$config = array(
			'upload_path' => './Images/',
			'allowed_types' => "*",
			'max_size' => "0",
			'max_height' => "0",
			'max_width' => "0"
			);
		$this->load->library('upload', $config);
		
		// In case image fails to upload
		if(! $this->upload->do_upload('img')){
			$data['page'] = 'mycampgrounds/new_campground';
			$data['result'] = $this->upload->display_errors();
			$this->load->view('menu/content', $data);
		} else{ // Otherwise upload to Images folder
			$insert_data = array(
				'user_name' => $_SESSION['username'],
				'name' => $this->input->post('name'),
				'img' => base_url('Images').'/'.$this->upload->data('file_name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price')
			);
	
			$this->Campground_model->addCampground($insert_data);
			redirect('mycampgrounds');
		}
		
	}

	public function updateCampground()
	{
		// Image upload configurations
		$config = array(
			'upload_path' => './Images/',
			'allowed_types' => "*",
			'max_size' => "0",
			'max_height' => "0",
			'max_width' => "0"
			);
		$this->load->library('upload', $config);

		// In case image fails to upload
		if(! $this->upload->do_upload('img')){
			// $data['page'] = 'mycampgrounds/new_campground';	
			// $this->load->view('menu/content', $data);
			$image = $this->input->post('img_path');
		} else { // In case image succeeds
			$image = base_url('Images').'/'.$this->upload->data('file_name');
		}
			$camp_id = $this->input->post('camp_id');
			$update_data = array(
			'user_name' => $_SESSION['username'],
			'name' => $this->input->post('name'),
			'img' => $image,
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

