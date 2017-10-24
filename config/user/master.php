<?php

return [

    /*
    |--------------------------------------------------------------------------
    | USER Master Config File
    |--------------------------------------------------------------------------
    |
    | Aqui se debera escribir opciones que el usuario puede moficar a gusto,
    | o configuraciones que que afectan el funcionamiento del proyecto
    |
    */

    'title'             => 'Dashboard',
    'title_prefix'      => '',
    'title_postfix'     => '',

    'logo'              => '<b>Anxor</b>Dashboard',
    'logo_mini'         => '<b>A</b>Ds',

    'collapse_sidebar'  => false,
    'logout_method'     => null,

    'plugins' => [
        'datatables' => false,
        'fullcalendar' => true,
        'picker' => true,
    ],
];
