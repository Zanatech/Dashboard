<?php

return [
        // General Interface
        'language'                  => 'Idioma',
        'log_out'                   => 'Cerrar Sesion',
        'see_all'                   => 'Ver mas',
        'combobox_message'          => 'Selecciona una opcion',

        // Table titles
        'title_client'              => 'Clientes',
        'title_asset'               => 'Activos',
        'title_job'                 => 'Trabajos',
        'title_test'                => 'Pruebas',

        'title_res_table'           => 'Resistencia de Aislamiento',
        'title_fp_table'            => 'Tabla de Factor de Potencia',
        'title_corr_table'          => 'Tabla de Corriente de Exitacion',
        'title_mto_table'           => 'MTO',

        // Tables
        'client'        => 
        [
                'id'                 => 'ID',
                'name'               => 'Nombre',
                'email'              => 'Correo',
        ],

        'job'           =>
        [
                'id'                    => 'ID',
                'target_date'           => 'Fecha objetivo',
                'due_date'              => 'Fecha entregado',
                'complete'              => 'Trabajo completo',
                'invoice_sent'          => 'Facutura envidad',
        ],
        
        'asset'         =>
        [
                'id'                 => 'ID',
                'plant'              => 'Planta',
                'substation'         => 'Subestacion',
                'eq'                 => 'Tipo de EQ',
                'name'               => 'Nombre',
        ],


        'test'          =>
        [
                'id'                  => 'ID',
                'group'               => 'Grupo de Prueba',
                'result_group'        => 'Grupo de Resultado',
                'status'              => 'Estatus de Prueba',
        ],

        'fp_table'      =>
        [
                'id'                                    => 'ID',
                'testmodetxt'                           => 'Test Mode Text',
                'kv'                                    => 'KV',
                'cap'                                   => 'Capacitancia',
                'pf'                                    => 'Factor de Potenci',
                'pf_20'                                 => 'Factor de Potencia 20',
                'corr'                                  => 'Correcion',
                'ma'                                    => 'mA',
                'watts'                                 => 'Watts',
                'vdf'                                   => 'VDF',
        ],

        'mto_table'      =>
        [
                'id'                                    => 'ID',
        ],

        'res_table'      =>
        [
                'id'                                    => 'ID',
                'test_time'                             => 'Tiempo de Prueba',
                'corr1'                                 => 'Valor Fase 1',
                'corr2'                                 => 'Valor Fase 2',
                'corr3'                                 => 'Valor Fase 3',
        ],

        'corr_table'      =>
        [
                'id'                                            => 'ID',
                'excite_corrma_1'                               => 'mA Fase A',
                'excite_corrwatts_1'                            => 'Watts Fase A',
                'excite_corrma_2'                               => 'mA Fase B',
                'excite_corrwatts_2'                            => 'Watts Fase B',
                'excite_corrma_3'                               => 'mA Fase C',
                'excite_corrwatts_3'                            => 'Watts Fase C',

        ],


];
