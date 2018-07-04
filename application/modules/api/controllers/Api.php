<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {
 function __construct($config = 'rest') {
 parent::__construct($config);
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
	public function index_get()	{
		$id = $this->get('id');
		if ($id == '') {
			$product = $this->db->get('master_karyawan')->result();
		} else {
		$this->db->where('id', $id);
		$product = $this->db->get('master_karyawan')->result();
		}
		$this->response($product, 200);
	}
	
	function index_post() {
		$data = array('nik' => $this->input->post('nik'),
				'nama_karyawan'=> $this->input->post('nama_kar'),
				'alamat' => $this->input->post('alamat'),
				'telepon' =>$this->input->post('telp'));
		$insert = $this->db->insert('master_karyawan', $data);
		if ($insert) {
		$this->response($data, 200);
		} else {
		$this->response(array('status' => 'fail', 502));
	}
 }
 
	function index_put() {
	$id = $this->put('id');
	$data = array(
			'nik' => $this->put('nik'),
			'nama_karyawan' => $this->put('nama'),
			'alamat' => $this->put('alamat'),
			'telepon' => $this->put('telp'));
		$this->db->where('id', $id);
		$update = $this->db->update('master_karyawan', $data);
		if ($update) {
		$this->response($data, 200);
		} else {
		$this->response(array('status' => 'fail', 502));
	}
 }
 
	function index_delete() {
	$id = $this->delete('id');
	$this->db->where('id', $id);
	$delete = $this->db->delete('master_karyawan');
	if ($delete) {
		$this->response(array('status' => 'success'), 201);
	} else {
		$this->response(array('status' => 'fail', 502));
	}
 }

}
