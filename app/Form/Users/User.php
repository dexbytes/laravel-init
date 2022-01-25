<?php

namespace App\Form\Users;
use Spatie\Permission\Models\Role;

class User extends \App\Dexlib\Form {	

	/**
     * @var array
     */
	public function __construct() {

	  parent::__construct($this);
    }

    /**
     * @var array
     */	
	public static function getElements(){

		return [


			    /*
			    |----------------------------------------------------------------------
			    | Application Roles
			    |---------------------------------------------------------------------
			    */

			    'roles' => [
			        'title' => __('auth.User'),
			        'elements' => [
			            [
			                'type' => 'text',
			                'data' => 'string',
			                'name' => 'name',
			                'label' => __('auth.Name'),
			                'rules' => 'required',
			                'value' => ''
			            ],
			            [
			                'type' => 'text',
			                'data' => 'string',
			                'name' => 'email',
			                'label' => __('auth.Email'),
			                'rules' => 'required|email',
			                'value' => ''
			            ],
			            [
			                'type' => 'select',
			                'data' => 'string',
			                'name' => 'roles',
			                'label' => __('auth.Role'),
			                'rules' => 'required',
			                'options' => Role::pluck('name','name')->all(),
			                'value' => env('ROLES_DEFAULT_USER_MODEL')
			            ],
			            [
			                'type' => 'password',
			                'data' => 'string',
			                'name' => 'password',
			                'label' => __('auth.Password'),
			                'rules' => 'required',
			                'value' => ''
			            ],
			            [
			                'type' => 'password',
			                'data' => 'string',
			                'name' => 'confirm-password',
			                'label' => __('auth.Confirm Password'),
			                'rules' => 'required',
			                'value' => ''
			            ]
			        ]
			    ]
				
		 	];
	}


}