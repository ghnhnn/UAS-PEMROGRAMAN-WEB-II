<?php

class Pelanggan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_model');
	}

	public function index()
	{
		$data['pelanggan']=$this->Pelanggan_model->lihat_data();
		$this->load->view('pelanggan_view', $data);
	}

	public function tambah_data()
	{
		$form_open = form_open('pelanggan/tambah_aksi');

		$label_nama = form_label('Nama', 'nama');
		$label_alamat = form_label('Alamat', 'alamat');
		$label_noTelp = form_label('Nomor Telepon', 'noTelp');
		$label_jenkel = form_label('Jenis Kelamin', 'jenkel');
		$attr_id = array(
			'type' => 'hidden',
			'name' => 'id_pelanggan',
			'value' => set_value('id_pelanggan')
		);
		$label_paket = form_label('Paket', 'paket');

		$input_nama = form_input('nama');
		$input_alamat = form_input('alamat');
		$input_noTelp = form_input('noTelp');
		$input_jenkel = form_input('jenkel');
		$input_paket = form_input('paket');
		$input_id = form_input($attr_id);
		
		$form_submit = form_submit('submit', 'simpan');
		$form_reset = form_reset('reset', 'batal');

		$error_nama = form_error('nama');
		$error_alamat = form_error('alamat');
		$error_noTelp = form_error('noTelp');

		$data = array(
			'form_open' => $form_open,

			'label_nama' => $label_nama,
			'label_alamat' => $label_alamat,
			'label_noTelp' => $label_noTelp,
			'label_jenkel' => $label_jenkel,
			'label_paket' => $label_paket,

			'input_id'=> $input_id,
			'input_nama' => $input_nama,
			'input_alamat' => $input_alamat,
			'input_noTelp' => $input_noTelp,
			'input_jenkel' => $input_jenkel,
			'input_paket' =>$input_paket,

			'form_submit' => $form_submit,
			'form_reset' => $form_reset,

			'error_nama' => $error_nama,
			'error_alamat' => $error_alamat,
			'error_noTelp' => $error_noTelp,
		);
	
		$this->load->view('pelanggan_form', $data);
	}

	public function _rules()
	{
		
		$attr_nama = array(
			'required' => 'Nama harus diisi',
			'min_length' => 'Nama minimal 5 karakter!',
			'max_length' => 'Nama maksimal 30 karakter!'
		);
		
		$attr_alamat = array(
			'required' => 'Alamat harus diisi',
			'min_length' => 'Alamat minimal 5 karakter!',
			'max_length' => 'Alamat maksimal 50 karakter!'
		);

		$attr_noTelp = array(
			'required' => 'Nomor Telepon harus diisi',
		);

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[5]|max_length[30]', $attr_nama);

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]|max_length[50]', $attr_alamat);

		$this->form_validation->set_rules('noTelp', 'Nomor Telepon', 'trim|required', $attr_noTelp);
	}

	public function tambah_aksi()
	{
		$this->_rules();
		$validasi = $this->form_validation->run();
		if ($validasi == FALSE) {
			$this->tambah_data();
		}else{
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$noTelp = $this->input->post('noTelp');
			$jenkel = $this->input->post('jenkel');
			$paket = $this->input->post('paket');
			$data = array(
				'nama' => $nama,
				'alamat' => $alamat,
				'noTelp' => $noTelp,
				'jenkel' => $jenkel,
				'paket' => $paket,
			);
			$this->Pelanggan_model->insert_data($data);
			$this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
			redirect('pelanggan');
		}
	}

	public function edit($id)
	{
		$get_row = $this->Pelanggan_model->get_row($id);
		if ($get_row->num_rows() > 0) {
		$row = $get_row->row();
		$id_pelanggan = $row->id_pelanggan;
		$attr_id = array(
			'type' => 'hidden',
			'name' => 'id_pelanggan',
			'value' => set_value('id_pelanggan', $id_pelanggan)
		);
		$nama = $row->nama;
		$alamat = $row->alamat;
		$noTelp = $row->noTelp;
		$jenkel = $row->jenkel;
		$paket = $row->paket;

		$form_open = form_open('pelanggan/edit_aksi');

		$label_nama = form_label('Nama', 'nama');
		$label_alamat = form_label('Alamat', 'alamat');
		$label_noTelp = form_label('Nomor Telepon', 'noTelp');
		$label_jenkel = form_label('Jenis Kelamin', 'jenkel');
		$label_paket = form_label('Paket', 'paket');
		
		$input_nama = form_input('nama', $nama);
		$input_alamat = form_input('alamat', $alamat);
		$input_noTelp = form_input('noTelp', $noTelp);
		$input_jenkel = form_input('jenkel', $jenkel);
		$input_paket = form_input('paket', $paket);
		$input_id = form_input($attr_id);
		
		$form_submit = form_submit('submit', 'simpan');
		$form_reset = form_reset('reset', 'batal');

		$error_nama = form_error('nama');
		$error_alamat = form_error('alamat');
		$error_noTelp = form_error('noTelp');

		$data = array(
			'form_open' => $form_open,

			'label_nama' => $label_nama,
			'label_alamat' => $label_alamat,
			'label_noTelp' => $label_noTelp,
			'label_jenkel' => $label_jenkel,
			'label_paket' => $label_paket,

			'input_id'=> $input_id,
			'input_nama' => $input_nama,
			'input_alamat' => $input_alamat,
			'input_noTelp' => $input_noTelp,
			'input_jenkel' => $input_jenkel,
			'input_paket' =>$input_paket,

			'form_submit' => $form_submit,
			'form_reset' => $form_reset,

			'error_nama' => $error_nama,
			'error_alamat' => $error_alamat,
			'error_noTelp' => $error_noTelp,
		);
	
		$this->load->view('pelanggan_form', $data);
	} else {
		$this->session->set_flashdata('pesan', 'Data tidak ditemukan!');
		redirect('pelanggan');
	}
	}

	public function edit_aksi()
	{
		$this->_rules();
		$validasi = $this->form_validation->run();
		$id = $this->input->post('id_pelanggan');
		if ($validasi == FALSE){
			$this->edit($id);
		} else{
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$noTelp = $this->input->post('noTelp');
			$jenkel = $this->input->post('jenkel');
			$paket = $this->input->post('paket');
			$data = array(
				'nama' => $nama,
				'alamat' => $alamat,
				'noTelp' => $noTelp,
				'jenkel' => $jenkel,
				'paket' => $paket,
			);
			$this->Pelanggan_model->update_data($id, $data);
			$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
			redirect('pelanggan');
		}
	}
	public function hapus($id)
	{
		$id = $this->uri->segment(3);
		$this->Pelanggan_model->delete_data($id);
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
		redirect('pelanggan');
	}
}