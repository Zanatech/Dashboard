<?php

return [

    'title'             => 'Dashboard',
    'title_prefix'      => '',
    'title_postfix'     => '',

    'logo'              => '<b>Anxor</b>Dashboard',
    'logo_mini'         => '<b>A</b>Ds',

    'collapse_sidebar'  => false,

    'dashboard_url'     => 'home',
    'logout_url'        => 'logout',
    'logout_method'     => null,
    'login_url'         => 'login',
    'register_url'      => 'register',
    'password_reset_url'=> 'password/reset',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Especifica los elementos del menu {Side Bar} , en donde aqui se 
    | escriben las propiedades de los items. Hay dos tipos de Items: 
    | 1. Cabecera
    | 2. Item
    | En donde si es Cabecera solo se escribira el texto {Como si fuera string}
    | de la cabecera, y si es un Item se debe escribir el texto y las 
    | propiedades de ese Item como si fuera un arreglo {Array}.
    | Un Item puede tener una propiedad otro Item, a esto se conoce como 
    | SubItem, que al igual tiene sus propiedades.
    |
    |   Las proiedades con que se trabajaran son:
    |   - text
    |   - url
    |   - icon
    |   - icon_color
    |   - submenu
    |
    */

    'menu' => [
        'Main Navigation',
        [
            'text'      => 'Home',
            'icon'      => 'dashboard',
            'icon_color'=> 'teal',
            'url'       => 'home',
        ],
        [
            'text'      => 'Client',
            'icon'      => 'contacts',
            'icon_color'=> 'teal',
            'url'       => 'clients'
        ],
        [
            'text'      => 'Jobs',
            'icon'      => 'assignment',
            'icon_color'=> 'teal',
            'url'       => 'jobs'
        ],
        [
            'text'      => 'Assets',
            'icon'      => 'list',
            'icon_color'=> 'teal',
            'url'       => 'assets'
        ],
        [
            'text'      => 'Tests',
            'icon'      => 'receipt',
            'icon_color'=> 'teal',
            'url'       => 'tests'
        ],
        'General Options',
        [        
            'text'      => 'Profile',
            'icon'      => 'account_circle',
            'icon_color'=> 'teal',
            'url'       => '#'
        ]
    ],

    'plugins' => [
        'datatables' => true,
    ],
];
