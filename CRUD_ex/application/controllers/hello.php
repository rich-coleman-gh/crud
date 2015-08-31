<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

	public function index() {
		echo "this is my index function";
	}

	public function one($name) {
		$this->load->model("hello_model");
		$profile = $this -> hello_model->getProfile($name);

		$this->load->view('header');

		$data = array("n" => $name);
		
		$data['profile'] = $profile;
		$this ->load->view('one',$data);
		
	}

	public function two() {
		echo "This is two<br>";
	}

}
?>