<?php

if (function_exists('acf_register_block_type')) {

    // register a Examples block.
    acf_register_block_type(array(
        'name'              => 'Examples',
        'title'             => ('Блок примеры'),
        'description'       => ('Блок примеры.'),
        'render_template'   => 'templates/blocks/examples.php',
        'category'          => 'formatting',
        'icon'              => 'table-row-after',
        'keywords'          => array('examples'),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true
                )
            )
        )
    ));

    // register a Actual items block.
    acf_register_block_type(array(
        'name'              => 'Actual',
        'title'             => ('Блок Актуальное'),
        'description'       => ('Блок Актуальное.'),
        'render_template'   => 'templates/blocks/actual.php',
        'category'          => 'formatting',
        'icon'              => 'table-row-after',
        'keywords'          => array('actual'),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true
                )
            )
        )
    ));
}
