<?php

$tempConfig['router']['rule'] = array
(
    array
    (
        'rewriter' => array
        (
            array
            (
                'pattern' => '',
                'replace' => '',
            ),
        ),
        'generator' => '/{controller}.{action}-{parameters}',
        'param_separator' => '-',
    ),
    array
    (
        'rewriter' => array
        (
            array
            (
                'pattern' => '/d/d',
                'replace' => '',
            ),
        ),
        'generator' => '/{controller}.{action}-{parameters}',
        'param_separator' => '-',
    ),
);

?>
