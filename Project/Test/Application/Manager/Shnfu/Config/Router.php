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
);

?>
