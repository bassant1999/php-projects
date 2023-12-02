<?php 

namespace Controller;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class _404 extends Controller
{
	// use MainController;

	public function index()
	{

		$this->view('404');
	}

}