<?php

namespace Ms;


/**
 * Trial class
 */
class Trial extends \ActiveRecord\Model
{

	public $table = 'Trial';

    public function try()
	{
		echo "yes";
	}

	

}