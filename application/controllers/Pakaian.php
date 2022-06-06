<?php

class Pakaian extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pakaian_model');
	}

	public function index()
	{
		$data['pakaian']=$this->Pakaian_model->lihat_data();
		$this->load->view('pakaian_view', $data);
	}

	public function tambah_data()
	{
		$form_open = form_open('pakaian/tambah_aksi');

		$label_nama_pakaian = form_label('Jenis Laundry', 'nama_pakaian');
		$attr_id = array(
			'type' => 'hidden',
			'name' => 'id_pakaian',
			'value' => set_value('id_pakaian')
		);

		$input_nama_pakaian = form_input('nama_pakaian');
		$input_id = form_input($attr_id);
		$form_submit = form_submit('submit', 'simpan');
		$form_reset = form_reset('reset', 'batal');
		$error_nama_pakaian = form_error('nama_pakaian');

		$data = array(
			'form_open' => $form_open,
			'label_nama_pakaian' => $label_nama_pakaian,
			'input_id'=> $input_id,
			'input_nama_pakaian' => $input_nama_pakaian,
			'form_submit' => $form_submit,
			'form_reset' => $form_reset,
			'error_nama_pakaian' => $error_nama_pakaian,
		);
	
		$this->load->view('pakaian_form', $data);
	}

	public function _rules()
	{
		
		$attr_nama_pakaian = array(
			'required' => 'Nama harus diisi',
			'min_length' => 'Nama minimal 2 karakter!',
			'max_length' => 'Nama maksimal 30 karakter!'
		);

		$this->form_validation->set_rules('nama_pakaian', 'Nama', 'trim|required|min_length[2]|max_length[30]', $attr_nama_pakaian);
	}

	public function tambah_aksi()
	{
		$this->_rules();
		$validasi = $this->form_validation->run();
		if ($validasi == FALSE) {
			$this->tambah_data();
		}else{
			$nama_pakaian = $this->input->post('nama_pakaian');
			$data = array(
				'nama_pakaian' => $nama_pakaian,
			);
			$this->Pakaian_model->insert_data($data);
			$this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
			redirect('pakaian');
		}
	}

	public function edit($id)
	{
		$get_row = $this->Pakaian_model->get_row($id);
		if ($get_row->num_rows() > 0) {
		$row = $get_row->row();
		$id_pakaian = $row->id_pakaian;
		$attr_id = array(
			'type' => 'hidden',
			'name' => 'id_pakaian',
			'value' => set_value('id_pakaian', $id_pakaian)
		);
		$nama_pakaian = $row->nama_pakaian;
		
		$form_open = form_open('pakaian/edit_aksi');

		$label_nama_pakaian = form_label('Jenis Laundry', 'nama_pakaian');
		
		$input_nama_pakaian = form_input('nama_pakaian', $nama_pakaian);
		$input_id = form_input($attr_id);
		
		$form_submit = form_submit('submit', 'simpan');
		$form_reset = form_reset('reset', 'batal');

		$error_nama_pakaian = form_error('nama_pakaian');

		$data = array(
			'form_open' => $form_open,

			'label_nama_pakaian' => $label_nama_pakaian,

			'input_id'=> $input_id,
			'input_nama_pakaian' => $input_nama_pakaian,

			'form_submit' => $form_submit,
			'form_reset' => $form_reset,

			'error_nama_pakaian' => $error_nama_pakaian,
		);
	
		$this->load->view('pakaian_form', $data);
	} else {
		$this->session->set_flashdata('pesan', 'Data tidak ditemukan!');
		redirect('pakaian');
	}
	}

	public function edit_aksi()
	{
		$this->_rules();
		$validasi = $this->form_validation->run();
		$id = $this->input->post('id_pakaian');
		if ($validasi == FALSE){
			$this->edit($id);
		} else{
			$nama_pakaian = $this->input->post('nama_pakaian');
			$data = array(
				'nama_pakaian' => $nama_pakaian,
			);
			$this->Pakaian_model->update_data($id, $data);
			$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
			redirect('pakaian');
		}
	}
	public function hapus($id)
	{
		$id = $this->uri->segment(3);
		$this->Pakaian_model->delete_data($id);
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
		redirect('pakaian');
	}
}