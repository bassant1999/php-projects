<?php 

namespace Controller;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Logout extends Controller
{
	// use MainController;

	public function index()
	{
        session_start();

        session_unset();

        session_destroy();

        header("location:login");
	}

}