<?php 

namespace Controller;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Products extends Controller
{
	// use MainController;

	public function index()
	{

		$this->view('products');
	}

}