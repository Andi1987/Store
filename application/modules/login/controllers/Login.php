<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
        {
            parent::__construct();
            $this->load->model('mlogin','mlogin');
			$this->load->library('session');
        }
		
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$data = array ('content' =>'index_login');
		$this->load->view('index_login');
	}
	
	public function login_prosess () {
		$email = $this->input->post('email');
		$pass  = md5($this->input->post('password'));
		$sql = $this->mlogin->login($email,$pass);
		if($sql) {
			$data = array();
			foreach($sql as $row) {
			$iduser = $row->iduser;
			$user 	= $row->username;
			$email	= $row->email_user;

		$data = array('iduser' => $iduser,
						'username'	=> $user,
						'email_user' => $email,
						'login' => TRUE);
		$this->session->set_userdata($data);
			}
		redirect('home');
		return TRUE;
		}else{
			$this->session->set_flashdata('message', '&nbsp;&nbsp;Email dan password tidak cocok');
			$this->load->view('index_login');
			return false;
		}
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
}
