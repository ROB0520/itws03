<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

class UserController
{
	protected $db;

	public function __construct()
	{
		$config = require basePath('config/db.php');

		$this->db = new Database($config);
	}

	public function create()
	{
		loadView('users/create');
	}

	public function login()
	{
		loadView('users/login');
	}

	public function store()
	{
		$name = trim($_POST['name']) ?? '';
		$email = trim($_POST['email']) ?? '';
		$city = trim($_POST['city']) ?? '';
		$state = trim($_POST['state']) ?? '';
		$password = $_POST['password'] ?? '';
		$passwordConfirm = $_POST['password_confirm'] ?? '';

		$errors = [];

		// Validation
		if (!Validation::string($name, 2, 50)) {
			$errors[] = "Name must be between 2 and 50 characters.";
		}
		if (!Validation::email($email)) {
			$errors[] = "Please enter a valid email address.";
		}
		if (!Validation::string($city, 2, 100)) {
			$errors[] = "City must be between 2 and 100 characters.";
		}
		if (!Validation::string($state, 2, 100)) {
			$errors[] = "State must be between 2 and 100 characters.";
		}
		if (!Validation::string($password, 6)) {
			$errors[] = "Password must be at least 6 characters.";
		} elseif (!Validation::match($password, $passwordConfirm)) {
			$errors[] = "Passwords do not match.";
		}

		if (!empty($errors)) {
			loadView('users/create', [
				'errors' => $errors,
				'old' => [
					'name' => $name,
					'email' => $email,
					'city' => $city,
					'state' => $state
				]
			]);
			exit;
		}

		// Check if email already exists
		$existingUser = $this->db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetch();

		if ($existingUser) {
			$errors[] = "Email is already registered.";
			loadView('users/create', [
				'errors' => $errors,
				'old' => [
					'name' => $name,
					'email' => $email,
					'city' => $city,
					'state' => $state
				]
			]);
			exit;
		}

		$params = [
			'name' => $name,
			'email' => $email,
			'city' => $city,
			'state' => $state,
			'password' => password_hash($password, PASSWORD_DEFAULT)
		];

		$this->db->query('INSERT INTO users (name, email, city, state, password) VALUES (:name, :email, :city, :state, :password)', $params);

		$userId = $this->db->conn->lastInsertId();

		Session::set('user', [
			'id' => $userId,
			'name' => $name,
			'email' => $email,
			'city' => $city,
			'state' => $state
		]);

		Session::setFlashMessage('success_msg', "Registration successful. You are now logged in.");

		redirect('/auth/login');
	}

	public function logout()
	{
		Session::clearAll();
		$params = session_get_cookie_params();
		setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

		redirect('/');
	}

	public function authenticate()
	{
		$email = trim($_POST['email']) ?? '';
		$password = $_POST['password'] ?? '';

		$errors = [];

		if (!Validation::email($email)) {
			$errors[] = "Please enter a valid email address.";
		}
		if (!Validation::string($password, 6)) {
			$errors[] = "Password must be at least 6 characters.";
		}

		if (!empty($errors)) {
			loadView('users/login', ['errors' => $errors, 'old' => ['email' => $email]]);
			exit;
		}

		$user = $this->db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetch();

		if (!$user) {
			$errors[] = "Invalid email or password.";
			loadView('users/login', ['errors' => $errors, 'old' => ['email' => $email]]);
			exit;
		}

		if (!password_verify($password, $user->password)) {
			$errors[] = "Invalid email or password.";
			loadView('users/login', ['errors' => $errors, 'old' => ['email' => $email]]);
			exit;
		}

		Session::set('user', [
			'id' => $user->id,
			'name' => $user->name,
			'email' => $user->email,
			'city' => $user->city,
			'state' => $user->state
		]);

		redirect('/');
	}
}
