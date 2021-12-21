<?php

namespace App\Form;

class Apikeys extends \App\Dexlib\Form {	

	public static function get(){

		return [

			    /*
			    |----------------------------------------------------------------------
			    | Application API KEY
			    |---------------------------------------------------------------------
			    */

			    'google' => [
			        'title' => __('application.Google Maps'),
			        'desc' => __('application.Google Maps Javascript API key'),
			        'icon' => 'glyphicon glyphicon-sunglasses',
			        'elements' => [
			            [
			                'type' => 'text',
			                'data' => 'string',
			                'name' => 'googlemaps_key',
			                'label' => __('application.Secret Key'),
			                'rules' => '',
			                'value' => ''
			            ]
			        ]
			    ],

			    'yandex' => [
			        'title' => __('application.Yandex'),
			        'desc' => __('application.Yandex API key for translation'),
			        'icon' => 'glyphicon glyphicon-sunglasses',
			        'elements' => [
			            [
			                'type' => 'text',
			                'data' => 'string',
			                'name' => 'yandex_api_key',
			                'label' => __('application.API key'),
			                'rules' => '',
			               'value' => ''
			            ]
			        ]
			    ],

			    'firebase' => [
			        'title' => __('application.Firebase Cloud Messaging'),
			        'desc' => __('application.Firebase Cloud Messaging for sending push notifications'),
			        'icon' => 'glyphicon glyphicon-sunglasses',
			        'elements' => [
			            [
			                'type' => 'text',
			                'data' => 'string',
			                'name' => 'firebase_sender_id',
			                'label' => __('application.Sender ID'),
			                'rules' => '',
			                'value' => ''
			            ],
			            [
			                'type' => 'text',
			                'data' => 'string',
			                'name' => 'firebase_server_key',
			                'label' => __('application.Server key'),
			                'rules' => '',
			                'value' => ''
			            ],
			            [
			                'type' => 'file',
			                'data' => 'json',
			                'name' => 'google_services_json',
			                'label' => __('application.Google Services json File'),
			                'rules' => '',
			                'value' => ''
			            ]

			        ]
			    ]
				
		 	];
	}


}