<?php

use Illuminate\Http\Request;

Route::apiResources(
    [
        'v1/documents' => 'API\v1\DocumentController'
    ]
);
