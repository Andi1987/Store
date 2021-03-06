<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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
	public function index()	{
		$log = $this->session->userdata('login');
		$id  = $this->session->userdata('iduser');
		if($log == TRUE) {
		$data = array('content' => 'index_barang');
		$data['satuan'] = $this->db->query('select * from satuan_barang order by id');
		$data['barang'] = $this->db->query('select * from master_barang order by idbarang');
		$this->load->view('template',$data);
		}else{
			redirect('login');
		}
	}
	
	function insert() {
		$log = $this->session->userdata('login');
		$id  = $this->session->userdata('iduser');
		if($log == TRUE) {
		$data = array('kode_barang' => $this->input->post('nobar'),
				'nama_barang'=> $this->input->post('nama_barang'),
				'jenis' => $this->input->post('jenis'),
				'jumlah' => $this->input->post('jml_barang'),
				'satuan' => $this->input->post('satuan'));
		$rsl = $this->db->insert('master_barang',$data);
		echo json_encode($rsl);
		redirect();
		}else{
			redirect('login');
		}
	}
	
	public function edit() {
		$id = $this->uri->segment(3);
		$data = array('query' => $this->db->query('select * from master_karyawan order by id'));
		$data['edit'] = $this->db->query("select * from master_karyawan where id = '".$id."'");
		$this->load->view('index_edit',$data);
	}
	
	public function edit_proses()
	{
		$id = $this->input->post('id');
		$data = array('nik'=>$this->input->post('nik'),
				'nama_karyawan'=>$this->input->post('nama'),
				'alamat' =>$this->input->post('alamat'),
				'telepon' =>$this->input->post('telp'));
		$this->db->where("id",$id)->update("master_karyawan",$data);
	}
	
	function remove() {
		$id = $this->uri->segment(3);
		$this->db->query("delete from master_karyawan where id ='".$id."'");
		echo 'Data berhasil dihapus';
		echo '<br>';
		echo '<a href="http://localhost/CI/home">Kembali</a>';
	}
}
