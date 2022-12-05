<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	private $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'model');
	}

	public function index()
	{
		$this->data["users"] = $this->model->list();
		$this->data["page"] = 'user/list';
		$this->load->view('layout', $this->data);
	}

	public function create()
	{
		$success = false;
		$errors = [];

		if ($this->input->post("action")) {

			$_POST = array_map('trim', $_POST);
			$errorsMessages = $this->validate();

			if (count($errorsMessages) == 0) {

				unset($_POST["action"]);
				$this->load->library('bcrypt');
				$_POST["password"] = $this->bcrypt->hashPassword($_POST['password']);
				$result = $this->model->create($_POST);

				if ($result === false) {
					$errors[] = "Erro ao gravar no banco de dados. Erro crítico.";
				} else {
					$success = true;
				}

			}

			if (count($errorsMessages) > 0) {
				$this->data["data"] = $_POST;
				$errors = $errorsMessages;
			}

		}

		$this->data["success"] = $success;
		$this->data["errors"] = $errors;
		$this->data["action"] = 'create';
		$this->data["page"] = 'user/form';
		$this->load->view('layout', $this->data);
	}

	public function edit($id)
	{
		if (strlen($id) == 0 || !is_numeric($id)) {
			redirect(base_url("users"));
		}

		$success = false;
		$errors = [];

		if ($this->input->post("action")) {

			$_POST = array_map('trim', $_POST);
			$errorsMessages = $this->validate();

			if (count($errorsMessages) == 0) {

				unset($_POST["action"]);
				$this->load->library('bcrypt');
				$_POST["password"] = $this->bcrypt->hashPassword($_POST['password']);
				$result = $this->model->create($_POST);

				if ($result === false) {
					$errors[] = "Erro ao gravar no banco de dados. Erro crítico.";
				} else {
					$success = true;
				}

			}

			if (count($errorsMessages) > 0) {
				$this->data["data"] = $_POST;
				$errors = $errorsMessages;
			} else {
				$success = true;
				$this->data["data"] = $this->model->db->get_where('users', ['id' => $id])->row_array();
			}

		} else {
			$this->data["data"] = $this->model->db->get_where('users', ['id' => $id])->row_array();

			if (empty($this->data['data'])) {
				redirect(base_url("users"));
			}
		}

		$this->data["success"] = $success;
		$this->data["errors"] = $errors;
		$this->data["action"] = 'edit';
		$this->data["page"] = 'user/form';
		$this->load->view('layout', $this->data);
	}

	public function destroy()
	{
		$id = $this->input->post('id');
		echo json_encode(['error' => $this->model->db->delete('users', ['id' => $id])]);
	}

	private function validate()
	{
		$errors = [];
		extract($_POST);

		if (strlen($name) == 0) {
			$errors[] = "Por favor, insira o Nome Completo.";
		}
		if (strlen($username) == 0) {
			$errors[] = "Por favor, insira o Login do Usuário.";
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Por favor, insira um e-mail válido.";
		}
		if (!validateZipcode($zipcode)) {
			$errors[] = "Por favor, insira um CEP válido.";
		}
		if ($action == 'create') {
			if (!validatePassword($password)) {
				$errors[] = "Por favor, insira um senha válida.";
			}
		}

		if (count($errors) == 0) {
			if ($this->model->finder('email', $email, $id)) {
				$errors[] = "Por favor, e-mail já cadastrado no banco de dados.";
			}
			if ($this->model->finder('username', $username, $id)) {
				$errors[] = "Por favor, login já cadastrado no banco de dados.";
			}
		}

		return $errors;
	}
}
