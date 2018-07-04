<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {
	
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
	public function login ($email,$pass) {
		$query = $this->db->query("select * from user_login where email_user = '".$email."' and password ='".$pass."' limit 1");
		//$check = $this->db->get();
			if($query->num_rows() == '1') {
			return $query->result();
			}else{
				return false;
			}
	}
}
