<?php

class Pendaftaran_model extends CI_Model
{
	
public function lihat_data()
	{
		$this->db->join('status', 'status.id_status = pendaftaran.id_status', 'left');
		$this->db->join('tahun', 'tahun.id_tahun = pendaftaran.id_tahun', 'left');
		$this->db->join('jenkel', 'jenkel.id_jenkel = pendaftaran.id_jenkel', 'left');
		return $this->db->get('pendaftaran')->result();
	}
	public function get_status()
	{
		return $this->db->get('status')->result();
	}
	public function get_tahun()
	{
		return $this->db->get('tahun')->result();
	}
	public function get_jenkel()
	{
		return $this->db->get('jenkel')->result();
	}

	public function insert_data($data)
	{
		return $this->db->insert('pendaftaran', $data);
	}
	public function get_row($id)
	{
		return $this->db->where('id_pendaftaran', $id)->get('pendaftaran');
	}

	public function update_data($id, $data)
	{
		return $this->db->where('id_pendaftaran', $id)->update('pendaftaran', $data);
	}
	public function delete_data($id)
	{
		return $this->db->where('id_pendaftaran', $id)->delete('pendaftaran');
	}
}