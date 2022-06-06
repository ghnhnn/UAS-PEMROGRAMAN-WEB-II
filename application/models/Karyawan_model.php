<?php

class Karyawan_model extends CI_Model
{
	
public function lihat_data()
	{
		return $this->db->get('karyawan')->result();
	}
	public function insert_data($data)
	{
		return $this->db->insert('karyawan', $data);
	}
	public function get_row($id)
	{
		return $this->db->where('id_karyawan', $id)->get('karyawan');
	}

	public function update_data($id, $data)
	{
		return $this->db->where('id_karyawan', $id)->update('karyawan', $data);
	}
	public function delete_data($id)
	{
		return $this->db->where('id_karyawan', $id)->delete('karyawan');
	}
}