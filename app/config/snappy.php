<?php

return [    
   'pdf' => [
    'enabled' => true,
    'binary'  => env('WKHTMLTOPDF_PATH', '/usr/local/bin/wkhtmltopdf'),
    'timeout' => env('WKHTMLTOPDF_TIMEOUT', 120),
    'options' => [],
    'env'     => [],
],
    
    'image' => [
        'enabled' => true,
        'binary'  => env('WKHTML_IMG_BINARY', '/usr/bin/wkhtmltoimage'),
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

];
