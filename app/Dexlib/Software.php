<?php

namespace App\Dexlib;
use Artisan;

class Software
{

	public static function keys() {

		return array('SERVER_NAME', 'SERVER_SOFTWARE', 'SERVER_PORT');
	}

}