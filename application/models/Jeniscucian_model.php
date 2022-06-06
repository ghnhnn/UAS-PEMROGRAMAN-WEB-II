<?php

class Jeniscucian_model extends CI_Model
{
	
public function lihat_data()
	{
		return $this->db->get('jeniscucian')->result();
	}
	public function insert_data($data)
	{
		return $this->db->insert('jeniscucian', $data);
	}
	public function get_row($id)
	{
		return $this->db->where('id_jenis', $id)->get('jeniscucian');
	}

	public function update_data($id, $data)
	{
		return $this->db->where('id_jenis', $id)->update('jeniscucian', $data);
	}
	public function delete_data($id)
	{
		return $this->db->where('id_jenis', $id)->delete('jeniscucian');
	}
}