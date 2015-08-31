<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_site extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function read_record($limit=3,$start=0) {
	    $this->db->limit($limit,$start);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else {
			return false;
		}
	}

	function add_record($data) {
		$this->db->insert('users' , $data);
	}

	function delete_record() {
		$this->db->where('id',$this->uri->rsegment(3));

		$this->db->delete('users');
	}

	function edit_record() {
		$this->db->where('id',$this->uri->segment(3));

		$query = $this->db->get('users');
		return $query->result();
	}

	function update_record($data) {
		$this->db->where('id', $data['id']);
		$this->db->update('users',$data);
	}

	function record_count() {
		return $this->db->count_all('users');
	}
}