<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function get_user($username)
	{
        return $this->db->get_where('pengguna', ['user_username' => $username]);
	}
}
