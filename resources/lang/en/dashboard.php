<?php

return [
        // General Interface
        'language'                  => 'Language',
        'log_out'                   => 'Log Out',
        'see_all'                   => 'See all',

        // Tables
        'client'        => 
        [
                'id'                 => 'ID',
                'name'               => 'Name',
                'created'            => 'Created at',
        ],

        'job'           =>
        [
                'id'                    => 'ID',
                'target_date'           => 'Target Date',
                'due_date'              => 'Due Date',
                'complete'              => 'Job Complete',
                'invoice_sent'          => 'Invoce Sent',
        ],
        
        'asset'         =>
        [
                'id'                 => 'ID',
                'plant'              => 'Plant',
                'substation'         => 'Substation',
                'eq'                 => 'EQ Type',
                'name'               => 'Name',
        ],


        'test'          =>
        [
                'id'                  => 'ID',
                'group'               => 'Test Group',
                'result_group'        => 'Result Group',
                'status'              => 'Test Status',
        ],

        'fp_table'      =>
        [
                'id'                                    => 'ID',
                'testmodetxt'                           => 'Test Mode Text',
                'kv'                                    => 'KV',
                'cap'                                   => 'Capacitance',
                'pf'                                    => 'Power Factor',
                'pf_20'                                 => 'Power Factor 20',
                'corr'                                  => 'Correction',
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
                'test_time'                             => 'Test Time',
                'corr1'                                 => 'Corr1',
                'corr2'                                 => 'Corr2',
                'corr3'                                 => 'Corr3',
        ],

        'corr_table'      =>
        [
                'id'                                            => 'ID',
                'excite_corrma_1'                               => 'excite_corrma_1',
                'excite_corrwatts_1'                            => 'excite_corrwatts_1',
                'excite_corrma_2'                               => 'excite_corrma_2',
                'excite_corrwatts_2'                            => 'excite_corrwatts_2',
                'excite_corrma_3'                               => 'excite_corrma_3',
                'excite_corrwatts_3'                            => 'excite_corrwatts_3',

        ],


];
