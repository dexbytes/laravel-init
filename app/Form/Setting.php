<?php

namespace App\Form;
use DateTimeZone;
use Spatie\Permission\Models\Role;

class Setting extends \App\Dexlib\Form
{	

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
			    |--------------------------------------------------------------------------
			    | Application Settings
			    |--------------------------------------------------------------------------
			    |
			    | In here you can define all the settings used in your app, it will be
			    | available as a settings page where user can update it if needed
			    | create sections of settings with a type of input.
			    */

			    'app' => [
			        'title' => __('application.General'),
			        'desc' => __('application.All the general settings for application.'),
			        'icon' => 'glyphicon glyphicon-sunglasses',
			        'elements' => [
			            [
			                'type' => 'text',
			                'data' => 'string',
			                'name' => 'app_name',
			                'label' => __('application.App Name'),
			                'rules' => 'required|min:2|max:50',
			                'value' => config('app.name')
			            ],
			            [
			                'type' => 'text',
			                'data' => 'string',
			                'name' => 'app_sort_name',
			                'label' => __('application.App Sort Name'),
			                'rules' => 'required|min:2|max:5',
			                'value' => ''
			            ],
			            [
			                'type' => 'text',
			                'data' => 'string',
			                'name' => 'lagline',
			                'label' => __('application.Tagline'),
			                'value' => ''
			            ],
			            [
			                'type' => 'file',
			                'data' => 'string',
			                'name' => 'logo',
			                'label' => __('application.Logo'),
			                'rules' => 'mimes:pdf,jpg,png'
			            ]
			        ]
			    ],
				
				'account' => [
			        'title' => __('application.Account Setting'),
			        'desc' => __('application.All the general settings for application.'),
			        'icon' => 'glyphicon glyphicon-sunglasses',
			        'elements' => [
			            [
			                'type' => 'select',
			                'data' => 'string',
			                'name' => 'default_role',
			                'label' => __('application.Default User Role'),
			                'rules' => 'required',
			                'options' =>  Role::pluck('name','name')->all(),
			                'value' => config('dex.defaultRole')
			            ],
			            [
			                'type' => 'checkbox',
			                'data' => 'string',
			                'name' => 'enable_registration',
			                'label' => __('application.Enable Registration'),
			                'value' => config('dex.enableRegister'),
			                'rules' => ''
			            ],
			            [
			                'type' => 'radio',
			                'data' => 'string',
			                'name' => 'site_mode',
			                'label' => 'Site Mode',
			                'options' => [
			                	'up' => 'UP',
			                	'down' => 'DOWN'
			                ],
			                'rules' => ''
			            ]
			        ]
			    ],


			    'Locale' => [
			        'title' => __('application.Localization'),
			        'desc' => __('application.Set your localization settings like format of Date and number etc.'),
			        'icon' => 'glyphicon glyphicon-globe',
			        'elements' => [
			        	[
			                'type' => 'select',
			                'data' => 'string',
			                'name' => 'default_lang',
			                'label' => __('application.Default Language'),
			                'rules' => 'required',
			                'options' => \App\Dexlib\Locale::getActiveLang(),
			                'value' => env('APP_LOCALE')
			            ],
			            [
			                'type' => 'select',
			                'data' => 'string',
			                'name' => 'date_format',
			                'label' => __('application.Date format'),
			                'rules' => 'required',
			                'options' => [
			                    'm/d/Y' => date('m/d/Y'),
			                    'm.d.y' => date("m.d.y"),
			                    'j, n, Y' => date("j, n, Y"),
			                    'M j, Y' => date("M j, Y"),
			                    'D, M j, Y' => date('D, M j, Y')
			                ],
			                'value' => 'm/d/Y'
			            ],
			            [
			                'type' => 'select',
			                'data' => 'string',
			                'name' => 'time_format',
			                'label' => __('application.Time format'),
			                'rules' => 'string',
			                'options' => [
			                    'g:i a' => date('g:i a') . '('.__('application.12-hour format').')',
			                    'g:i:s A' => date('g:i A') . ' (12-hour format)',
			                    'G:i' => date("G:i"). ' (24-hour format)',
			                    'h:i:s a' => date("h:i:s a") . ' (12-hour with leading zero)',
			                    'h:i:s A' => date("h:i:s A")
			                ],
			                'value' => 'g:i a'
			            ],
			            [
			                'type' => 'select',
			                'data' => 'string',
			                'name' => 'timezone',
			                'label' => __('application.Timezone'),
			                'rules' => 'string',
			                'options' => array_combine(
			                    DateTimeZone::listIdentifiers(DateTimeZone::ALL),
			                    DateTimeZone::listIdentifiers(DateTimeZone::ALL)
			                ),
			                'value' => config('app.timezone', 'UTC'),
			                'rules' => 'required'
			            ],

			        ]
			    ],

			    'currency' => [
			        'title' => __('application.Currency'),
			        'desc' => __('application.Choose the price display options in the frontend.'),
			        'icon' => 'glyphicon glyphicon-envelope',
			        'elements' => [
			             [
			                'type' => 'select',
			                'data' => 'string',
			                'name' => 'currency',
			                'label' => __('application.Currency'),
			                'rules' => 'string',
			                'options' => \App\Dexlib\Currency::getAllCurrency(),
			                'value' => 'USD',
			                 'rules' => 'required'
			            ],
			            [
			                'type' => 'select',
			                'data' => 'string',
			                'name' => 'currency_position',
			                'label' => __('application.Currency position'),
			                'rules' => 'string',
			                'options' => [
			                    'left' => __('application.Left'),
			                    'right' => __('application.Right'),
			                    'left_space' => __('application.Left with space'),
			                    'right_space' =>__('application.Right with space')
			                ],
			                'value' => 'left'
			            ],
			            [
			                'type' => 'text',
			                'name' => 'thousand_separator',
			                'label' => __('application.Thousand separator'),
			                'rules' => 'required|min:1|max:1',
			                'value' => '.'
			            ],
			            [
			                'type' => 'text',
			                'name' => 'decimal_separator',
			                'label' => __('application.Decimal separator'),
			                'rules' => 'string|required|min:1|max:1',
			                'value' => ','
			            ],
			            [
			                'type' => 'number',
			                'name' => 'number_of_decimals',
			                'label' => __('application.Number of decimals'),
			                'rules' => 'integer|required|digits_between:1,5',
			                'value' => '2'
			            ]			            
			        ]
			    ],

			    'email' => [
			        'title' => __('application.Admin Email'),
			        'desc' => __('application.Email settings for app'),
			        'icon' => 'glyphicon glyphicon-envelope',
			        'elements' => [
			            [
			                'type' => 'email',
			                'name' => 'from_email',
			                'label' => __('application.From Email'),
			                'rules' => 'required|email',
			                'value' => ''
			            ],
			            [
			                'type' => 'text',
			                'name' => 'from_name',
			                'label' => __('application.From Name'),
			                'rules' => 'required|min:2|max:50',
			                'value' => ''
			            ]			            
			        ]
			    ],

			    'term' => [
			        'title' => __('application.Privacy'),
			        'desc' =>'',
			        'icon' => 'glyphicon glyphicon-envelope',
			        'elements' => [
			            [
			                'type' => 'textarea',
			                'name' => 'term_conditions',
			                'label' => __('application.Term and Conditions'),
			                'rules' => 'required',
			                'cols' => 12,
			                'rows' => 13,
			                'value' => 'This is term and Conditions'
			            ]		            
			        ]
			    ]
			];
	}


}