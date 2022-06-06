<?php

class Karyawan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Karyawan_model');
	}

	public function index()
	{
		$data['karyawan']=$this->Karyawan_model->lihat_data();
		$this->load->view('karyawan_view', $data);
	}

	public function tambah_data()
	{
		$form_open = form_open('karyawan/tambah_aksi');

		$label_nama_karyawan = form_label('Nama', 'nama_karyawan');
		$label_alamat_karyawan = form_label('Alamat', 'alamat_karyawan');
		$label_noTelp = form_label('Nomor Telepon', 'noTelp');
		$attr_id = array(
			'type' => 'hidden',
			'name' => 'id_karyawan',
			'value' => set_value('id_karyawan')
		);

		$input_nama_karyawan = form_input('nama_karyawan');
		$input_alamat_karyawan = form_input('alamat_karyawan');
		$input_noTelp = form_input('noTelp');
		$input_id = form_input($attr_id);
		
		$form_submit = form_submit('submit', 'simpan');
		$form_reset = form_reset('reset', 'batal');

		$error_nama_karyawan = form_error('nama_karyawan');
		$error_alamat_karyawan = form_error('alamat_karyawan');
		$error_noTelp = form_error('noTelp');
		$data = array(
			'form_open' => $form_open,

			'label_nama_karyawan' => $label_nama_karyawan,
			'label_alamat_karyawan' => $label_alamat_karyawan,
			'label_noTelp' => $label_noTelp,

			'input_id'=> $input_id,
			'input_nama_karyawan' => $input_nama_karyawan,
			'input_alamat_karyawan' => $input_alamat_karyawan,
			'input_noTelp' => $input_noTelp,

			'form_submit' => $form_submit,
			'form_reset' => $form_reset,

			'error_nama_karyawan' => $error_nama_karyawan,
			'error_alamat_karyawan' => $error_alamat_karyawan,
			'error_noTelp' => $error_noTelp,
		);
	
		$this->load->view('karyawan_form', $data);
	}

	public function _rules()
	{
		
		$attr_nama_karyawan = array(
			'required' => 'Nama harus diisi',
			'min_length' => 'Nama minimal 5 karakter!',
			'max_length' => 'Nama maksimal 30 karakter!'
		);
		
		$attr_alamat_karyawan = array(
			'required' => 'Alamat harus diisi',
			'min_length' => 'Alamat minimal 5 karakter!',
			'max_length' => 'Alamat maksimal 50 karakter!'
		);

		$attr_noTelp = array(
			'required' => 'Nomor Telepon harus diisi',
		);

		$this->form_validation->set_rules('nama_karyawan', 'Nama', 'trim|required|min_length[5]|max_length[30]', $attr_nama_karyawan);

		$this->form_validation->set_rules('alamat_karyawan', 'Alamat', 'trim|required|min_length[5]|max_length[50]', $attr_alamat_karyawan);

		$this->form_validation->set_rules('noTelp', 'Nomor Telepon', 'trim|required', $attr_noTelp);
	}

	public function tambah_aksi()
	{
		$this->_rules();
		$validasi = $this->form_validation->run();
		if ($validasi == FALSE) {
			$this->tambah_data();
		}else{
			$nama_karyawan = $this->input->post('nama_karyawan');
			$alamat_karyawan = $this->input->post('alamat_karyawan');
			$noTelp = $this->input->post('noTelp');
			$data = array(
				'nama_karyawan' => $nama_karyawan,
				'alamat_karyawan' => $alamat_karyawan,
				'noTelp' => $noTelp,
			);
			$this->Karyawan_model->insert_data($data);
			$this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
			redirect('karyawan');
		}
	}

	public function edit($id)
	{
		$get_row = $this->Karyawan_model->get_row($id);
		if ($get_row->num_rows() > 0) {
		$row = $get_row->row();
		$id_karyawan = $row->id_karyawan;
		$attr_id = array(
			'type' => 'hidden',
			'name' => 'id_karyawan',
			'value' => set_value('id_karyawan', $id_karyawan)
		);
		$nama_karyawan = $row->nama_karyawan;
		$alamat_karyawan = $row->alamat_karyawan;
		$noTelp = $row->noTelp;
		
		$form_open = form_open('karyawan/edit_aksi');

		$label_nama_karyawan = form_label('Nama', 'nama_karyawan');
		$label_alamat_karyawan = form_label('Alamat', 'alamat_karyawan');
		$label_noTelp = form_label('Nomor Telepon', 'noTelp');
		
		$input_nama_karyawan = form_input('nama_karyawan', $nama_karyawan);
		$input_alamat_karyawan = form_input('alamat_karyawan', $alamat_karyawan);
		$input_noTelp = form_input('noTelp', $noTelp);
		$input_id = form_input($attr_id);
		
		$form_submit = form_submit('submit', 'simpan');
		$form_reset = form_reset('reset', 'batal');

		$error_nama_karyawan = form_error('nama_karyawan');
		$error_alamat_karyawan = form_error('alamat_karyawan');
		$error_noTelp = form_error('noTelp');
		$data = array(
			'form_open' => $form_open,

			'label_nama_karyawan' => $label_nama_karyawan,
			'label_alamat_karyawan' => $label_alamat_karyawan,
			'label_noTelp' => $label_noTelp,

			'input_id'=> $input_id,
			'input_nama_karyawan' => $input_nama_karyawan,
			'input_alamat_karyawan' => $input_alamat_karyawan,
			'input_noTelp' => $input_noTelp,

			'form_submit' => $form_submit,
			'form_reset' => $form_reset,

			'error_nama_karyawan' => $error_nama_karyawan,
			'error_alamat_karyawan' => $error_alamat_karyawan,
			'error_noTelp' => $error_noTelp,
		);
	
		$this->load->view('karyawan_form', $data);
	} else {
		$this->session->set_flashdata('pesan', 'Data tidak ditemukan!');
		redirect('karyawan');
	}
	}

	public function edit_aksi()
	{
		$this->_rules();
		$validasi = $this->form_validation->run();
		$id = $this->input->post('id_karyawan');
		if ($validasi == FALSE){
			$this->edit($id);
		} else{
			$nama_karyawan = $this->input->post('nama_karyawan');
			$alamat_karyawan = $this->input->post('alamat_karyawan');
			$noTelp = $this->input->post('noTelp');
			$data = array(
				'nama_karyawan' => $nama_karyawan,
				'alamat_karyawan' => $alamat_karyawan,
				'noTelp' => $noTelp,
			);
			$this->Karyawan_model->update_data($id, $data);
			$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
			redirect('karyawan');
		}
	}
	public function hapus($id)
	{
		$id = $this->uri->segment(3);
		$this->Karyawan_model->delete_data($id);
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
		redirect('karyawan');
	}
}