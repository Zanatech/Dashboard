<?php 

return [

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
    |   - role_access
    |   - submenu
    |
    */

    'items' => [
        'Main Navigation',
        [
            'text'          =>  'Home',
            'icon'          =>  'dashboard',
            'icon_color'    =>  'teal',
            'url'           =>  'home',
            'role_access'   =>  '0'
        ],
        [
            'text'          =>  'Client',
            'icon'          =>  'contacts',
            'icon_color'    =>  'teal',
            'url'           =>  'clients',
            'role_access'   =>  '1'
        ],
        [
            'text'          =>  'Jobs',
            'icon'          =>  'assignment',
            'icon_color'    =>  'teal',
            'url'           =>  'jobs',
            'role_access'   =>  '0'
        ],
        [
            'text'          =>  'Assets',
            'icon'          =>  'list',
            'icon_color'    =>  'teal',
            'url'           =>  'assets',
            'role_access'   =>  '0'
        ],
        [
            'text'          =>  'Tests',
            'icon'          =>  'receipt',
            'icon_color'    =>  'teal',
            'url'           =>  'tests',
            'role_access'   =>  '0'
        ],
        'General Options',
        [        
            'text'          =>  'Profile',
            'icon'          =>  'account_circle',
            'icon_color'    =>  'teal',
            'url'           =>  '#',
            'role_access'   =>  '0'
        ]
    ]
];