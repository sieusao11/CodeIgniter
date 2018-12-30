<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends My_model
	{
		function __construct()
		{
			parent::__construct();
			$this->table = "users";
		}
	}
?>