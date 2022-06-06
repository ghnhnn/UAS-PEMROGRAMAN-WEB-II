<?php

class Pelanggan_model extends CI_Model
{
	
public function lihat_data()
	{
		return $this->db->get('pelanggan')->result();
	}
	public function insert_data($data)
	{
		return $this->db->insert('pelanggan', $data);
	}
	public function get_row($id)
	{
		return $this->db->where('id_pelanggan', $id)->get('pelanggan');
	}

	public function update_data($id, $data)
	{
		return $this->db->where('id_pelanggan', $id)->update('pelanggan', $data);
	}
	public function delete_data($id)
	{
		return $this->db->where('id_pelanggan', $id)->delete('pelanggan');
	}
}