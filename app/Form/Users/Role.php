<?php

namespace App\Form\Users;
use Spatie\Permission\Models\Permission;

class Role extends \App\Dexlib\Form {	

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
			        'title' => __('auth.Manage Roles'),
			        'elements' => [
			            [
			                'type' => 'text',
			                'data' => 'string',
			                'name' => 'name',
			                'label' => __('auth.Role Name'),
			                'rules' => 'required',
			                'value' => ''
			            ]
			        ]
			    ]/*,
			    'Permissions' => [
			        'title' => __('auth.Permission'),
			        'desc' => __('auth.Assign a permissions'),
			        'elements' => [
			            [
			                'type' => 'checkbox',
			                'data' => 'string',
			                'name' => 'permission',
			                'label' => __('auth.Permission'),
			                'value' => [],
			                'rules' => 'required',
			                'options' => Permission::pluck('label_name','id')->all()
			            ]
			        ]
			    ]*/
				
		 	];
	}


}