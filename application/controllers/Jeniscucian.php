<?php

class Jeniscucian extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jeniscucian_model');
	}

	public function index()
	{
		$data['jeniscucian']=$this->Jeniscucian_model->lihat_data();
		$this->load->view('jeniscucian_view', $data);
	}

	public function tambah_data()
	{
		$form_open = form_open('jeniscucian/tambah_aksi');

		$label_nama_jenis = form_label('Jenis Cucian', 'nama_jenis');
		$attr_id = array(
			'type' => 'hidden',
			'name' => 'id_jenis',
			'value' => set_value('id_jenis')
		);

		$input_nama_jenis = form_input('nama_jenis');
		$input_id = form_input($attr_id);
		$form_submit = form_submit('submit', 'simpan');
		$form_reset = form_reset('reset', 'batal');
		$error_nama_jenis = form_error('nama_jenis');

		$data = array(
			'form_open' => $form_open,
			'label_nama_jenis' => $label_nama_jenis,
			'input_id'=> $input_id,
			'input_nama_jenis' => $input_nama_jenis,
			'form_submit' => $form_submit,
			'form_reset' => $form_reset,
			'error_nama_jenis' => $error_nama_jenis,
		);
	
		$this->load->view('jeniscucian_form', $data);
	}

	public function _rules()
	{
		
		$attr_nama_jenis = array(
			'required' => 'Nama harus diisi',
			'min_length' => 'Nama minimal 2 karakter!',
			'max_length' => 'Nama maksimal 30 karakter!'
		);

		$this->form_validation->set_rules('nama_jenis', 'Nama', 'trim|required|min_length[2]|max_length[30]', $attr_nama_jenis);
	}

	public function tambah_aksi()
	{
		$this->_rules();
		$validasi = $this->form_validation->run();
		if ($validasi == FALSE) {
			$this->tambah_data();
		}else{
			$nama_jenis = $this->input->post('nama_jenis');
			$data = array(
				'nama_jenis' => $nama_jenis,
			);
			$this->Jeniscucian_model->insert_data($data);
			$this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
			redirect('jeniscucian');
		}
	}

	public function edit($id)
	{
		$get_row = $this->Jeniscucian_model->get_row($id);
		if ($get_row->num_rows() > 0) {
		$row = $get_row->row();
		$id_jenis = $row->id_jenis;
		$attr_id = array(
			'type' => 'hidden',
			'name' => 'id_jenis',
			'value' => set_value('id_jenis', $id_jenis)
		);
		$nama_jenis = $row->nama_jenis;
		
		$form_open = form_open('jeniscucian/edit_aksi');

		$label_nama_jenis = form_label('Jenis Cucian', 'nama_jenis');
		
		$input_nama_jenis = form_input('nama_jenis', $nama_jenis);
		$input_id = form_input($attr_id);
		
		$form_submit = form_submit('submit', 'simpan');
		$form_reset = form_reset('reset', 'batal');

		$error_nama_jenis = form_error('nama_jenis');

		$data = array(
			'form_open' => $form_open,

			'label_nama_jenis' => $label_nama_jenis,

			'input_id'=> $input_id,
			'input_nama_jenis' => $input_nama_jenis,

			'form_submit' => $form_submit,
			'form_reset' => $form_reset,

			'error_nama_jenis' => $error_nama_jenis,
		);
	
		$this->load->view('jeniscucian_form', $data);
	} else {
		$this->session->set_flashdata('pesan', 'Data tidak ditemukan!');
		redirect('jeniscucian');
	}
	}

	public function edit_aksi()
	{
		$this->_rules();
		$validasi = $this->form_validation->run();
		$id = $this->input->post('id_jenis');
		if ($validasi == FALSE){
			$this->edit($id);
		} else{
			$nama_jenis = $this->input->post('nama_jenis');
			$data = array(
				'nama_jenis' => $nama_jenis,
			);
			$this->Jeniscucian_model->update_data($id, $data);
			$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
			redirect('jeniscucian');
		}
	}
	public function hapus($id)
	{
		$id = $this->uri->segment(3);
		$this->Jeniscucian_model->delete_data($id);
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
		redirect('jeniscucian');
	}
}