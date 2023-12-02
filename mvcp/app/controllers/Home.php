<?php 

namespace Controller;

use Model\Model;

// require "../models/User.php";
use Model\User;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Home extends Controller
{
	// use MainController;

	public function index()
	{

		$model = new Model();
		$model->table = 'users';
		echo $model->table . "\n";
		print_r($model->findAll());
		print_r($model->where(['id'=>1]));
		// print_r($model->delete(3, 'id'));

		// print_r($model->insert(['name'=>"monjy", "email"=>"m@gmail.com", "password"=>"123"]));
		print_r($model->query("select * from users where id = 4"));
		$user = new User();
		print_r($user->findAll());
		echo isset($_SESSION["logn"]);
		// echo $_SESSION["login"];
		$user->stry();
		echo isset($_SESSION["logn"]);
		$this->view('home');
	}
	public function try()
	{
		echo "home try";
	}

}