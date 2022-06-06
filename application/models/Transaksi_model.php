<?php

class Transaksi_model extends CI_Model
{
	
public function lihat_data()
	{
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
		$this->db->join('jeniscucian', 'jeniscucian.id_jenis = transaksi.id_jenis', 'left');
		$this->db->join('pakaian', 'pakaian.id_pakaian = transaksi.id_pakaian', 'left');
		return $this->db->get('transaksi')->result();
	}
	public function get_pelanggan()
	{
		return $this->db->get('pelanggan')->result();
	}
	public function get_jeniscucian()
	{
		return $this->db->get('jeniscucian')->result();
	}
	public function get_pakaian()
	{
		return $this->db->get('pakaian')->result();
	}

	public function insert_data($data)
	{
		return $this->db->insert('transaksi', $data);
	}
	public function get_row($id)
	{
		return $this->db->where('id_transaksi', $id)->get('transaksi');
	}

	public function update_data($id, $data)
	{
		return $this->db->where('id_transaksi', $id)->update('transaksi', $data);
	}
	public function delete_data($id)
	{
		return $this->db->where('id_transaksi', $id)->delete('transaksi');
	}

	
}