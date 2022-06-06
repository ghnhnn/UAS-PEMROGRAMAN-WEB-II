<?php

class Pendaftaran extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pendaftaran_model');
  }

  public function index()
  {
    $data['pendaftaran']=$this->Pendaftaran_model->lihat_data();
    $this->load->view('pendaftaran_view', $data);
  }

  public function tambah_data()
  {
    $form_open = form_open('pendaftaran/tambah_aksi');
    $label_nama = form_label('Nama', 'nama');
    $label_jenkel = form_label('Jenis Kelamin', 'jenkel');
    $label_status = form_label('Status', 'status');
    $label_lulusan_sekolah = form_label('Lulusan Sekolah', 'lulusan_sekolah');
    $label_tahun = form_label('Tahun Ajaran', 'tahun');
    $label_pekerjaan = form_label('Pekerjaan', 'pekerjaan');
    $label_alamat = form_label('Alamat', 'alamat');
    $label_kelurahan = form_label('Kelurahan', 'kelurahan');
    $attr_id = array(
      'type' => 'hidden',
      'name' => 'id_pendaftaran',
      'value' => set_value('id_pendaftaran')
    );

    $input_nama = form_input('nama');
    $get_jenkel = $this->Pendaftaran_model->get_jenkel();
    $jenkel = array();
    foreach ($get_jenkel as $r) {
      $jenkel[$r->id_jenkel] = $r->nama_jenkel;
    }
    $dropdown_jenkel = form_dropdown('jenkel', $jenkel);
    $input_id = form_input($attr_id);
    $get_status = $this->Pendaftaran_model->get_status();
    $status = array();
    foreach ($get_status as $r) {
      $status[$r->id_status] = $r->nama_status;
    }
    $dropdown_status = form_dropdown('status', $status);
    $input_lulusan_sekolah = form_input('lulusan_sekolah');
    $get_tahun = $this->Pendaftaran_model->get_tahun();
    $tahun = array();
    foreach ($get_tahun as $r) {
      $tahun[$r->id_tahun] = $r->jumlah_tahun;
    }
    $dropdown_tahun = form_dropdown('tahun', $tahun);
    $input_pekerjaan = form_input('pekerjaan');
    $input_alamat = form_input('alamat');
    $input_kelurahan = form_input('kelurahan');
    $input_id = form_input($attr_id);
    $form_submit = form_submit('submit', 'simpan');

    $error_nama = form_error('nama');
    $error_alamat = form_error('alamat');

    $data = array(
      'form_open' => $form_open,
      'label_nama' => $label_nama,
      'label_jenkel' => $label_jenkel,
      'label_status' => $label_status,
      'label_lulusan_sekolah' => $label_lulusan_sekolah,
      'label_tahun' => $label_tahun,
      'label_pekerjaan' => $label_pekerjaan,
      'label_alamat' => $label_alamat,
      'label_kelurahan' => $label_kelurahan,
      'input_id'=> $input_id,
      'input_nama' => $input_nama,
      'dropdown_jenkel' => $dropdown_jenkel,
      'dropdown_status' => $dropdown_status,
      'input_lulusan_sekolah' => $input_lulusan_sekolah,
      'dropdown_tahun' => $dropdown_tahun,
      'input_pekerjaan' => $input_pekerjaan,
      'input_alamat' => $input_alamat,
      'input_kelurahan' => $input_kelurahan,
      'form_submit' => $form_submit,
      'error_nama' => $error_nama,
      'error_alamat' => $error_alamat,
    );
  
    $this->load->view('pendaftaran_form', $data);
  }

  public function _rules()
  {
    $attr_nama = array(
      'required' => 'nama harus diisi',
    );

    $attr_alamat = array(
      'required' => 'Alamat harus diisi',

    );
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required', $attr_nama);
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', $attr_alamat);
  }

  public function tambah_aksi()
  {
    $this->_rules();
    $validasi = $this->form_validation->run();
    if ($validasi == FALSE) {
      $this->tambah_data();
    }else{
      $nama = $this->input->post('nama');
      $jenkel = $this->input->post('jenkel');
      $status = $this->input->post('status');
      $lulusan_sekolah = $this->input->post('lulusan_sekolah');
      $tahun = $this->input->post('tahun');
      $pekerjaan = $this->input->post('pekerjaan');
      $alamat = $this->input->post('alamat');
      $kelurahan = $this->input->post('kelurahan');
      $data = array(
        'nama' => $nama,
        'id_jenkel' => $jenkel,
        'id_status' => $status,
        'lulusan_sekolah' => $lulusan_sekolah,
        'id_tahun' => $tahun,
        'pekerjaan' => $pekerjaan,
        'alamat' => $alamat,
        'kelurahan' => $kelurahan,
      );
      $this->Pendaftaran_model->insert_data($data);
      $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
      redirect('pendaftaran');
    }
  }

  public function edit($id)
  {
    $get_row = $this->Pendaftaran_model->get_row($id);
    if ($get_row->num_rows() > 0) {
    $row = $get_row->row();
    $id_pendaftaran = $row->id_pendaftaran;
    $attr_id = array(
      'type' => 'hidden',
      'name' => 'id_pendaftaran',
      'value' => set_value('id_pendaftaran', $id_pendaftaran)
    );

    $nama = $row->nama;
    $jenkel =  $row->id_jenkel;
    $status = $row->id_status;
    $lulusan_sekolah = $row->lulusan_sekolah;
    $tahun = $row->id_tahun;
    $pekerjaan = $row->pekerjaan;
    $alamat = $row->alamat;
    $kelurahan = $row->kelurahan;
    
    $form_open = form_open('pendaftaran/edit_aksi');
    $label_nama = form_label('Nama', 'nama');
    $label_jenkel = form_label('Jenis Kelamin', 'jenkel');
    $label_status = form_label('Status', 'status');
    $label_lulusan_sekolah = form_label('Lulusan Sekolah', 'lulusan_sekolah');
    $label_tahun = form_label('Tahun Ajaran', 'tahun');
    $label_pekerjaan = form_label('Pekerjaan', 'pekerjaan');
    $label_alamat = form_label('Alamat', 'alamat');
    $label_kelurahan = form_label('Kelurahan', 'kelurahan');
    
    $input_id  = form_input($attr_id);
    $input_nama = form_input('nama', $nama);
    $get_jenkel = $this->Pendaftaran_model->get_jenkel();
    $jenkel = array();
    foreach ($get_jenkel as $r) {
      $jenkel[$r->id_jenkel] = $r->nama_jenkel;
    }
    $dropdown_jenkel = form_dropdown('jenkel', $jenkel);
    $get_status = $this->Pendaftaran_model->get_status();
    $status = array();
    foreach ($get_status as $r) {
      $status[$r->id_status] = $r->nama_status;
    }
    $dropdown_status = form_dropdown('status', $status);
    $input_lulusan_sekolah = form_input('lulusan_sekolah', $lulusan_sekolah);
    $get_tahun = $this->Pendaftaran_model->get_tahun();
    $tahun = array();
    foreach ($get_tahun as $r) {
      $tahun[$r->id_tahun] = $r->jumlah_tahun;
    }
    $dropdown_tahun = form_dropdown('tahun', $tahun);
    $input_pekerjaan = form_input('pekerjaan', $pekerjaan);
    $input_alamat = form_input('alamat', $alamat);
    $input_kelurahan = form_input('kelurahan', $kelurahan);
    $form_submit = form_submit('submit', 'simpan');

    $error_nama = form_error('nama');
    $error_alamat = form_error('alamat');

    $data = array(
      'form_open' => $form_open,
      'label_nama' => $label_nama,
      'label_jenkel' => $label_jenkel,
      'label_status' => $label_status,
      'label_lulusan_sekolah' => $label_lulusan_sekolah,
      'label_tahun' => $label_tahun,
      'label_pekerjaan' => $label_pekerjaan,
      'label_alamat' => $label_alamat,
      'label_kelurahan' => $label_kelurahan,

      'input_id'=> $input_id,
      'input_nama' => $input_nama,
      'dropdown_jenkel' => $dropdown_jenkel,
      'dropdown_status' => $dropdown_status,
      'input_lulusan_sekolah' => $input_lulusan_sekolah,
      'dropdown_tahun' => $dropdown_tahun,
      'input_pekerjaan' => $input_pekerjaan,
      'input_alamat' => $input_alamat,
      'input_kelurahan' => $input_kelurahan,
      'form_submit' => $form_submit,
      'error_nama' => $error_nama,
      'error_alamat' => $error_alamat,
    );
    $this->load->view('pendaftaran_form', $data);
  } else {
    $this->session->set_flashdata('pesan', 'Data tidak ditemukan!');
    redirect('pendaftaran');
  }
  }

  public function edit_aksi()
  {
    $this->_rules();
    $validasi = $this->form_validation->run();
    $id = $this->input->post('id_pendaftaran');
    if ($validasi == FALSE){
      $this->edit($id);
    } else{
      $nama = $this->input->post('nama');
      $jenkel = $this->input->post('jenkel');
      $status = $this->input->post('status');
      $lulusan_sekolah = $this->input->post('lulusan_sekolah');
      $tahun = $this->input->post('tahun');
      $pekerjaan = $this->input->post('pekerjaan');
      $alamat = $this->input->post('alamat');
      $kelurahan = $this->input->post('kelurahan');
      $data = array(
        'nama' => $nama,
        'id_jenkel' => $jenkel,
        'id_status' => $status,
        'lulusan_sekolah' => $lulusan_sekolah,
        'id_tahun' => $tahun,
        'pekerjaan' => $pekerjaan,
        'alamat' => $alamat,
        'kelurahan' => $kelurahan,
      );
      $this->Pendaftaran_model->update_data($id, $data);
      $this->session->set_flashdata('pesan', 'Data berhasil Diubah!');
      redirect('pendaftaran');
    }
  }

  public function hapus($id)
  {
    $id = $this->uri->segment(3);
    $this->Pendaftaran_model->delete_data($id);
    $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
    redirect('pendaftaran');
  }
}