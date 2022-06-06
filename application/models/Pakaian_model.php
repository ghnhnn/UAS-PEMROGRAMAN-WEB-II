<?php

class Pakaian_model extends CI_Model
{
	
public function lihat_data()
	{
		return $this->db->get('pakaian')->result();
	}
	public function insert_data($data)
	{
		return $this->db->insert('pakaian', $data);
	}
	public function get_row($id)
	{
		return $this->db->where('id_pakaian', $id)->get('pakaian');
	}

	public function update_data($id, $data)
	{
		return $this->db->where('id_pakaian', $id)->update('pakaian', $data);
	}
	public function delete_data($id)
	{
		return $this->db->where('id_pakaian', $id)->delete('pakaian');
	}
}