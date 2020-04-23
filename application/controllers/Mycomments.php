<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycomments extends CI_Controller {

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

	public function addComment()
	{
		$user_name = $_SESSION['username'];
        $content = $this->input->post('content');
        $camp_id = $this->input->post('camp_id');
        $name = $this->input->post('camp_name');

        $query = $this->db->query("INSERT into comment (camp_id, user_name, content)
        VALUES ('$camp_id', '$user_name', ".$this->db->escape($content).")");
		redirect('camp/show_campsite/'.$name);
	}


	public function deleteCampground()
	{
		$camp_id = $this->input->post('camp_id');
		
		$this->Campground_model->deleteCampground($camp_id);

        redirect('mycampgrounds');
        
    }
    

function deleteComment($comment_id)
  {
      $this->db->where('comment_id', $comment_id);
      $this->db->delete('comment');
      return $this->db->affected_rows();
  }
}

