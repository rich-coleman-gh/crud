<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
	private $user_table = 'users';

	function __construct() {
		parent::__construct();
	}

	//get users by page
	function get_paged_list($limit=10,$offset=0) {
		$this->db->order_by('id','asc');

		return $this->db->get($this->user_table,$limit,$offset);
	}

	//get user by id
	function get_by_id($id){
		$this->db->where('id',$id);

		return $this->db->get($this->user_table);
	}

	//add new user
	function save($user) {
		$this->db->insert($this->user_table,$user);

		return $this->db->insert_id();
	}

	//update user
	function update($id,$user) {
		$this->db->where('id',$id);

		$this->db->update($this->user_table,$user);
	}

	//remove user 
	function delete($id) {
		$this->db->where('id',$id);

		$this->db->delete($this->user_table);
	}
}