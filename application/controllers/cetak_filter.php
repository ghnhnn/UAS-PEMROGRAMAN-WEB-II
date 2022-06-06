<?php

class cetak_filter extends CI_Controller {

 public function index()
 {
  
  $data['transaksi'] = $this->db->get('transaksi')->result();
  $this->load->view('laporan_view', $data);  
 }

 public function filter($id)
 {
  if ($id == 0) {
   $data = $this->db->get('transaksi')->result();
  }
  else
  {
   $data = $this->db->get_where('transaksi', ['id_transaksi'=>$id])->result();
  }
  $dt['transaksi'] = $data;
  $dt['id_transaksi'] = $id;
  $this->load->view('laporan_view', $dt);
 }

 public function cetak($id)
 {
  if ($id == 0) {
   $data = $this->db->get('transaksi')->result();
  }
  else
  {
   $data = $this->db->get_where('transaksi', ['id_transaksi'=>$id])->result();
  }
  $dt['transaksi'] = $data;
  $this->load->library('mypdf');
  $this->mypdf->generate('transaksi', $dt, 'nota-laundry', 'A4', 'portrait');
 }

}