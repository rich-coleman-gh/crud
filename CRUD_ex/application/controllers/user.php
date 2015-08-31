<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	//records per page
	private $limit = 10;

	function __construct() {
		parent::__construct();

		//load libraries and helpers
        $this->load->library(array('table','form_validation'));
         
        // load helper
        $this->load->helper('url');
         
        // load model
        $this->load->model('user_model','',TRUE);
	}

	function index($offset = 0) {
        // offset
        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);
         
        // load data
        $users = $this->user_model->get_paged_list($this->limit, $offset)->result();
         
        // generate pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url('user/index/');
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
         
        // generate table data
        $this->load->library('table');
        $this->table->set_empty("&nbsp;");
        $this->table->set_heading('Id', 'Username', 'Password', 'Email');
        $i = 0 + $offset;
        foreach ($users as $user){
            $this->table->add_row(++$i, $user->username, $user->password,$user->email, 
                anchor('user/view/'.$user->id,'view',array('class'=>'view')).' '.
                anchor('user/update/'.$user->id,'update',array('class'=>'update')).' '.
                anchor('user/delete/'.$user->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this user?')"))
            );
        }
        $data['table'] = $this->table->generate();
         
        // load view
        $this->load->view('userList', $data);
    }

    function add() {
        // set validation properties
        $this->_set_fields();
         
        // set common properties
        $data['title'] = 'Add new user';
        $data['message'] = '';
        $data['action'] = site_url('user/addUser');
        $data['link_back'] = anchor('user/index/','Back to list of users',array('class'=>'back'));
     
        // load view
        $this->load->view('userEdit', $data);
    }
     

    function addUser(){
        // set common properties
        $data['title'] = 'Add new user';
        $data['action'] = site_url('user/addUser');
        $data['link_back'] = anchor('user/index/','Back to list of users',array('class'=>'back'));
         
        // set validation properties
        $this->_set_fields();
        $this->_set_rules();
         
        // run validation
        if ($this->validation->run() == FALSE){
            $data['message'] = '';
        }else{
            // save data
            $user = array('username' => $this->input->post('username'),
                            'password' => $this->input->post('password'),
                            'email' => $this->input->post('email'));
            $id = $this->user_model->save($user);
             
            // set form input name="id"
            $this->validation->id = $id;
             
            // set user message
            $data['message'] = '<div class="success">add new user success</div>';
        }
         
        // load view
        $this->load->view('userEdit', $data);
    }
     
    function view($id){
        // set common properties
        $data['title'] = 'User Details';
        $data['link_back'] = anchor('user/index/','Back to list of users',array('class'=>'back'));
         
        // get user details
        $data['user'] = $this->user_model->get_by_id($id)->row();
         
        // load view
        $this->load->view('userView', $data);
    }

    function update($id){
        // set validation properties
        $this->_set_fields();
         
        // prefill form values
        $user = $this->user_model->get_by_id($id)->row();
        $this->validation->id = $id;
        $this->validation->username = $user->username;
        $this->validation->password = $user->password;
        $this->validation->email = $user->email;
        $_POST['email'] = $user->email;
        $this->validation->dob = date('d-m-Y',strtotime($user->dob));
         
        // set common properties
        $data['title'] = 'Update user';
        $data['message'] = '';
        $data['action'] = site_url('user/updateUser');
        $data['link_back'] = anchor('user/index/','Back to list of users',array('class'=>'back'));
     
        // load view
        $this->load->view('userEdit', $data);
    }
     

    function updateUser(){
        // set common properties
        $data['title'] = 'Update user';
        $data['action'] = site_url('user/updateUser');
        $data['link_back'] = anchor('user/index/','Back to list of users',array('class'=>'back'));
         
        // set validation properties
        $this->_set_fields();
        $this->_set_rules();
         
        // run validation
        if ($this->validation->run() == FALSE){
            $data['message'] = '';
        }else{
            // save data
            $id = $this->input->post('id');
            $user = array('name' => $this->input->post('name'),
                            'gender' => $this->input->post('gender'),
                            'dob' => date('Y-m-d', strtotime($this->input->post('dob'))));
            $this->user_model->update($id,$user);
             
            // set user message
            $data['message'] = '<div class="success">update user success</div>';
        }
         
        // load view
        $this->load->view('userEdit', $data);
    }
     
     function delete($id){
        // delete user
        $this->user_model->delete($id);
         
        // redirect to user list page
        redirect('user/index/','refresh');
    }


    // validation fields
    function _set_fields(){
        $fields['id'] = 'id';
        $fields['username'] = 'username';
        $fields['password'] = 'password';
        $fields['email'] = 'gender';
         
        $this->validation->set_fields($fields);
    }
     
    // validation rules
    function _set_rules(){
        $rules['username'] = 'trim|required';
        $rules['password'] = 'trim|required';
        $rules['email'] = 'trim|required';
         
        $this->validation->set_rules($rules);
         
        $this->validation->set_message('required', '* required');
        $this->validation->set_message('isset', '* required');
        $this->validation->set_error_delimiters('<p class="error">', '</p>');
    }
     
     
     
}