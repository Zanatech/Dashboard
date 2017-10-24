<?php 

return [
    
    /*
    |--------------------------------------------------------------------------
    | Sidebar Type
    |--------------------------------------------------------------------------
    |
    |   Se puede seleccionar el tipo de Sibebar. 
    |   Mas info(http://materializecss.com/collapsible.html)
    |   Estan disponibles {accordion, expandable}
    | 
    */

    'sidebar_type' => 'accordion',

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
    |   - text (Revisar Carpeta Lang)
    |   - url
    |   - icon
    |   - icon_color
    |   - role_access
    |   - submenu
    |
    */

    'items' => [
        [
            'text'          =>  'main_navigation',
            'icon'          =>  'expand_more',
            'icon_color'    =>  'teal',
            'url'           =>  '#',
            'role_access'   =>  '0',
            'submenu'       => 
            [
                [
                    'text'          =>  'home',
                    'icon'          =>  'dashboard',
                    'icon_color'    =>  'teal',
                    'url'           =>  'home',
                    'role_access'   =>  '0'
                ],
                [
                    'text'          =>  'client',
                    'icon'          =>  'contacts',
                    'icon_color'    =>  'teal',
                    'url'           =>  'clients',
                    'role_access'   =>  '1'
                ],
                [
                    'text'          =>  'asset',
                    'icon'          =>  'list',
                    'icon_color'    =>  'teal',
                    'url'           =>  'assets',
                    'role_access'   =>  '0'
                ],
                [
                    'text'          =>  'job',
                    'icon'          =>  'assignment',
                    'icon_color'    =>  'teal',
                    'url'           =>  'jobs',
                    'role_access'   =>  '0'
                ],
                [
                    'text'          =>  'test',
                    'icon'          =>  'receipt',
                    'icon_color'    =>  'teal',
                    'url'           =>  'tests',
                    'role_access'   =>  '0'
                ],
                [
                    'text'          =>  'preview',
                    'icon'          =>  'format_list_numbered',
                    'icon_color'    =>  'teal',
                    'url'           =>  'preview',
                    'role_access'   =>  '1'
                ],
            ]
        ],
        
        /*[
            'text'          =>  'admin_panel',
            'icon'          =>  'expand_more',
            'icon_color'    =>  'teal',
            'url'           =>  '#',
            'role_access'   =>  '1',
            'submenu'       => 
            [
                [
                    'text'          =>  'panel',
                    'icon'          =>  'android',
                    'icon_color'    =>  'teal',
                    'url'           =>  'panel',
                    'role_access'   =>  '1'
                ],
                [        
                    'text'          =>  'import',
                    'icon'          =>  'import_export',
                    'icon_color'    =>  'teal',
                    'url'           =>  'import',
                    'role_access'   =>  '1'
                ],
            ]
        ],*/
    ]
];