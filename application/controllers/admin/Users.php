<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("user_model");
		}

		public function index()
		{
			$data = array();
			$data['temp'] = "admin/main";
			$data['data'] = $this->user_model->getAll();
			$this->load->view("admin/index", $data);
		}

		public function add_users()
		{
			$data = array();
			$data["temp"] = "admin/add_user";
			if($this->input->post())
			{
				$this->form_validation->set_rules("fullname", "Full name", "required|min_length[6]|callback_checkFullname");
				$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|callback_checkEmail");
				$this->form_validation->set_rules("phone", "Phone number", "required|regex_match[/^[0-9]{11}$/]|callback_checkPhone");
				$this->form_validation->set_rules("address", "Address", "required");
				$this->form_validation->set_rules("birthday", "Birthday", "required");
				$this->form_validation->set_rules("gender", "Gender");
				if($this->form_validation->run())
				{
					$name = $this->input->post("fullname");
					$email = $this->input->post("email");
					$phone = $this->input->post("phone");
					$address = $this->input->post("address");
					$birthday = $this->input->post("birthday");
					$gender = $this->input->post("gender");
					$input = array(
						"fullname" => $name,
						"email" => $email,
						"phone" => $phone,
						"address" => $address,
						"birthday" => $birthday,
						"gender" => $gender,
					);
					$this->user_model->create($input);
					$this->session->set_flashdata("msg", "Them thanh cong!!!");
					redirect("admin/users/index");
				}
				if($this->form_validation->run() === FALSE){
					$this->session->set_flashdata("mess", validation_errors('<p class="error">', '</p>'));
				}
				$data['data'] = $this->input->post();
			}
			$this->load->view("admin/index", $data);
		}

		//check exists
		public function checkFullname()
		{
			$name = $this->input->post("fullname");
			$id = $this->input->post("id");
			$check_exist = $this->user_model->getByField("fullname", $name, $id);
			if(!empty($check_exist)) {
				$this->form_validation->set_message("checkFullname", "Full name exists!");
				return false;
			}
			return true;
		}

		public function checkEmail()
		{
			$email = $this->input->post("email");
			$id = $this->input->post("id");
			$check_email = $this->user_model->getByField("email", $email, $id);
			if(!empty($check_email)) {
				$this->form_validation->set_message("checkEmail", "Email exists!");
				return false;
			}
			return true;
		}

		public function checkPhone()
		{
			$phone = $this->input->post("phone");
			$id = $this->input->post("id");
			$checkPhone = $this->user_model->getByField("phone", $phone, $id);
			if(!empty($checkPhone)) {
				$this->form_validation->set_message("checkPhone", "Phone number exists!");
				return false;
			}
			return true;
		}

		// delete id
		public function delete_user()
		{
			$id = $this->input->post("id");
			if(!empty($id) && is_numeric($id))
			{
				$data["temp"] = "admin/main";
				$delete = $this->user_model->delete($id);
				$this->session->set_flashdata("msg", "successfully delete!");
				redirect("admin/users/index");
			}
		}
	}
?>