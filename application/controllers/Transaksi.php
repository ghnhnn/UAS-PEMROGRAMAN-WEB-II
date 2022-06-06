<?php

class Transaksi extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Transaksi_model');
  }

  public function index()
  {
    $data['transaksi']=$this->Transaksi_model->lihat_data();
    $this->load->view('transaksi_view', $data);
  }

  public function tambah_data()
  {
    $form_open = form_open('transaksi/tambah_aksi');
    $label_pelanggan = form_label('Nama Pelanggan', 'pelanggan');
    $label_tanggalmasuk = form_label('Tanggal Masuk', 'tanggalmasuk');
    $label_tanggalkeluar = form_label('Tanggal Keluar', 'tanggalkeluar');
    $label_berat = form_label('Berat', 'berat');
    $label_banyakpaket = form_label('Jumlah Paket', 'banyakpaket');
    $label_jeniscucian = form_label('Jenis Laundry', 'jeniscucian');
    $label_pakaian = form_label('Jenis Cucian', 'pakaian');
    $label_bayar = form_label('Harga', 'bayar');
    $label_totalbayar = form_label('Total Bayar', 'totalbayar');
    $attr_id = array(
      'type' => 'hidden',
      'name' => 'id_transaksi',
      'value' => set_value('id_transaksi')
    );

    $get_pelanggan = $this->Transaksi_model->get_pelanggan();
    $pelanggan = array();
    foreach ($get_pelanggan as $r) {
      $pelanggan[$r->id_pelanggan] = $r->nama;
    }
    $dropdown_pelanggan = form_dropdown('pelanggan', $pelanggan);
    $input_tanggalmasuk = form_input('tanggalmasuk');
    $input_id = form_input($attr_id);
    $input_tanggalkeluar = form_input('tanggalkeluar');
    $input_berat = form_input('berat');
    $input_banyakpaket = form_input('banyakpaket');
    $get_jeniscucian = $this->Transaksi_model->get_jeniscucian();
    $jeniscucian = array();
    foreach ($get_jeniscucian as $r) {
      $jeniscucian[$r->id_jenis] = $r->nama_jenis;
    }
    $dropdown_jeniscucian = form_dropdown('jeniscucian', $jeniscucian);
    $get_pakaian = $this->Transaksi_model->get_pakaian();
    $pakaian = array();
    foreach ($get_pakaian as $r) {
      $pakaian[$r->id_pakaian] = $r->nama_pakaian;
    }
    $dropdown_pakaian = form_dropdown('pakaian', $pakaian);
    $input_bayar = form_input('bayar');
    $input_totalbayar = form_input('totalbayar');
  
    $input_id = form_input($attr_id);
    $form_submit = form_submit('submit', 'simpan');
    $form_reset = form_reset('reset', 'batal');

    $error_tanggalmasuk = form_error('tanggalmasuk');
    
    $data = array(
      'form_open' => $form_open,
      'label_pelanggan' => $label_pelanggan,
      'label_tanggalmasuk' => $label_tanggalmasuk,
      'label_tanggalkeluar' => $label_tanggalkeluar,
      'label_berat' => $label_berat,
      'label_banyakpaket' => $label_banyakpaket,
      'label_jeniscucian' => $label_jeniscucian,
      'label_pakaian' => $label_pakaian,
      'label_bayar' => $label_bayar,
      'label_banyakpaket' => $label_banyakpaket,
      'label_totalbayar' => $label_totalbayar,
      'input_id'=> $input_id,
      'dropdown_pelanggan' => $dropdown_pelanggan,
      'input_tanggalmasuk' => $input_tanggalmasuk,
      'input_tanggalkeluar' => $input_tanggalkeluar,
      'input_berat' => $input_berat,
      'input_banyakpaket' => $input_banyakpaket,
      'dropdown_jeniscucian' => $dropdown_jeniscucian,
      'dropdown_pakaian' => $dropdown_pakaian,
      'input_bayar' => $input_bayar,
      'input_totalbayar' => $input_totalbayar,
      'form_submit' => $form_submit,
      'form_reset' => $form_reset,
      'error_tanggalmasuk' => $error_tanggalmasuk,
    );
  
    $this->load->view('transaksi_form', $data);
  }

  public function _rules()
  {
    $attr_tanggalmasuk = array(
      'required' => 'Tanggal harus diisi',
    );

    $this->form_validation->set_rules('tanggalmasuk', 'Tanggal Masuk', 'trim|required', $attr_tanggalmasuk);
  }

  public function tambah_aksi()
  {
    $this->_rules();
    $validasi = $this->form_validation->run();
    if ($validasi == FALSE) {
      $this->tambah_data();
    }else{
      $pelanggan = $this->input->post('pelanggan');
      $tanggalmasuk = $this->input->post('tanggalmasuk');
      $tanggalkeluar = $this->input->post('tanggalkeluar');
      $berat = $this->input->post('berat');
      $banyakpaket = $this->input->post('banyakpaket');
      $jeniscucian = $this->input->post('jeniscucian');
      $pakaian = $this->input->post('pakaian');
      $bayar = $this->input->post('bayar');
      $totalbayar = $this->input->post('totalbayar');
      $data = array(
        'id_pelanggan' => $pelanggan,
        'tanggalmasuk' => $tanggalmasuk,
        'tanggalkeluar' => $tanggalkeluar,
        'berat' => $berat,
        'banyakpaket' => $banyakpaket,
        'id_jenis' => $jeniscucian,
        'id_pakaian' => $pakaian,
        'bayar' => $bayar,
        'totalbayar' => $totalbayar,
      );
      $this->Transaksi_model->insert_data($data);
      $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
      redirect('transaksi');
    }
  }

  public function edit($id)
  {
    $get_row = $this->Transaksi_model->get_row($id);
    if ($get_row->num_rows() > 0) {
    $row = $get_row->row();
    $id_transaksi = $row->id_transaksi;
    $attr_id = array(
      'type' => 'hidden',
      'name' => 'id_transaksi',
      'value' => set_value('id_transaksi', $id_transaksi)
    );

    $id_pelanggan = $row->id_pelanggan;
    $tanggalmasuk =  $row->tanggalmasuk;
    $tanggalkeluar = $row->tanggalkeluar;
    $berat = $row->berat;
    $banyakpaket = $row->banyakpaket;
    $id_jenis = $row->id_jenis;
    $id_pakaian = $row->id_pakaian;
    $bayar = $row->bayar;
    $totalbayar = $row->totalbayar;
    
    $form_open = form_open('transaksi/edit_aksi');
    $label_pelanggan = form_label('Nama Pelanggan', 'id_pelanggan');
    $label_tanggalmasuk = form_label('Tanggal Masuk', 'tanggalmasuk');
    $label_tanggalkeluar = form_label('Tanggal Keluar', 'tanggalkeluar');
    $label_berat = form_label('Berat', 'berat');
    $label_banyakpaket = form_label('Jumlah Paket', 'banyakpaket');
    $label_jeniscucian = form_label('Jenis Laundry', 'id_jenis');
    $label_pakaian = form_label('Jenis Cucian', 'id_pakaian');
    $label_bayar = form_label('Harga', 'bayar');
    $label_totalbayar = form_label('Total Bayar', 'totalbayar');
    
    $input_id  = form_input($attr_id);
    $get_pelanggan = $this->Transaksi_model->get_pelanggan();
    $pelanggan = array();
    foreach ($get_pelanggan as $r) {
      $pelanggan[$r->id_pelanggan] = $r->nama;
    }
    $dropdown_pelanggan = form_dropdown('pelanggan', $pelanggan, $id_pelanggan);
    $input_tanggalmasuk = form_input('tanggalmasuk', $tanggalmasuk);
    $input_tanggalkeluar = form_input('tanggalkeluar', $tanggalkeluar);
    $input_berat = form_input('berat', $berat);
    $input_banyakpaket = form_input('banyakpaket', $banyakpaket);
    $get_jeniscucian = $this->Transaksi_model->get_jeniscucian();
    $jeniscucian = array();
    foreach ($get_jeniscucian as $r) {
      $jeniscucian[$r->id_jenis] = $r->nama_jenis;
    }
    $dropdown_jeniscucian = form_dropdown('jeniscucian', $jeniscucian, $id_jenis);
    $get_pakaian = $this->Transaksi_model->get_pakaian();
    $pakaian = array();
    foreach ($get_pakaian as $r) {
      $pakaian[$r->id_pakaian] = $r->nama_pakaian;
    }
    $dropdown_pakaian = form_dropdown('pakaian', $pakaian, $id_pakaian);
    $input_bayar = form_input('bayar', $bayar);
    $input_totalbayar = form_input('totalbayar', $totalbayar);
  

    $form_submit = form_submit('submit', 'simpan');
    $form_reset = form_reset('reset', 'batal');

    $error_tanggalmasuk = form_error('tanggalmasuk');

    $data = array(
       'form_open' => $form_open,
      'label_pelanggan' => $label_pelanggan,
      'label_tanggalmasuk' => $label_tanggalmasuk,
      'label_tanggalkeluar' => $label_tanggalkeluar,
      'label_berat' => $label_berat,
      'label_banyakpaket' => $label_banyakpaket,
      'label_jeniscucian' => $label_jeniscucian,
      'label_pakaian' => $label_pakaian,
      'label_bayar' => $label_bayar,
      'label_totalbayar' => $label_totalbayar,
      
      'input_id'=> $input_id,
      'dropdown_pelanggan' => $dropdown_pelanggan,
      'input_tanggalmasuk' => $input_tanggalmasuk,
      'input_tanggalkeluar' => $input_tanggalkeluar,
      'input_berat' => $input_berat,
      'input_banyakpaket' => $input_banyakpaket,
      'dropdown_jeniscucian' => $dropdown_jeniscucian,
      'dropdown_pakaian' => $dropdown_pakaian,
      'input_bayar' => $input_bayar,
      'input_totalbayar' => $input_totalbayar,
      'form_submit' => $form_submit,
      'form_reset' => $form_reset,
      'error_tanggalmasuk' => $error_tanggalmasuk,
    );
    $this->load->view('transaksi_form', $data);
  } else {
    $this->session->set_flashdata('pesan', 'Data tidak ditemukan!');
    redirect('transaksi');
  }
  }

  public function edit_aksi()
  {
    $this->_rules();
    $validasi = $this->form_validation->run();
    $id = $this->input->post('id_transaksi');
    if ($validasi == FALSE){
      $this->edit($id);
    } else{
      $pelanggan = $this->input->post('pelanggan');
      $tanggalmasuk = $this->input->post('tanggalmasuk');
      $tanggalkeluar = $this->input->post('tanggalkeluar');
      $berat = $this->input->post('berat');
      $banyakpaket = $this->input->post('banyakpaket');
      $jeniscucian = $this->input->post('jeniscucian');
      $pakaian = $this->input->post('pakaian');
      $bayar = $this->input->post('bayar');
      $totalbayar = $this->input->post('totalbayar');
      $data = array(
        'id_pelanggan' => $pelanggan,
        'tanggalmasuk' => $tanggalmasuk,
        'tanggalkeluar' => $tanggalkeluar,
        'berat' => $berat,
        'banyakpaket' => $banyakpaket,
        'id_jenis' => $jeniscucian,
        'id_pakaian' => $pakaian,
        'bayar' => $bayar,
        'totalbayar' => $totalbayar,
      );
      $this->Transaksi_model->update_data($id, $data);
      $this->session->set_flashdata('pesan', 'Data berhasil Diubah!');
      redirect('transaksi');
    }
  }

  public function hapus($id)
  {
    $id = $this->uri->segment(3);
    $this->Transaksi_model->delete_data($id);
    $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
    redirect('transaksi');
  }

  /*public function cetak($id)
  {
    if($id == 0)
      $data = $this->db->get('transaksi')->result();
  }
  else{
    $data = $this->db->get_where('transaksi', ['id_transaksi'=>$id])->result();
  }
  $dt['pg_transaction_status(connection)'] = $data;
  $this->load->library('fpdf');
  $this->fpdf->generate('Laporan/cetak', $dt, 'laporan-transaksi', 'A4', 'potrait');
}*/
}