<?php

namespace App\Form\Settings;
use DateTimeZone;
use Spatie\Permission\Models\Role;

class Configuration extends \App\Dexlib\Form
{	

	/**
     * @var array
     */
	public function __construct() {

	  parent::__construct($this);
    }
    

	public static function getElements(){

		return [

			    /*
			    |--------------------------------------------------------------------------
			    | Application Settings
			    |--------------------------------------------------------------------------
			    |
			    | In here you can define all the settings used in your app, it will be
			    | available as a settings page where user can update it if needed
			    | create sections of settings with a type of input.
			    */
  
			    'Locale' => [
			        'title' => __('application.Application settings'),
			        'desc' => __('application.Configuration determines how much information about an error is actually displayed to the user'),
			        'icon' => 'glyphicon glyphicon-globe',
			        'elements' => [
			            [
			                'type' => 'text',
			                'name' => 'main_domain',
			                'label' => __('application.Main Domain'),
			                'rules' => 'required',
			                'value' => $_SERVER['HTTP_HOST']
			            ],
			        	[
			                'type' => 'select',
			                'data' => 'string',
			                'name' => 'environment',
			                'label' => __('application.Environment'),
			                'rules' => 'required',
			                'options' => [
			                	'development' => __('application.Development'),
			                	'production' => __('application.Production'),
			                	'local'  =>  __('application.Local')
		                	],
			                'value' => config('app.APP_ENV')
			            ]

			        ]
			    ],

			   
			];
	}


}