<?php

    /*
    |--------------------------------------------------------------------------
    | Create Forms
    |--------------------------------------------------------------------------
    |
    | Aqui se escriben los formularios de creacion de objetos.
    | Normalmente se deben de especificar los siguientes campos, en la siguiente forma:
    | [ icon, title, message, action, button_message, fields[]]
    |
    | Para cualquien modificiacion del formulario ir a /view/master/page/create_forms.blade.php
    | *Los campos son generados por separado gracias a /view/partials/field.blade.php
    | *title, messsage, icon y button_message se deben hacer referencia el nombre de configuracion
    | correspondiente por ejemplo: 
    | 
    | 'text' => 'create_client_message' (hace referencia a trans('form.create_client_message') ) 
    |
    */

	return [

		'create_client'		=>
			[
				'icon'			=> 'contacts',
				'title'			=> 'create_client_title',
				'message'		=> 'create_client_message',
				'action'		=> 'save_client',
				'button_message'=> 'create_client_button',
				'fields'		=> 
					[
                        [
                            'name'      => 'full_name',
                            'text'      => 'create_client_name',
                            'type'      => 'text',
                            'icon'      => 'account_circle',
                            'size'      => 'm12 s12',
                        ],
                        [
                            'name'      => 'email',
                            'text'      => 'create_client_mail',
                            'type'      => 'email',
                            'icon'      => 'mail',
                            'size'      => 'm12 s12',
                        ],
                        [
                            'name'      => 'password',
                            'text'      => 'create_client_password',
                            'type'      => 'password',
                            'icon'      => 'lock',
                            'size'      => 'm12 s12',
                        ],
                        [
                            'name'      => 'password_confirmation',
                            'text'      => 'create_client_repassword',
                            'type'      => 'password',
                            'icon'      => 'lock',
                            'size'      => 'm12 s12',
                        ],
					],
			],
        'create_asset'     =>
            [
                'icon'          => 'list',
                'title'         => 'create_asset_title',
                'message'       => 'create_asset_message',
                'action'        => 'save_asset',
                'button_message'=> 'create_asset_button',
                'fields'        => 
                    [
                        [
                            'name'      => 'plant',
                            'text'      => 'create_asset_plant',
                            'type'      => 'text',
                            'icon'      => 'account_balance',
                            'size'      => 'm6 s12',
                        ],
                        [
                            'name'      => 'substation',
                            'text'      => 'create_asset_substation',
                            'type'      => 'text',
                            'icon'      => 'build',
                            'size'      => 'm6 s12',
                        ],
                        [
                            'name'      => 'eq_type',
                            'text'      => 'create_asset_eq',
                            'type'      => 'text',
                            'icon'      => 'book',
                            'size'      => 'm6 s12',
                        ],
                        [
                            'name'      => 'asset_name',
                            'text'      => 'create_asset_name',
                            'type'      => 'text',
                            'icon'      => 'list',
                            'size'      => 'm6 s12',
                        ],
                    ],
            ],
        'create_job'     =>
            [
                'icon'          => 'assignment',
                'title'         => 'create_job_title',
                'message'       => 'create_job_message',
                'action'        => 'save_job',
                'button_message'=> 'create_job_button',
                'fields'        => 
                    [
                        [
                            'name'      => 'target_date',
                            'text'      => 'create_job_target',
                            'type'      => 'datepicker',
                            'icon'      => 'event',
                            'size'      => 'm8 s12',
                        ],
                    ],
            ],
        'create_test'     =>
            [
                'icon'          => 'receipt',
                'title'         => 'create_test_title',
                'message'       => 'create_test_message',
                'action'        => 'save_test',
                'button_message'=> 'create_test_button',
                'fields'        => 
                [
                    [
                        'name'      => 'test_group',
                        'text'      => 'create_test_group',
                        'type'      => 'combobox',
                        'icon'      => 'info',
                        'size'      => 'm6 s12',
                        'data'      => 
                        [
                            [
                            'option_name'    =>  'TRANS',
                            'option_value'   =>  'TRANS',
                            ],
                        ]
                    ],
                    [
                        'name'      => 'result_group',
                        'text'      => 'create_test_result',
                        'type'      => 'combobox',
                        'icon'      => 'info',
                        'size'      => 'm6 s12',
                        'data'      => 
                        [
                            [
                            'option_name'    =>  'PA - FP',
                            'option_value'   =>  'PA - FP',
                            ],
                            [
                            'option_name'    =>  'PA - Corr Exitacion',
                            'option_value'   =>  'PA - Corr Exitacion',
                            ],
                            [
                            'option_name'    =>  'PA - MTO',
                            'option_value'   =>  'PA - MTO',
                            ],
                            [
                            'option_name'    =>  'PA - Res Aislamiento',
                            'option_value'   =>  'PA - Res Aislamiento',
                            ],
                        ]
                    ],
                    [
                            'name'      => 'file',
                            'text'      => 'import_file',
                            'type'      => 'file',
                            'icon'      => 'import_export',
                            'size'      => 'm9 s12',
                        ],
                ],
            ],
        'import'     =>
            [
                'icon'          => 'settings',
                'title'         => 'import_title',
                'message'       => 'import_message',
                'action'        => 'import/file',
                'button_message'=> 'import_button',
                'has_file'      => true,
                'fields'        => 
                    [
                        [
                            'name'      => 'file',
                            'text'      => 'import_file',
                            'type'      => 'file',
                            'icon'      => 'import_export',
                            'size'      => 'm12 s12',
                        ],
                    ],
            ],

	];