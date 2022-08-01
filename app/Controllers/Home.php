<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;
use App\Models\Login_model;

$request = service('request');

class Home extends BaseController
{
	public function __construct()
	{
		$this->auth = new Login_model();
	}

	public function index($error = "")
	{	
		$data['error'] = $error;
		$data['title'] = "Login Sistem";
		return view('login', $data);
	}

	public function p_login()
	{
		$username = htmlspecialchars($this->request->getPost('username'));
		$password = htmlspecialchars($this->request->getPost('password'));

		$cek_login = $this->auth->getLogin($username, $password);

		if (!empty($cek_login)) {

			session()->set("id", $cek_login['id']);
			session()->set("username", $cek_login['username']);
			session()->set("password", $cek_login['password']);
			session()->set("name", $cek_login['name']);
			session()->set("role", $cek_login['role']);
			session()->set("s_l", "sukses");

			return redirect()->to('/dashboard');
		} else {

			return redirect()->to('/err4');
		}
	}

	public function logout()
	{
		$array_items = ['id', 'username', 'password', 'name', 'role'];
		session()->remove($array_items);
		return redirect()->to('/logout1');
	}
}
