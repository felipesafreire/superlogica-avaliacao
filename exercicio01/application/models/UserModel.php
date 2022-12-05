<?php

class UserModel extends CI_Model
{

	public function create(array $data = []): int
	{
		$id = (int)$data["id"];

		$data['zipcode'] = clearZipcode($data['zipcode']);

		if (empty($id)) {
			$this->db->insert("users", $data);
			$id = $this->db->insert_id();
		} else {
			$this->db->update("users", $data, ["id" => $id]);
		}

		return $id;
	}

	public function list(): array
	{
		$this->db->order_by('name', 'ASC');
		return $this->db->get('users')->result_array();
	}

	public function excluir(string $id): bool
	{
		return !$this->delete('clientes', ['excluido' => 1], ['id' => $id]);
	}

	public function finder(string $field, string $data, $id = null): bool
	{
		$this->db->from('users');
		if ($id) {
			$this->db->where('id <>', $id);
		}
		return !empty($this->db->where($field, $data)->get()->row_array()) ? true : false;
	}
}
