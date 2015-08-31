<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->didDelete = FALSE;
	}

	public function index() {
		#load libraries
		$this->load->library(array('pagination','table'));
		
		#pagination
		$config = array();
        $config["base_url"] = base_url() . "index.php/site/index";
        $config["total_rows"] = $this->model_site->record_count();
        $config["per_page"] = 4;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = round($choice);

        $this->pagination->initialize($config); 

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        #fetch data from database
		$value = array();
		if ($this->didDelete) {
			if($data = $this->model_site->read_record($config["per_page"])) {
				$value['record'] = $data;
			}
		}
		else {
			if($data = $this->model_site->read_record($config["per_page"],$page)) {
				$value['record'] = $data;
			}
		}
		
		$value["links"] = $this->pagination->create_links();
		$value["title"] = $page;

		#what is in our data?
		#echo 'what is value';
		#echo '<pre>'; print_r($value); echo '</pre>';
		#echo gettype($data[0]);

		$didDelete = FALSE;

		$this->load->view('templates/header',$value);
		$this->load->view('pages/add',$value);
		$this->load->view('pages/home', $value);

	}

	function create() {
		$data =array('username' => $this->input->post('username')
			,'password' => $this->input->post('password')
			,'email' => $this->input->post('email'));

		if (!empty($data['username']) && !empty($data['password']) && !empty($data['email'])) {
			$this->model_site->add_record($data);
		}
		else {
			echo "Please make sure all fields are filled in";
		}
		$this->index();
	}

	function delete() {
		$this->model_site->delete_record();
		$this->didDelete = TRUE;
		$this->index();
	}

	function edit() {
		$value = array();
		if($data = $this->model_site->edit_record()) {
			$value['record'] = $data;
		}
		$this->load->view('pages/edit',$value);
	}


	function update() {
		$data =array('id' => $this->input->post('id')
			,'username' => $this->input->post('username')
			,'password' => $this->input->post('password')
			,'email' => $this->input->post('email'));

		if (!empty($data['username']) && !empty($data['password']) && !empty($data['email'])) {
			$this->model_site->update_record($data);
		}
		else {
			echo "Please make sure all fields are filled in";
		}
		$this->index();
	}
}